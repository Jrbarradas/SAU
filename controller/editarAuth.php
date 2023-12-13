<?php
include './toolsAuth.php';

// Classe utilizada para modificar os dados do Perfil Pessoal
class editarDados{

    public $txtNome;
    public $txtPass;
    private $dirFile;
    private $fp;
    private $getContent;
    private $arrDados;
    private $arrAltera;
    private $arrJson;


    // Dados fixos que não serão alterados por outras variáveis
    public function __constructor(){
        $this->dirFile = '../db_json/'.$_SESSION['usuario_logado'].'.json';
        $this->getContent = file_get_contents($this->dirFile);
        $this->arrDados = json_decode($this->getContent,true);
    }


    // Verifica se os campos foram preenchidos
    private function checkDados(){
        if($this->txtNome && $this->txtPass){
            return true;
        } else {
            return false;
        }
    }

    // Realiza  alteração dos dados
    public function alteraDados(){
        if($this->checkDados()){
            //Coletando Dados que serão salvos em JSON//
            $this->arrAltera = array(
            "id"=>$this->arrDados['id'],
            "nome"=>strip_tags($this->txtNome),
            "email"=>$this->arrDados['email'],
            "senha"=>base64_encode($this->txtPass),
            "permissao"=>$this->arrDados['permissao']
            );

            //Encodando dados em coletados em JSON e salvando no arquivo//
            $this->arrJson = json_encode($this->arrAltera);
            $fp = fopen($this->dirFile,'w+') or die('Erro não foi possível alterar os dados!');
            fwrite($fp,$this->arrJson);
            fclose($fp);
            echo "Dados Alterados com sucesso!".PHP_EOL;
                            echo "Atualizando...".PHP_EOL;
                            echo "<script>
                            setTimeout(function(){
                                document.location.reload(true);
                            }, 2000);
                            </script>";
        } else{
            echo "Verifique se não há campos em branco!";
        }

    }


}


$usuario = new editarDados;
$usuario->txtNome = filter_input(INPUT_POST,'txtNome');
$usuario->txtPass = filter_input(INPUT_POST,'txtPass');
$usuario->__constructor();
$usuario->alteraDados();


?>
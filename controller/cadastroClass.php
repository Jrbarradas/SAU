<?php

require_once './dir_inc.php';
include DIR_INC.'/controller/atividadesClass.php';

/* 
Extensão da Classe usuário
Responsável pelo cadastro
*/

class Cadastro extends Usuario{

    private $arrDados;
    private $arrJson;
    private $dirFile;
    private $dirWrite;
    // Variáveis do LOG
    private $atividade;
    private $atividadeComentario;

    // Verifica se não há dados em branco, retorna true caso não haja e false caso haja.

    private function verDados(){

        if($this->getNome() && $this->getEmail() && $this->getSenha() && $this->getPermissao()){
            return true;
        } else {
            return false;
        }
    }

    public function realizaCadastro(){
        if($this->verDados()){
            // Array associativa que armazena os dados passados pelo usuário durante o cadastro caso não haja nenhum dado em branco.
            $this->arrDados = array(
            "id"=>$this->getId(),
            "nome"=>strip_tags($this->getNome()),
            "email"=>filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL),
            "senha"=>$this->getSenha(),
            "permissao"=>strip_tags($this->getPermissao())
            );

            // Transforma a array em JSON para armazena-lá no "db_json"
            $this->arrJson = json_encode($this->arrDados);
            $this->dirFile = '../db_json/'.$this->getId().'.json';

            /*
            Caso o usuário não seja cadastrado, realiza a criação do arquivo no banco e o cadastro do mesmo.
            Caso já seja cadastrado, retorna a mensagem de usuário já cadastrado.
            */
            switch(file_exists($this->dirFile)){
                case true:
                echo "Usuario já cadastrado";
                break;

                case false:
                $this->dirWrite = fopen($this->dirFile,'w+') or die('ERRO : Não foi possível realizar o cadastro no banco!');
                fwrite($this->dirWrite,$this->arrJson);
                fclose($this->dirWrite);
                /* 
                Atribui a classe responsável por registrar os Log's 
                Após isso registra nas atividades o cadastro de um novo usuário
                */
                $this->atividadeComentario = "Cadastrou um novo usuário : ". $this->arrDados["email"];
                $this->atividade = new userLogs;
                $this->atividade->__constructor();
                $this->atividade->registraLog($this->atividadeComentario);
                // Exibe a mensagem na Modal, dizendo que o usuário foi cadastrado com sucesso!
                echo "Usuário cadastrado!".PHP_EOL;
                            echo "Atualizando...".PHP_EOL;
                            echo "<script>
                            setTimeout(function(){
                                document.location.reload(true);
                            }, 2000);
                            </script>";
                break;
            }

        }else{
            echo "Verifique se não há campos em branco!";
        }
    }



}

// SET DOS ATRIBUTOS -> ONDE CADA DADO SERÁ COLETADO
// NESTE CASO O NOME, EMAIL, SENHA É COLETADO VIA GET
// O ID É GERADO ATRAVÉS DO EMAIL, CRIPTOGRAFADO EM BASE64

$usuario = new Cadastro;
$usuario->setNome(filter_input(INPUT_POST,'cadNome'));
$usuario->setEmail(filter_input(INPUT_POST,'cadEmail'));
$usuario->setSenha(base64_encode(filter_input(INPUT_POST,'cadPass')));
$usuario->setId(base64_encode($usuario->getEmail()));
$usuario->setPermissao(filter_input(INPUT_POST,'cadPermissao'));
$usuario->realizaCadastro();









?>
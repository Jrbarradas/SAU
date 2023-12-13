<?php
ini_set("session.gc_maxlifetime", 999999999);
session_cache_limiter('private');
session_cache_expire(999999999);
session_start();


include '../model/usuarioClass.php';


// Classe que realiza o Login do Usuário no Sistema
// Extenção da classe Usuario

class Entrar extends Usuario{

    private $arrContent;
    private $arrJson;
    private $dirFile;
    private $myId;
    private $adminSession;
    private $userSession;

    /* Verifica se os dados repassados não estão vázios, retorna true ou false */

    private function verDados(){

        if($this->getEmail() && $this->getSenha() <> null){
            return true;
        } else {
            return false;
        }
    }

    /* 
       Se os dados não estiverem vazios, verifica se o usuário já está cadastrado
       Caso não possua cadastrado, retorna a mensagem, caso possua, verifica se a senha está correta
       Loga no sistema no caso da senha estar correta!
       Verifica se o usuário é Administrador ou apenas usuário comum, caso Administrador, cria a SESSION na página de Administrador,
       Caso Usuário comum, cria a SESSION para a página comum
    */

    public function verCadastro(){

        // Caso os campos retornados não estejam em branco, executa a cadeia de comandos
        if($this->verDados()){

            $this->dirFile = '../db_json/'.$this->getId().'.json';
            
            // Verifica se o cadastro já existe
            switch(file_exists($this->dirFile)){

                // Caso exista, joga o cadastro em um Array associativo
                case true:

                $this->arrContent = file_get_contents($this->dirFile) or die('ERRO : Não foi possível realizar a consulta no banco!');
                $this->arrJson = json_decode($this->arrContent);
                $this->myId = $this->getId();
                
                
                // Verifica se a senha repassada via POST é igual a senha gravada no JSON DB
                if($this->getSenha() == $this->arrJson->senha){
                        $this->userSession = $this->getId();
                        $_SESSION["usuario_logado"] = $this->userSession;
                        echo "Autenticado!";
                        echo "<script>window.location.replace('../view/home.php')</script>";
 
                } else {
                echo "Senha incorreta!";
                }

                break;

                case false:
                echo "Usuário não cadastrado, realize o cadastro!";
                break;
            }

        } else {
            echo "Verifique se não há campos em branco!";
        }
    }



}


// SET DE ATRIBUTOS UTILIZADO NAS FUNÇÕES
// ATRIBUTOS HERDADOS DA CLASSE USUARIO
// VALORES COLETADOS VIA POST

$usuario = new Entrar;
$usuario->setEmail($_POST['usuario']);
$usuario->setSenha(base64_encode($_POST['senha']));
$usuario->setId(base64_encode($usuario->getEmail()));
$usuario->verCadastro();

?>
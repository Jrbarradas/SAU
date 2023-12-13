<?php

include '../controller/toolsAuth.php';

/*
Esta classe serve como uma forma de proteger as ferramentas administrativas, de forma que, checando a permissão em toolsAuth,
é apenas exibido as ferramentas administrativas no menu para quem tem a permissão correta, porém, via URL a vulnerabilidade ainda
poderia acontecer, então com esta classe é verificado dentro da ferramenta se há ou não permissão para acesso a tal...
*/
 
class permissaoUsuario extends toolsAuth {
    
    public $temPermissao;

    public function verPermissao(){

        $this->dirFile = '../db_json/'.$_SESSION['usuario_logado'].'.json';
        switch(file_exists($this->dirFile)){
            case true:
                $this->arrDados = file_get_contents($this->dirFile) or die('ERRO : Não foi possível realizar a consulta no banco!');
                $this->arrJson = json_decode($this->arrDados);
                if($this->arrJson->permissao == 1){
                    echo "<center>";
                    echo "Você não tem permissão para visualizar essa página!<br>";
                    echo "LOG Registrado no servidor...<br>";
                    echo "</center>";
                    die;
                } elseif($this->arrJson->permissao == 2) {

                    return true;

                } else{
                    echo "<center>";
                    echo "Você não tem permissão para visualizar essa página!<br>";
                    echo "LOG Registrado no servidor...<br>";
                    echo "Permissao Inválida - Protocolo : 00". $this->arrJson->permissao;
                    echo "</center>";
                    die;
                }
                break;
            case false:
                echo "<center>";
                echo "Você não tem permissão para visualizar essa página!<br>";
                echo "LOG Registrado no servidor...<br>";
                echo "</center>";
                die;
                break; 
        }
    }


}


?>
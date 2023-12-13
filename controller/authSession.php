<?php

session_start();


include PATH.'/model/usuarioClass.php';

class Autenticado extends Usuario{

    public $arrDados;
    public $arrJson;
    public $dirFile;
    public $dirWrite;
    public $permissao;

    
    /* Verifica se a SESSION está setada, caso esteja setada, prossegue para a subclasse toolsAuth,
    Caso não esteja, redireciona para a página de Login
    */
    
    private function verSession(){  
        if(!isset($_SESSION["usuario_logado"])){
            return false;
        } else{
            return true;
        }
    }

    public function userSit(){

        if($this->verSession()){
        } else{
            echo "<script>window.location.replace('http://sau.spacecom.com.br/sau/view/index.php');</script>";
            exit;
        }

    }

}


$usuario = new Autenticado;
$usuario->userSit();


?>
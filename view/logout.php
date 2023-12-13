<?php

include '../controller/toolsAuth.php';

class Logout{
    public function eSession(){
        if(isset($_SESSION['usuario_logado'])){       
            unset($_SESSION['usuario_logado']);
            echo "<script>window.location.replace('./index.php');</script>";
        } else {
            echo "<script>window.location.replace('./index.php');</script>";
        }
    }
}

$usuario = new Logout;
$usuario->eSession();

?>
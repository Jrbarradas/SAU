<?php

/* Alterar para o PWD no Linux AWS, antes de implantar */

define("PATH", "/var/www/html/sau");
include PATH.'/controller/authSession.php';

class toolsAuth extends Autenticado{

    /* 
    Como é uma extends de Autenticado, só é executada caso a SESSION esteja setada, conforme indicado na classe Autenticado
    Caso esteja setada, mostra as ferramentas de acordo com o nível de permissão do usuário, caso não esteja setada, redireciona
    para a página de login!
    */

    public function __constructor(){

        $this->dirFile = '../db_json/'.$_SESSION['usuario_logado'].'.json';
        $this->arrDados = file_get_contents($this->dirFile);
        $this->arrJson = json_decode($this->arrDados);
    }
        
    private function verDados(){

        $this->dirFile = '../db_json/'.$_SESSION['usuario_logado'].'.json';
        $this->arrDados = file_get_contents($this->dirFile);
        $this->arrJson = json_decode($this->arrDados);
}


    public function mostraNome(){

        echo $this->arrJson->nome;

    }

    public function mostraEmail(){

        echo $this->arrJson->email;

    }
    
    public function mostraSenha(){

        echo $this->arrJson->senha;
    }

    public function mostraPermissao(){

        echo $this->arrJson->permissao;

    }

    // Set de Menu de acordo com a Permissão do usuário

    private function adminTools(){
        echo '<li><a href="home.php"><i class="bx bx-home"></i> <span>Home</span></a></li>';
        echo '<li><a href="#" data-toggle="modal" data-target="#editarPerfil"><i class="bx bx-user"></i> <span>Perfil</span></a></li>';
        echo '<li><a href="tasks.php"><i class="bx bx-task"></i>Tarefas</a></li>';
        echo '<li><a href="#" data-toggle="modal" data-target="#invSeleciona"><i class="bx bx-spreadsheet"></i>Inventário</a></li>';
        echo '<li><a href="central.php"><i class="bx bx-camera-home"></i>Desktop Viewer</a></li>';;
        echo '<li><a href="editar.php"><i class="bx bx-list-plus"></i> <span>Usuários Cadastrados</span></a></li>';
        echo '<li><a href="atividades.php"><i class="bx bx-user-voice"></i><span>Atividades</span></a></li>';
        echo '<li><a href="logout.php"><i class="bx bx-server"></i> Logout</a></li>';
        
    }

    private function userTools(){
        echo '<li><a href="home.php"><i class="bx bx-home"></i> <span>Home</span></a></li>';
        echo  '<li><a href="#" data-toggle="modal" data-target="#editarPerfil"><i class="bx bx-user"></i> <span>Perfil</span></a></li>';
        echo '<li><a href="tasks.php"><i class="bx bx-task"></i>Tarefas</a></li>';
        echo '<li><a href="logout.php"><i class="bx bx-server"></i> Logout</a></li>';

    }

    private function admintreTools(){
        echo '<li><a href="home.php"><i class="bx bx-task"></i><span>Provas Realizadas</span></a></li>';
        echo '<li><a href="avaliacoes.php"><i class="bx bx-stats"></i>Avaliações</a></li>';
        echo  '<li><a href="#" data-toggle="modal" data-target="#editarPerfil"><i class="bx bx-user"></i> <span>Perfil</span></a></li>';
        echo '<li><a href="logout.php"><i class="bx bx-server"></i> Logout</a></li>'; 

    }

    private function usertreTools(){
        echo '<li><a href="home.php"><i class="bx bx-task"></i><span>Prova</span></a></li>';
        echo '<li><a href="avaliar.php"><i class="bx bx-stats"></i>Avaliar</a></li>';
        echo '<li><a href="#" data-toggle="modal" data-target="#editarPerfil"><i class="bx bx-user"></i> <span>Perfil</span></a></li>';
        echo '<li><a href="logout.php"><i class="bx bx-server"></i> Logout</a></li>'; 
    }

    private function adminCentral(){
        echo '<li><a href="home.php"><i class="bx bx-home"></i> <span>Home</span></a></li>';
        echo  '<li><a href="#" data-toggle="modal" data-target="#editarPerfil"><i class="bx bx-user"></i> <span>Perfil</span></a></li>';
        echo '<li><a href="central.php"><i class="bx bx-camera-home"></i>Desktop Viewer</a></li>';;
        echo '<li><a href="logout.php"><i class="bx bx-server"></i> Logout</a></li>';
    }

    // Nova Verificação de Menu - Totalmente dinamico, de acordo com a permissão do usuário
    public function dadosView(){
        switch($this->arrJson->permissao){
            // Usuário SAU
            case 1:
            $this->userTools();
            break;
            // Administrador SAU
            case 2:
            $this->adminTools();
            break;
            // Instrutor Treinamento
            case 3:
            $this->admintreTools();
            break;
            // Usuário Treinamento
            case 4:
            $this->usertreTools();
            break;
            // Supervisor Central
            case 5:
            $this->adminCentral();
            break;

            default:
            echo "<script>alert('Protocolo : 004 - Undefined Permission');</script>";
            echo "<script>window.location.href='./index.php'</script>";
            $_SESSION['usuario_logado']="";
            die;
        }

    }

    


}





?>
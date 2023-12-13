<?php
/* 
Verifica se o Usuário tem permissão de Instrutor Treinamento
Caso não tenha, retorna uma página de erro, caso tenha, exibe normalmente o conteúdo...
 */

include 'toolsAuth.php';

class treAuth extends toolsAuth {
    public function verPermissao(){
    $this->dirFile = '../db_json/'.$_SESSION['usuario_logado'].'.json';
    switch(file_exists($this->dirFile)){
        case true:
            $this->arrDados = file_get_contents($this->dirFile) or die('ERRO : Não foi possível realizar a consulta no banco!');
            $this->arrJson = json_decode($this->arrDados);
            if($this->arrJson->permissao == 3){
                return true;
            } else {
                // Retorna uma págine de erro para o usuário
                include '../view/error_page.php';
                die;
            }
            break;
         case false:
                // Retorna uma página de erro para o usuário
                include '../view/error_page.php';
                die;
                break;
    }

}

}

?>
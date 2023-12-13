<?php

/* Verifica a Permissão do Usuário */
include './adminAuth.php';
$list = new permissaoUsuario;
$list->verPermissao();
/*
 Verifica no diretório todos os usuários cadastrados e retorna isso em um JSON decode 
 Após o retorno de todos os usuários, todos são armazenados em uma array JSON
*/
class tabelaUsers{

    private $dir;
    private $arquivos;
    private $fileContent;
    private $dadosJson;
    private $jsonEncode;

        public function __constructor(){
            $this->dir = '../db_json/';
            $this->arquivos = glob("$this->dir{*.json}", GLOB_BRACE);
        }

            public function populaTabela(){

                for($i=0;$i<count($this->arquivos);$i++){
                    $this->fileContent[$i] = file_get_contents('../db_json/'.$this->arquivos[$i]);
                    $this->dadosJson[$i] = json_decode($this->fileContent[$i]);
                    /*
                    O If abaixo verifica o número de permissão do Usuário e realiza a inserção diretamente na tabela, não alterando o DB Json
                    Ou seja, acaba sendo uma modificação visual para a tela de Editar Usuários...
                    */
                    if($this->dadosJson[$i]->permissao == 1){
                        $this->dadosJson[$i]->permissao = "1 - Usuário SAU";
                    }elseif($this->dadosJson[$i]->permissao == 2){
                        $this->dadosJson[$i]->permissao = "2 - Administrador SAU";
                    }elseif($this->dadosJson[$i]->permissao == 3){
                        $this->dadosJson[$i]->permissao = "3 - Instrutor Treinamento";
                    }elseif($this->dadosJson[$i]->permissao == 4){
                        $this->dadosJson[$i]->permissao = "4 - Usuário Treinamento";
                    }elseif($this->dadosJson[$i]->permissao == 5){
                        $this->dadosJson[$i]->permissao = "5 - Supervisor Central";
                    }
                    // Mesma função do IF, porém não é necessário verificar, só realiza a inserção
                    $this->dadosJson[$i]->id = "<button type ='submit' id='btnviewUsers".$i."'data-toggle='modal' data-target='#visualizarUsuario' class ='sau-btn visualizar' value=".$this->dadosJson[$i]->id.">"."Visualizar";
                }

                $this->jsonEncode = json_encode($this->dadosJson);
                echo $this->jsonEncode;

            }

}

$usersTable = new tabelaUsers;
$usersTable->__constructor();
$usersTable->populaTabela();


?>
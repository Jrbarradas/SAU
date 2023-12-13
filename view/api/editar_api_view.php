<?php

    class dadosUsuario{

        private $id;
        public $operacao;
        private $dirStorage;
        private $arrUser;
        protected $nome;
        protected $email;
        protected $senha;
        protected $permissao;
        private $arrModify;

        // Constructor será utilizado para setar as variáveis
        public function __constructor(){

            $this->id = strip_tags(stripslashes(filter_input(INPUT_GET,'id')));
            $this->nome = strip_tags(stripslashes(filter_input(INPUT_GET,'nome')));
            $this->email = strip_tags(stripslashes(filter_input(INPUT_GET,'email')));
            $this->senha = strip_tags(stripslashes(filter_input(INPUT_GET,'senha')));
            $this->permissao = strip_tags(stripslashes(filter_input(INPUT_GET,'permissao')));
            $this->operacao = strip_tags(stripslashes(filter_input(INPUT_GET,'operacao')));
            $this->dirStorage = "../../db_json/".$this->id.".json";

        }

        // Verifica se o ID repassado via POST é valido ou não 
        public function verificaID(){

            $this->__constructor();

            if($this->id <> null){
                return true;
            }else{
                return false;
            }
        }

        // Caso o ID seja válido e o usuário exista preenche a modal, caso não seja válido ou o usuário não exista é retornado a mensagem de erro
        public function exibeDados(){

            if($this->verificaID()){
                switch(file_exists($this->dirStorage)){
                    case true:
                        // Abre o arquivo que armazena os dados do usuário
                        $this->arrUser = file_get_contents($this->dirStorage);
                        $this->arrUser = json_decode($this->arrUser);

                        /* HTML Responsável por preencher a Modal */
                        echo '<li class="list-group-item"><p class="font-italic" style="color:black;">Informações Gerais</p>'.PHP_EOL;
                        echo "<div class='input-group'>
                                <div class='input-group-prepend'>
                                <span class='input-group-text'>Nome</span>
                                ".PHP_EOL;
                        echo "<input type='text' class='form-edit nome' style='width:45%' id='txtNomeUser".$this->arrUser->id."'value='".$this->arrUser->nome."' required>".PHP_EOL;
                        echo "<span class='input-group-text' style='margin-left:20px'>Email</span>";
                        echo "<input type='text' class='form-edit email' style='width:80%' id='txtEmailUser".$this->arrUser->id."'value='".$this->arrUser->email."' required>".PHP_EOL;
                        echo "</li>";

                        echo '<li class="list-group-item"><p class="font-italic">Permissões e Segurança</p>'.PHP_EOL;
                        echo "<div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Senha</span>
                        ".PHP_EOL;
                        echo "<input type='password' class='form-edit senha' style='width:60%' id='txtSenhaUser".$this->arrUser->id."'value='".$this->arrUser->senha."' required>".PHP_EOL;
                        echo "<span class='input-group-text' style='margin-left:20px'>Permissão</span>";
                        echo "<input list='permissao' class='permissao' style='width:20%' value='".$this->arrUser->permissao."'>".PHP_EOL;
                        echo "<datalist id='permissao'>
                            <option value='1'>Usuário SAU</option>
                            <option value='2'>Administrador SAU</option>
                            <option value='3'>Instrutor Treinamento</option>
                            <option value='4'>Usuário Treinamento</option>
                            </datalist>";
                        echo "</li>";
                        echo '<li class="list-group-item">';
                        echo "<span class='badge badge-danger' id='updateUser'></span>";
                        echo "</li>";
                        /* Fim do HTML Responsável por preencher a Modal */
                        break;

                        case false:
                            echo "ERRO : O Usuário não existe!";
                            break;
                }

             }else{

                echo "ERRO : ID inválido!";
                print_r($php_errormsg);
            }

        }

    }


    $visualizar = new dadosUsuario;
    $visualizar->exibeDados();
    
  

?>
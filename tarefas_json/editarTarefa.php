<?php
            class postRedmine {
                // Variáveis utilizadas 
                public $comentario;
                public $id_tarefa;

                    // Verifica se as variáveis foram setadas, retorna true ou false
                    public function verificaCampos(){
                        if($this->comentario && $this->id_tarefa <> null){
                            return true;
                        } else {
                            return false;
                        }
                    }

                    // Caso as variáveis tenham sido setadas, realiza a requisição via API para o redmine
                    // Se tudo ocorrer bem, o comentário é adicionado a tarefa.
                    public function adicionaComentario(){
                        if($this->verificaCampos()){
                        $this->command = shell_exec("curl -v -H 'Content-Type: application/json' -X PUT -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$this->id_tarefa.json -d '{\"issue\": {\"notes\": \"$this->comentario\"}}'");
                        } else {
                            // Adicionar isto em um LOG futuramente 
                            // Registrar a Requisição, nome do usuário, hora e erro
                            echo "Verifique se não há campos em branco!";

                        }

                    }

            }

        // Coleta os argumentos passados e os junta, formando o comentário.
        for($i=2;$i<count($argv);$i++){
            $comentario = array(
                "comentario"=> $comentario["comentario"]. " ". $argv[$i]
            );
        }

// Set de atributos e chamada das funções...
$task = new postRedmine;
$task->id_tarefa = $argv[1];
$task->comentario = $comentario["comentario"]; 
$task->adicionaComentario();
        

       

   





?>

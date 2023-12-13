<?php

include 'toolsAuth.php';


            class postRedmine {

                public $comentario;
                public $id_tarefa;
                
                    public function verificaCampos(){
                        if($this->comentario && $this->id_tarefa <> null){
                            return true;
                        } else {
                            return false;
                        }
                    }


                    public function adicionaComentario(){

                        if($this->verificaCampos()){
                        
                        try{

                        $this->command = shell_exec("curl -v -H 'Content-Type: application/json' -X PUT -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$this->id_tarefa.json -d '{\"issue\": {\"notes\": \"$this->comentario\"}}'");
                        
                        }catch(Exception $err){
                            echo $err->getMessage();
                            echo $err->getLine();
                        }
                        
                        } else {

                            echo "Verifique se não há campos em branco!";
                        }

                    }

            }


$task = new postRedmine;
$task->id_tarefa = $_GET['i'];
$task->comentario = $_GET['c']; 
$task->adicionaComentario();




?>

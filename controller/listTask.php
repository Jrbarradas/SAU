<?php

/*
Verifica se há dados referentes a tarefa para este usuário, caso haja, mostra as tarefas e os dados na aba Task, caso não haja,
Gera um JSON que basicamente retorna três pontos em cada TD, esse tratamento é feito para que o DataTables não retorne erro de Jquery...
Lembrando que a TASK é mostrada de acordo com o usuário, a IDEIA mais pra frente é que o Administrador consiga ver todas as tarefas abertas
E o usuário apenas a dele(No momento isso já ocorre);
*/

include 'toolsAuth.php';

class tasksRedmine extends toolsAuth{

   private $url;
   private $validJson;
   private $sessionDecode;
   private $arrayErr;
   private $jsonErr;
   private $verificaSite;

            public function __constructor(){

                $this->sessionDecode = base64_decode($_SESSION['usuario_logado']);
                $this->url = 'http://sau.spacecom.com.br/sau/tarefas_json/tarefa'.$this->sessionDecode.'.json';
                $this->arrayErr = array([
                    "tarefa"=>"...",
                    "titulo"=>"...",
                    "status"=>"...",
                    "prioridade"=>"...",
                    "responsavel"=>"..."
                ]);
                $this->jsonErr = json_encode($this->arrayErr);
                $this->verificaSite = get_headers($this->url);

            }

                public function tabelaValida(){

                    if($this->verificaSite[0] == 'HTTP/1.1 200 OK'){

                        $this->validJson = file_get_contents($this->url);
                        $this->arrJson = json_decode($this->validJson);
                           
                        for($i=0;$i<count($this->arrJson);$i++){
                                $this->arrJson[$i]->responsavel = "<button type='submit' id='btnTask".$this->arrJson[$i]->tarefa."' data-toggle='modal' data-target='#taskModal' class='sau-btn taskView' value='".$this->arrJson[$i]->tarefa."'>Visualizar</button>";
                            }
                               
                        $this->validJson = json_encode($this->arrJson);
                        echo $this->validJson;
                        
            
                    } else {
            
                        echo $this->jsonErr;
            
                    }


                }


}



$tabelaRedmine = new tasksRedmine;
$tabelaRedmine->__constructor();
$tabelaRedmine->tabelaValida();


?>
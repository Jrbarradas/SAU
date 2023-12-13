<?php
date_default_timezone_set('America/Sao_Paulo');
include './dynamic/head.php';
include '../controller/toolsAuth.php';

    class taskInfo{

        public $taskid;
        private $cmd;
        private $cmdJson;
        private $cmdArr;


        public function __constructor(){
            $this->cmd = shell_exec("curl -v -H 'Content-Type: application/json' -X GET -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$this->taskid.json?include=journals");
            $this->cmdJson = json_decode($this->cmd);
        }

            public function subject(){
                echo $this->cmdJson->issue->subject;
            }

                public function description(){
                    echo $this->cmdJson->issue->description;
                }

                    public function start_date(){
                        echo $this->cmdJson->issue->start_date;
                    }

                        public function updated_on(){
                            $this->update = new Datetime($this->cmdJson->issue->updated_on);
                            $this->fuso = new DateTimeZone('America/Sao_Paulo');
                            $this->update->setTimeZone($this->fuso);
                            echo $this->update->format('D-m-y H:i:s');
                        }

                            public function status(){
                              echo $this->cmdJson->issue->status->name;
                            }

                             public function prioridade(){
                                 echo $this->cmdJson->issue->priority->name;
                             }


                                public function responsavel(){
                                    if(isset($this->cmdJson->issue->assigned_to->name)){
                                     echo $this->cmdJson->issue->assigned_to->name;
                                    } else{
                                      echo " - ";
                                  }
                                }

                                            public function notes(){
                                            // Conta todos os dados do Journals, armazenada na variável journals o caminho desses dados
                                            // Após isso, realiza um foreach no caminho e joga os dados na dadosAPI
                                            // Acesso diratemente a chave necessária na variável dadosAPI através do foreach
                                            $this->sizeJson = count($this->cmdJson->issue->journals);
                                            $this->journals = $this->cmdJson->issue->journals;
                                            if($this->sizeJson > 0){
                                                        foreach($this->journals as $this->dadosAPI){
                                                            $this->data = new Datetime($this->dadosAPI->created_on);
                                                            $this->fuso = new DateTimeZone('America/Sao_Paulo');
                                                            $this->data->setTimeZone($this->fuso);
                                                            if($this->dadosAPI->notes == null){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('D-m-y H:i:s'). "<br> Autor : ". $this->dadosAPI->user->name."<br> Comentário :  Prioridade da tarefa alterada! <tr></td> \n";
                                                            } else {
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('D-m-y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário :  ". strip_tags($this->dadosAPI->notes)."<tr></td> \n";
                        
                                                            }
                                                        }
                                            } else {

                                                echo "Não possui interações ainda...";

                                            }
                                                
                                            }
                        
                    }
                    $infoTask = new taskInfo;
                    $infoTask->taskid = filter_input(INPUT_GET,'id');
                    $infoTask->__constructor();
              
?>



          
<div class="subject" style="margin-top:0px">
<div><h3><center><?php echo $infoTask->subject();?></center></h3></div>
</div>

                        <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Estado</th>
                            <th scope="col">Prioridade</th>
                            <th scope="col">Inicio</th>
                            <th scope="col">Atualização</th>
                            <th scope="col">Atribuido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><?php echo $infoTask->status();?></td>
                            <td><?php echo $infoTask->prioridade();?></td>
                            <td><?php echo $infoTask->start_date();?></td>
                            <td><?php echo $infoTask->updated_on();?></td>
                            <td><?php echo $infoTask->responsavel();?></td>
                            </tr>
                        </tbody>
                        </table>
                                    <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                <th scope="col" style="text-align:center">Descriçao</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td><?php echo $infoTask->description();?></td>
                                            <tr>
                                            </tbody>
                                            </table>
                                            
                                     
                                            <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                <th scope="col" style="text-align:center">Comentários</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>

                                            <table class="table table-striped">
                                            <?php echo $infoTask->notes();?>
                                            </table>
                                            <form  method="POST" action="./dynamic/editarTarefa.php">
                                            <textarea name="comentario" class="form-control" id="comentario" autocomplete="off" autofocus required></textarea>
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $infoTask->taskid?>" autocomplete="on">
                                            <!-- <center><input type="submit"  style="margin-top:20px" class="sau-btn" value="Enviar" id="btnCom"></center> -->
                                          </form>
                                          </form>
                              </p>
                           </div>
                      </section>

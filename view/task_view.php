<?php
date_default_timezone_set('America/Sao_Paulo');
include './dynamic/head.php';
include '../controller/toolsAuth.php';

    class taskInfo{

        public $taskid;
        private $cmd;
        private $cmdJson;
        private $cmdArr;
        private $replace;


        public function __constructor(){
            $this->cmd = shell_exec("curl -v -H 'Content-Type: application/json' -X GET -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$this->taskid.json?include=journals");
            $this->cmdJson = json_decode($this->cmd);
            $this->replace = array("[[","]]");
        }

            public function subject(){
                echo $this->cmdJson->issue->subject;
            }

                public function description(){
                    echo $this->cmdJson->issue->description;
                }

                    public function start_date(){
                        $this->start_date = new Datetime($this->cmdJson->issue->start_date);    
                        echo $this->start_date->format('d/m/Y');
                    }

                        public function updated_on(){
                            $this->update = new Datetime($this->cmdJson->issue->updated_on);
                            $this->fuso = new DateTimeZone('America/Sao_Paulo');
                            $this->update->setTimeZone($this->fuso);
                            echo $this->update->format('d/m/Y H:i:s');
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
                                                            /* Exibição e tratamento de comentários */
                                                            // Alteração de Status
                                                            if($this->dadosAPI->notes == null){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ". $this->dadosAPI->user->name."<br> Comentário :  Prioridade da tarefa alterada! <tr></td> \n";
                                                            // Imagem
                                                            }else if(strpos($this->dadosAPI->notes,'jpg') || strpos($this->dadosAPI->notes,'.jpeg') || strpos($this->dadosAPI->notes,".gif") || strpos($this->dadosAPI->notes,"png") || strpos($this->dadosAPI->notes,"bmp")){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo! <a href='".str_replace("!","",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/img-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            // .docx
                                                            }else if(strpos($this->dadosAPI->notes,'docx')){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo! <a href='".str_replace($this->replace,"",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/docx-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            // .pdf
                                                            }else if(strpos($this->dadosAPI->notes,'pdf')){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo!  <a href='".str_replace($this->replace,"",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/pdf-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            // .txt
                                                            }else if(strpos($this->dadosAPI->notes,'txt')){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo!  <a href='".str_replace($this->replace,"",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/txt-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            // .xlsx
                                                            }else if(strpos($this->dadosAPI->notes,'xlsx')){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo!  <a href='".str_replace($this->replace,"",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/xls-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            // .xls
                                                            }else if(strpos($this->dadosAPI->notes,'xls')){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo!  <a href='".str_replace($this->replace,"",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/xls-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            }else if(strpos($this->dadosAPI->notes,'avi')){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo!  <a href='".str_replace($this->replace,"",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/avi-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            // .mp4
                                                            }else if(strpos($this->dadosAPI->notes,'mp4')){
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário : Anexou um arquivo!  <a href='".str_replace($this->replace,"",$this->dadosAPI->notes)."'target='_blank'><img src='./Fotos/mp4-icon.png'alt='Acervo SAU' width='50' height='50'></a><tr></td> \n";
                                                            // Comentários sem Anexo
                                                            }else{
                                                                echo "<tr class='Info'><td>". "Data : ". $this->data->format('d/m/Y H:i:s'). "<br> Autor : ".$this->dadosAPI->user->name. "<br> Comentário :  ". strip_tags($this->dadosAPI->notes)."<tr></td> \n";
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
                                        <td id="status"><?php echo $infoTask->status();?></td>
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
                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $infoTask->taskid?>" autocomplete="on">
                                        </p>
                                    </div>
                                </section>

<?php

class Tarefa {

    private $txtSessao;
    private $txtProtocolo;
    private $arqJson;
    private $script;
    private $caminhoTarefa;
    private $fileContent;
    private $scrapJson;
    private $idTask;
    private $removeLog;
    private $reqAPI;
    private $resAPI;
    private $resJSON;
    private $resArr;
    private $file;

        public function __constructor(){
            $this->txtSessao = filter_input(INPUT_POST, 'txtSessao');
            $this->txtProtocolo = filter_input(INPUT_POST, 'txtProtocolo');
            $this->arqJson = base64_decode($this->txtSessao).'.json';
            $this->caminhoTarefa = "/var/www/html/owncloud/beta/sau/tarefas_json/$this->arqJson";
            $this->caminhoJson = "/var/www/html/owncloud/beta/sau/tarefas_json/tarefa$this->arqJson";
        }


            public function abreTarefa(){

                    if(trim($this->txtProtocolo == "001")){

                        $this->script = shell_exec("php /var/www/html/owncloud/beta/sau/script.php | tee ~ /var/www/html/owncloud/beta/sau/tarefas_json/$this->arqJson") or die('Erro de permissao!');
                        
                         if(file_exists($this->caminhoTarefa)){
                                    // Pega o LOG salvo após a tarefa ser aberta, filtra e salva o número ID da mesma
                                    $this->fileContent = file_get_contents($this->caminhoTarefa);
                                    $this->scrapJson = explode('{"issue":{"id":',$this->fileContent);
                                    $this->idTask = explode(',"project":{"id":',$this->scrapJson[1]);
                                    // Retorna o ID da tarefa
                                    echo "Tarefa Aberta #", $this->idTask[0];
                                    $this->removeLog = shell_exec("rm /var/www/html/owncloud/beta/sau/tarefas_json/$this->arqJson");
                                    // Coleta os dados da tarefa diretamente pela API e armazena em um JSON que será exibido na aba Tarefas
                                    $this->reqAPI = shell_exec("curl -v -H 'Content-Type: application/json' -X GET -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/".$this->idTask[0].".json");
                                    $this->resJSON = json_decode($this->reqAPI);
                                    /* 
                                    Verifica se o usuário já possui tarefas criadas e armazenadas no JSON, caso possua, apenas incrementa os dados no JSON e salva o arquivo novamente 
                                    Caso não possua, realiza a criação do JSON com os dados da primeira tarefa!
                                    */
                                    if(file_exists($this->caminhoJson)){
                                            $this->content = file_get_contents("/var/www/html/owncloud/beta/sau/tarefas_json/tarefa$this->arqJson");
                                            $this->conDecode = json_decode($this->content, true);
                                            $this->conDecode[] = array(
                                                "tarefa"=>$this->idTask[0],
                                                "status"=>$this->resJSON->issue->status->name,
                                                "prioridade"=>$this->resJSON->issue->priority->name,
                                                "responsavel"=>$this->resJSON->issue->assigned_to->name
                                            );
                                            $this->resJSON = json_encode($this->conDecode);
                                            $this->file = fopen("/var/www/html/owncloud/beta/sau/tarefas_json/tarefa$this->arqJson",'w');
                                            fwrite($this->file,$this->resJSON);
                                            fclose($this->file);
    
                                    } else {
                                    
                                        $this->resArr = array([
                                            "tarefa"=>$this->idTask[0],
                                            "status"=>$this->resJSON->issue->status->name,
                                            "prioridade"=>$this->resJSON->issue->priority->name,
                                            "responsavel"=>$this->resJSON->issue->assigned_to->name
                                    ]);

                                    $this->resJSON = json_encode($this->resArr);
                                    $this->file = fopen("/var/www/html/owncloud/beta/sau/tarefas_json/tarefa$this->arqJson",'w+');
                                    fwrite($this->file,$this->resJSON);
                                    fclose($this->file);
                                }
                                    
                        } else {
                            "Erro na request!";
                        }
                        
                    } else {

                        echo "Erro na request!";

                    }

            }



}

$open = new Tarefa;
$open->__constructor();
$open->abreTarefa();


?>
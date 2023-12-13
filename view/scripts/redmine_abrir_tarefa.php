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
            $this->caminhoTarefa = "/var/www/html/sau/tarefas_json/$this->arqJson";
            $this->caminhoJson = "/var/www/html/sau/tarefas_json/tarefa$this->arqJson";
        }


            public function abreTarefa(){
                    if(trim($this->txtProtocolo<>null)){
                        switch(trim($this->txtProtocolo)){
                            // NO POWER - 001
                            case "001":
                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/nopower_001.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                break;
   
                                case "002":
                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/nopower_001.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                    break;

                                    case "003":
                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/nopower_001.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                        break;

                                        case "004":
                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/nopower_001.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                            break;

                                            // REDE - 008
                                              case "008":
                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/rede_008.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                break;
                                                // REDE - 005
                                                case "005":
                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/rede_005.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                    break;
                                                    // REDE - 006
                                                    case "006":
                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/rede_006.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                        break;
                                                        // REDE - 014
                                                        case "014":
                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/rede_014.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                        break;
                                                        // REDE - 012
                                                        case "012":
                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/rede_012.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                        break;
                                                        // REDE - 010
                                                        case "010":
                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/rede_010.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                            break;
                                                            // REDE - 009
                                                            case "009":
                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/rede_009.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                break;
                                                                // COMPONENTES - 015
                                                                case "015":
                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/comp_015.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                    break;
                                                                    // COMPONENTES - 016
                                                                    case "016":
                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/comp_016.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                        break;
                                                                        // COMPONENTES - 018
                                                                        case "018":
                                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/comp_018.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                            break;
                                                                            // COMPONENTES - 019
                                                                            case "019":
                                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/comp_019.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                break;
                                                                                // LENTIDAO - 022
                                                                                case "022":
                                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/lentidao_022.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                    break;
                                                                                    // LENTIDAO -024
                                                                                    case "024":
                                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/lentidao_024.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                        break;
                                                                                        // LENTIDAO - 025
                                                                                        case "025":
                                                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/lentidao_025.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                            break;
                                                                                            // LENTIDAO - 027
                                                                                            case "027":
                                                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/lentidao_027.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                                break;
                                                                                                // LENTIDAO - 028
                                                                                                case "028":
                                                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/lentidao_028.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                                    break;
                                                                                                    // SINS - 033
                                                                                                    case "033":
                                                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/sins_033.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                                        break;
                                                                                                        // SINS - 031
                                                                                                        case "031":
                                                                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/sins_031.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                                            break;
                                                                                                            // SINS - 032
                                                                                                            case "032":
                                                                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/sins_032.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');
                                                                                                                break;
                                                                                                                // SINS - 030
                                                                                                                case "030":
                                                                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/sins_030.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                    break;
                                                                                                                    // NO BOOT - 053
                                                                                                                    case "053":
                                                                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/noboot_053.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                        break;
                                                                                                                        // NO BOOT - 050
                                                                                                                        case "050":
                                                                                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/noboot_050.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                            break;
                                                                                                                            // NO BOOT - 049
                                                                                                                            case "049":
                                                                                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/noboot_049.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                break;
                                                                                                                                // NO BOOT - 052
                                                                                                                                case "052":
                                                                                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/noboot_052.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                    break;
                                                                                                                                    // NO BOOT - 051
                                                                                                                                    case "051":
                                                                                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/noboot_051.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                        break;
                                                                                                                                        // IMPRESSORA - 048
                                                                                                                                        case "048":
                                                                                                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/impressora_048.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                            break;
                                                                                                                                            // IMPRESSORA - 040
                                                                                                                                            case "040":
                                                                                                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/impressora_040.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                break;
                                                                                                                                                // IMPRESSORA - 042
                                                                                                                                                case "042":
                                                                                                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/impressora_042.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                    break;
                                                                                                                                                    // IMPRESSORA - 046
                                                                                                                                                    case "046":
                                                                                                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/impressora_046.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                        break;
                                                                                                                                                        // IMPRESSORA - 047
                                                                                                                                                        case "047":
                                                                                                                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/impressora_047.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                            break;
                                                                                                                                                            // IMPRESSORA - 044
                                                                                                                                                            case "044":
                                                                                                                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/impressora_044.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                                break;
                                                                                                                                                                // IMPRESSORA - 045
                                                                                                                                                                case "045":
                                                                                                                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/impressora_045.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                                    break;
                                                                                                                                                                    // OFFICE - 034
                                                                                                                                                                    case "034":
                                                                                                                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/office_034.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                                        break;
                                                                                                                                                                        // OFFICE - 034
                                                                                                                                                                        case "035":
                                                                                                                                                                            $this->script = shell_exec("php /var/www/html/sau/view/scripts/office_035.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                                            break;
                                                                                                                                                                            // OFFICE - 038
                                                                                                                                                                            case "038":
                                                                                                                                                                                $this->script = shell_exec("php /var/www/html/sau/view/scripts/office_038.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                                                break;
                                                                                                                                                                                // OFFICE - 037
                                                                                                                                                                                case "037":
                                                                                                                                                                                    $this->script = shell_exec("php /var/www/html/sau/view/scripts/office_037.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                                                    break;
                                                                                                                                                                                    // OFFICE - 036
                                                                                                                                                                                    case "036":
                                                                                                                                                                                        $this->script = shell_exec("php /var/www/html/sau/view/scripts/office_036.php | tee ~ /var/www/html/sau/tarefas_json/$this->arqJson") or die('ERRO : Permission Denied - REDMINE OPENING TASK');                                                                                                                   
                                                                                                                                                                                        break;
                                                                                                                                                    
                        }
                        
                         if(file_exists($this->caminhoTarefa)){
                                    // Pega o LOG salvo após a tarefa ser aberta, filtra e salva o número ID da mesma
                                    $this->fileContent = file_get_contents($this->caminhoTarefa);
                                    $this->scrapJson = explode('{"issue":{"id":',$this->fileContent);
                                    $this->idTask = explode(',"project":{"id":',$this->scrapJson[1]);
                                    // Retorna o ID da tarefa
                                    echo "Tarefa Aberta #", $this->idTask[0];
                                    $this->removeLog = shell_exec("rm /var/www/html/sau/tarefas_json/$this->arqJson");
                                    // Coleta os dados da tarefa diretamente pela API e armazena em um JSON que será exibido na aba Tarefas
                                    $this->reqAPI = shell_exec("curl -v -H 'Content-Type: application/json' -X GET -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/".$this->idTask[0].".json");
                                    $this->resJSON = json_decode($this->reqAPI);
                                    /* 
                                    Verifica se o usuário já possui tarefas criadas e armazenadas no JSON, caso possua, apenas incrementa os dados no JSON e salva o arquivo novamente 
                                    Caso não possua, realiza a criação do JSON com os dados da primeira tarefa!
                                    */
                                    if(file_exists($this->caminhoJson)){
                                            $this->content = file_get_contents("/var/www/html/sau/tarefas_json/tarefa$this->arqJson");
                                            $this->conDecode = json_decode($this->content, true);
                                            $this->conDecode[] = array(
                                                "tarefa"=>$this->idTask[0],
                                                "titulo"=>$this->resJSON->issue->subject,
                                                "status"=>$this->resJSON->issue->status->name,
                                                "prioridade"=>$this->resJSON->issue->priority->name,
                                                "responsavel"=>$this->resJSON->issue->assigned_to->name
                                            );
                                            $this->resJSON = json_encode($this->conDecode);
                                            $this->file = fopen("/var/www/html/sau/tarefas_json/tarefa$this->arqJson",'w');
                                            fwrite($this->file,$this->resJSON);
                                            fclose($this->file);
    
                                    } else {
                                    
                                        $this->resArr = array([
                                            "tarefa"=>$this->idTask[0],
                                            "titulo"=>$this->resJSON->issue->subject,
                                            "status"=>$this->resJSON->issue->status->name,
                                            "prioridade"=>$this->resJSON->issue->priority->name,
                                            "responsavel"=>$this->resJSON->issue->assigned_to->name
                                    ]);

                                    $this->resJSON = json_encode($this->resArr);
                                    $this->file = fopen("/var/www/html/sau/tarefas_json/tarefa$this->arqJson",'w+');
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
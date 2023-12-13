<?php

// Verifica se o Usuário tem permissão de Administrador
    
    $apiVerify = strip_tags(filter_input(INPUT_GET,'token'));

    if(isset($apiVerify) && $apiVerify == "dGlAc3BhY2Vjb20uY29tLmJy"){

        $apiVerify = true;

    } else {

    include 'adminAuth.php';
    $admin = new permissaoUsuario;
    $admin->verPermissao();

    }
    

    // Conexão PDO com o DB
    require_once 'PDOClass.php';

        class invHardware extends conPDO{

            // Atributos da Query
            private $consulta;
            private $resul;
            public $localizacao;
            public $op;
            public $jsonNULO;

            // Função que verifica se a Conexão foi realizada com sucesso e exibe a query
            public function exibeDados(){
                if($this->conPDO()){

                    // Realiza a consulta, faz o fetch em OBJ, realiza o encode para JSON para ser inserido no DataTables
                    switch($this->op){

                    case "dell":
                     $this->consulta = $this->conectar->query("SELECT * FROM hwdesktop WHERE localizacao = \"$this->localizacao\"");
                     break;

                        case "variados":
                            $this->consulta = $this->conectar->query("SELECT * FROM hwdesktopnormal WHERE localizacao = \"$this->localizacao\"");
                            break;

                            case "notedell":
                            $this->consulta = $this->conectar->query("SELECT * FROM hwnotebookdell WHERE localizacao = \"$this->localizacao\"");
                            break;

                             case "notebooks":
                                $this->consulta = $this->conectar->query("SELECT * FROM hwnotebooknormal WHERE localizacao = \"$this->localizacao\"");
                                break;

                                case "rede":
                                    $this->consulta = $this->conectar->query("SELECT * FROM hwrede WHERE localizacao = \"$this->localizacao\"");
                                     break;

                                     case "nobreaks":
                                        $this->consulta = $this->conectar->query("SELECT * FROM hwnobreaks WHERE localizacao = \"$this->localizacao\"");
                                        break;

                                        case "gmg":
                                            $this->consulta = $this->conectar->query("SELECT * FROM hwgmg WHERE localizacao = \"$this->localizacao\"");
                                            break;

                                            case "voz":
                                                $this->consulta = $this->conectar->query("SELECT * FROM hwvoz WHERE localizacao = \"$this->localizacao\"");
                                                break;

                                                case "dados":
                                                    $this->consulta = $this->conectar->query("SELECT * FROM hwlink WHERE localizacao = \"$this->localizacao\"");
                                                    break;

                                                    case "servidores":
                                                        $this->consulta = $this->conectar->query("SELECT * FROM hwservidores WHERE localizacao = \"$this->localizacao\"");
                                                        break;

                                                        case "impressoras":
                                                            $this->consulta = $this->conectar->query("SELECT * FROM hwimpressoras WHERE localizacao = \"$this->localizacao\"");
                                                            break;

                                                            case "cftv":
                                                                $this->consulta = $this->conectar->query("SELECT * FROM hwcftv WHERE localizacao = \"$this->localizacao\"");
                                                                break;

                                                                case "ares":
                                                                    $this->consulta = $this->conectar->query("SELECT * FROM hwares WHERE localizacao = \"$this->localizacao\"");
                                                                    break;

                                                                    case "projetores":
                                                                        $this->consulta = $this->conectar->query("SELECT * FROM hwprojetores WHERE localizacao = \"$this->localizacao\"");
                                                                        break;

                                                                        case "hds":
                                                                            $this->consulta = $this->conectar->query("SELECT * FROM hwhdexterno WHERE localizacao = \"$this->localizacao\"");
                                                                            break;

                                                                            case "peletronico":
                                                                                $this->consulta = $this->conectar->query("SELECT * FROM hwporteiro WHERE localizacao = \"$this->localizacao\"");
                                                                                break;

                                                                                case "tablets":
                                                                                    $this->consulta = $this->conectar->query("SELECT * FROM hwtablets WHERE localizacao = \"$this->localizacao\"");
                                                                                    break;

                                                                                    case "smartphones":
                                                                                        $this->consulta = $this->conectar->query("SELECT * FROM hwsmartphones WHERE localizacao = \"$this->localizacao\"");
                                                                                        break;

                                                                                        case "pin":
                                                                                            $this->consulta = $this->conectar->query("SELECT * FROM hwpin WHERE localizacao = \"$this->localizacao\"");
                                                                                            break;

                                                                                            case "softwares":
                                                                                                $this->consulta = $this->conectar->query("SELECT * FROM softwares WHERE localizacao = \"$this->localizacao\"");
                                                                                                break;


   
                    }
                    
                     $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                     $this->resJSON = json_encode($this->resul);
                     $this->resDec = json_decode($this->resJSON);
                    
                      if(count($this->resDec) <> null){
                        // Insere o Botão dentro do JSON para que seja possível inserir no DataTables de forma automática
                        for($i=0;$i<count($this->resDec);$i++){
                        $this->resDec[$i]->btnvisualizar = "<button type='submit' class='sau-btn' id='btnVisuInv".$this->resDec[$i]->id."' value='".$this->resDec[$i]->id."'data-toggle='modal' data-target='#viewDesktopDell".$this->resDec[$i]->patrimonio."'>"."Visualizar </button>";
                        }
                        
                        // Retorna o JSON já encodado
                        echo json_encode($this->resDec);
                      
                    }else{

                        $this->jsonNULO = array([
                            "localizacao"=>"...",
                            "nome"=>"...",
                            "fabricante"=>"...",
                            "modelo"=>"...",
                            "servicetag"=>"...",
                            "uuid"=>"...",
                            "processador"=>"...",
                            "memoria"=>"...",
                            "disco"=>"...",
                            "aquisicao"=>"...",
                            "idade"=>"...",
                            "suporte"=>"...",
                            "vigencia"=>"...",
                            "sistemaoperacional"=>"...",
                            "office"=>"...",
                            "patrimonio"=>"...",
                            "ipwan"=>"...",
                            "iplan"=>"...",
                            "btnvisualizar"=>"...",
                            "trocadebaterias"=>"...",
                            "motor"=>"...",
                            "gerador"=>"...",
                            "operadora"=>"...",
                            "tipo"=>"...",
                            "circuito"=>"...",
                            "piloto"=>"...",
                            "ddr"=>"...",
                            "potencia"=>"...",
                            "gateway"=>"...",
                            "ip"=>"...",
                            "tela"=>"...",
                            "imei"=>"...",
                            "pin"=>"...",
                            "usuario"=>"...",
                            "versao"=>"...",
                            "duracao"=>"..."
                        ]);

                        echo json_encode($this->jsonNULO);                        
                    }           
                    
                 }else{
                    echo "<br>Não foi possível estabelecer uma conexão com o banco de dados!";
                    die;
                }
            }
}



    // Set do estado em que o inventário irá puxar os dados
    $_req = new invHardware;
    $_req->localizacao = strip_tags(filter_input(INPUT_GET,'localizacao'));
    $_req->op = filter_input(INPUT_GET,'op');
    $_req->exibeDados();

?>

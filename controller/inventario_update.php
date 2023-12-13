<?php

// Require da conPDO
// Require da AdminAuth
// Require da userLogs
require_once './dir_inc.php';
include DIR_INC.'/controller/atividadesClass.php';


    class invhwUpdate extends conPDO{

            // Atributos que serão atualizados durante a query
            private $update;
            private $execUpdate;
           
            // Variáveis utilizadas no inventário de Computadores
            public $id;
            public $patrimonio;
            public $localizacao;
            private $nome;
            private $fabricacao;
            private $modelo;
            private $uuid;
            private $processador;
            private $memoria;
            private $disco;
            private $aquisicao;
            private $idade;
            private $vigencia;
            private $suporte;
            private $sistemaOperacional;
            private $office;
            private $servicetag;
            
            // Inventário de Rede
            private $tipo;
            private $ipwan;
            private $iplan;
            private $dhcp;
            private $mascara;

            // Inventário de Nobreak's
            private $capacidade;
            private $batInterna;
            private $batExterna;
            private $tensao;
            private $peso;
            private $trocaBat;

            // Inventário de GMG's

            private $corrente;
            private $potencia;
            private $motor;
            private $gerador;
            private $comando;

            //Inventario Link de Voz
            private $operadora;
            private $circuito;
            private $piloto;
            private $ddr;

            //Inventario Link de Dados
            private $gateway;
            private $redelan;
            private $endereco;
            private $mensalidade;

            //Inventario Servidores
            private $ip;
            private $consumo;

            //Inventario Tablets
            private $usuario;
            private $saida;
            private $entrada;
            private $imei;
            private $simcard;

            //Inventario Smartphones
            private $imeidois;

            //Inventario PIN
            private $pin;

            //Inventario Softwares
            private $versao;
            private $chave;
            private $duracao;
            private $observacao;


            // Utilizada para verificações...
            public $tipoInv;
            public $checkFail;
            public $operacao;

            //Variáveis do LOG
            private $atividade;
            private $atividadeComentario;

                // Set dos atributos, será feito via POST através do Jquery contido na modal...
                public function __constructor(){

                    // Patrimônio não pode ter espaço e nem caracteres especiais,
                    // Caso tenha, a tabela irá bugar, devido ao gerador de função que fiz com PHP dentro do Jquery
                    $this->patrimonio_nofilter = strip_tags(addslashes(filter_input(INPUT_POST,'txtPat')));
                    $this->patrimonio = str_replace(' ','',$this->patrimonio_nofilter);

                    // Computador e Gerais
                    $this->id = strip_tags(addslashes(filter_input(INPUT_POST,'txtId')));
                    $this->localizacao = strip_tags(addslashes(filter_input(INPUT_POST,'txtLocal')));
                    $this->nome = strip_tags(addslashes(filter_input(INPUT_POST,'txtNome')));
                    $this->fabricacao = strip_tags(addslashes(filter_input(INPUT_POST,'txtFab')));
                    $this->modelo = strip_tags(addslashes(filter_input(INPUT_POST,'txtMod')));
                    $this->uuid = strip_tags(addslashes(filter_input(INPUT_POST,'txtUUID')));
                    $this->processador = strip_tags(addslashes(filter_input(INPUT_POST,'txtProc')));
                    $this->memoria = strip_tags(addslashes(filter_input(INPUT_POST,'txtMB')));
                    $this->disco = strip_tags(addslashes(filter_input(INPUT_POST,'txtHD')));
                    // Formatar data de aquisição e vigência
                    $this->aquisicao = strip_tags(addslashes(filter_input(INPUT_POST,'txtAqu')));
                    $formatAquisicao = explode('/',$this->aquisicao);
                    $this->aquisicao = $formatAquisicao[2].'-'.$formatAquisicao[1].'-'.$formatAquisicao[0];
                    $this->vigencia = strip_tags(addslashes(filter_input(INPUT_POST,'txtVig')));
                    $formatVigencia = explode('/',$this->vigencia);
                    $this->vigencia = $formatVigencia[2].'-'.$formatVigencia[1].'-'.$formatVigencia[0];

                    // Outras variáveis gerais
                    $this->idade = strip_tags(addslashes(filter_input(INPUT_POST,'txtIda')));
                    $this->suporte = strip_tags(addslashes(filter_input(INPUT_POST,'txtSup')));
                    $this->sistemaOperacional = strip_tags(addslashes(filter_input(INPUT_POST,'txtSO')));
                    $this->office = strip_tags(addslashes(filter_input(INPUT_POST,'txtOffice')));
                    $this->servicetag = strip_tags(addslashes(filter_input(INPUT_POST,'txtST')));
                    $this->tipoInv = strip_tags(addslashes(filter_input(INPUT_POST, 'tipoInv')));
                    $this->operacao = filter_input(INPUT_POST,'op');
                    
                    // Específicos de Rede
                    $this->tipo = strip_tags(addslashes(filter_input(INPUT_POST,'txtTipo')));
                    $this->ipwan = strip_tags(addslashes(filter_input(INPUT_POST,'txtIpwan')));
                    $this->iplan = strip_tags(addslashes(filter_input(INPUT_POST,'txtIplan')));
                    $this->dhcp = strip_tags(addslashes(filter_input(INPUT_POST,'txtDhcp')));
                    $this->mascara = strip_tags(addslashes(filter_input(INPUT_POST,'txtMascara')));

                    // Específicos de Nobreaks
 
                    $this->capacidade = strip_tags(addslashes(filter_input(INPUT_POST,'txtCap')));
                    $this->batInterna = strip_tags(addslashes(filter_input(INPUT_POST,'txtBati')));
                    $this->batExterna = strip_tags(addslashes(filter_input(INPUT_POST,'txtBate')));
                    $this->tensao = strip_tags(addslashes(filter_input(INPUT_POST,'txtTen')));
                    $this->peso = strip_tags(addslashes(filter_input(INPUT_POST,'txtPeso')));


                    // Formatar data de troca de bateria
                    $this->trocaBat = strip_tags(addslashes(filter_input(INPUT_POST,'txtTbat')));
                    $formatBat = explode('/',$this->trocaBat);
                    $this->trocaBat = $formatBat[2].'-'.$formatBat[1].'-'.$formatBat[0];

                    // Específicos de GMG

                    $this->corrente = strip_tags(addslashes(filter_input(INPUT_POST,'txtCorrente')));
                    $this->potencia = strip_tags(addslashes(filter_input(INPUT_POST,'txtPotencia')));
                    $this->motor = strip_tags(addslashes(filter_input(INPUT_POST,'txtMotor')));
                    $this->gerador = strip_tags(addslashes(filter_input(INPUT_POST,'txtGerador')));
                    $this->comando = strip_tags(addslashes(filter_input(INPUT_POST,'txtComando')));

                    // Específicos Link de Voz

                    $this->operadora = strip_tags(addslashes(filter_input(INPUT_POST,'txtOperadora')));
                    $this->circuito = strip_tags(addslashes(filter_input(INPUT_POST,'txtCircuito')));
                    $this->piloto = strip_tags(addslashes(filter_input(INPUT_POST,'txtPiloto')));
                    $this->ddr = strip_tags(addslashes(filter_input(INPUT_POST,'txtDDR')));

                    // Link de Dados
                    $this->gateway = strip_tags(addslashes(filter_input(INPUT_POST,'txtGateway')));
                    $this->redelan = strip_tags(addslashes(filter_input(INPUT_POST,'txtRedelan')));
                    $this->endereco = strip_tags(addslashes(filter_input(INPUT_POST,'txtEndereco')));
                    $this->mensalidade = strip_tags(addslashes(filter_input(INPUT_POST,'txtMensalidade')));

                    // Servidores
                    $this->ip = strip_tags(addslashes(filter_input(INPUT_POST,'txtIp')));
                    $this->consumo = strip_tags(addslashes(filter_input(INPUT_POST,'txtConsumo')));

                    // Porteiro Eletrônico
                    $this->tela = strip_tags(addslashes(filter_input(INPUT_POST,'txtTela')));

                    // Tablets
                    $this->usuario = strip_tags(addslashes(filter_input(INPUT_POST,'txtUsuario')));
                    $this->saida = strip_tags(addslashes(filter_input(INPUT_POST,'txtSaida')));
                    $this->entrada = strip_tags(addslashes(filter_input(INPUT_POST,'txtEntrada')));
                    $this->imei = strip_tags(addslashes(filter_input(INPUT_POST,'txtIMEI')));
                    $this->simcard = strip_tags(addslashes(filter_input(INPUT_POST,'txtSimcard')));

                    //Smartphones
                    $this->imeidois = strip_tags(addslashes(filter_input(INPUT_POST,'txtIMEIdois')));

                    //PIN's
                    $this->pin = strip_tags(addslashes(filter_input(INPUT_POST,'txtPIN')));

                    //Softwares
                    $this->versao = strip_tags(addslashes(filter_input(INPUT_POST,'txtVersao')));
                    $this->chave = strip_tags(addslashes(filter_input(INPUT_POST,'txtChave')));
                    $this->duracao = strip_tags(addslashes(filter_input(INPUT_POST,'txtDuracao')));
                    $this->observacao = strip_tags(addslashes(filter_input(INPUT_POST,'txtObservacao')));



                }



                    // FUNÇÃO - QUERY - EDITAR
                    public function editaDesktop(){

                        // Query responsável pela edição no inventário de Desktop's
                        
                        switch($this->operacao){
                        
                        // Desktops Dell
                        case "dell":
                        $this->update = "UPDATE hwdesktop SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', uuid = '$this->uuid', servicetag = '$this->servicetag', processador = '$this->processador', memoria = '$this->memoria', disco = '$this->disco', aquisicao = '$this->aquisicao', idade = '$this->idade', vigencia = '$this->vigencia', suporte = '$this->suporte', sistemaoperacional = '$this->sistemaOperacional', office = '$this->office', patrimonio='$this->patrimonio' WHERE id = '$this->id'";
                        break;
                            // Desktops Outros
                            case "variados":
                            $this->update = "UPDATE hwdesktopnormal SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', uuid = '$this->uuid', servicetag = '$this->servicetag', processador = '$this->processador', memoria = '$this->memoria', disco = '$this->disco', aquisicao = '$this->aquisicao', idade = '$this->idade', vigencia = '$this->vigencia', suporte = '$this->suporte', sistemaoperacional = '$this->sistemaOperacional', office = '$this->office', patrimonio='$this->patrimonio' WHERE id = '$this->id'";
                            break;
                             // Notebooks Dell
                              case "notedell":
                                $this->update = "UPDATE hwnotebookdell SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', uuid = '$this->uuid', servicetag = '$this->servicetag', processador = '$this->processador', memoria = '$this->memoria', disco = '$this->disco', aquisicao = '$this->aquisicao', idade = '$this->idade', vigencia = '$this->vigencia', suporte = '$this->suporte', sistemaoperacional = '$this->sistemaOperacional', office = '$this->office', patrimonio='$this->patrimonio' WHERE id = '$this->id'";
                                break;
                                // Outros Notebooks
                                case "notebooks":
                                    $this->update = "UPDATE hwnotebooknormal SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', uuid = '$this->uuid', servicetag = '$this->servicetag', processador = '$this->processador', memoria = '$this->memoria', disco = '$this->disco', aquisicao = '$this->aquisicao', idade = '$this->idade', vigencia = '$this->vigencia', suporte = '$this->suporte', sistemaoperacional = '$this->sistemaOperacional', office = '$this->office', patrimonio='$this->patrimonio' WHERE id = '$this->id'";
                                    break;
                                    // Rede
                                    case "rede":
                                        $this->update = "UPDATE hwrede SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', tipo = '$this->tipo', aquisicao = '$this->aquisicao', idade = '$this->idade', ipwan = '$this->ipwan', iplan = '$this->iplan', dhcp = '$this->dhcp', mascara = '$this->mascara', patrimonio='$this->patrimonio' WHERE id = '$this->id'";
                                        break;
                                        // Nobreak
                                        case "nobreaks":
                                            $this->update = "UPDATE hwnobreaks SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', capacidade = '$this->capacidade', bateriasinternas = '$this->batInterna', bateriasexternas = '$this->batExterna', tensao = '$this->tensao', peso = '$this->peso', aquisicao = '$this->aquisicao', idade = '$this->idade', trocadebaterias = '$this->trocaBat', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                            break;
                                            // Gerador
                                            case "gmg":
                                                $this->update = "UPDATE hwgmg SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', potencia = '$this->potencia', correntenominal = '$this->corrente', servicetag = '$this->servicetag', motor = '$this->motor', gerador = '$this->gerador', comando = '$this->comando', peso = '$this->peso', aquisicao = '$this->aquisicao', idade = '$this->idade', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                break;
                                                // Link de Voz
                                                case "voz":
                                                    $this->update = "UPDATE hwvoz SET localizacao = '$this->localizacao', nome = '$this->nome', operadora = '$this->operadora', tipo = '$this->tipo', circuito = '$this->circuito', piloto = '$this->piloto', ddr = '$this->ddr', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                    break;
                                                    // Link de Dados
                                                    case "dados":
                                                        $this->update = "UPDATE hwlink SET localizacao = '$this->localizacao', nome = '$this->nome', operadora = '$this->operadora', tipo = '$this->tipo', capacidade = '$this->capacidade', circuito = '$this->circuito', ipwan = '$this->ipwan', gateway = '$this->gateway', redelan = '$this->redelan', mascara = '$this->mascara', hardware = '$this->hardware', endereco = '$this->endereco', mensalidade = '$this->mensalidade', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";    
                                                        break;
                                                        // Servidores
                                                        case "servidores":
                                                            $this->update = "UPDATE hwservidores SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', processador = '$this->processador', memoria = '$this->memoria', disco = '$this->disco', peso = '$this->peso', consumo = '$this->consumo', aquisicao = '$this->aquisicao', idade = '$this->idade', sistemaoperacional = '$this->sistemaOperacional', ip = '$this->ip', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                            break;
                                                            // Impressoras
                                                            case "impressoras":
                                                                $this->update = "UPDATE hwimpressoras SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', tipo = '$this->tipo', aquisicao = '$this->aquisicao', idade = '$this->idade', iplan = '$this->iplan', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                break;
                                                                // CFTV
                                                                case "cftv":
                                                                    $this->update = "UPDATE hwcftv SET localizacao = '$this->localizacao', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', tipo = '$this->tipo', aquisicao = '$this->aquisicao', idade = '$this->idade', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                    break;
                                                                    // Ares 
                                                                    case "ares":
                                                                        $this->update = "UPDATE hwares SET localizacao = '$this->localizacao', nome = '$this->nome', fabricante = '$this->fabricacao', modelo = '$this->modelo', potencia = '$this->potencia', aquisicao = '$this->aquisicao', idade = '$this->idade', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                        break;
                                                                        // Projetores
                                                                      case "projetores";
                                                                        $this->update = "UPDATE hwprojetores SET localizacao = '$this->localizacao', servicetag = '$this->servicetag', fabricante = '$this->fabricacao', modelo = '$this->modelo', aquisicao = '$this->aquisicao', idade = '$this->idade', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                         break;
                                                                        // HD Externo
                                                                         case "hds":
                                                                            $this->update = "UPDATE hwhdexterno SET localizacao = '$this->localizacao', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', disco = '$this->disco', aquisicao = '$this->aquisicao', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                            break;
                                                                            // Porteiro Eletrônico
                                                                            case "peletronico":
                                                                                $this->update = "UPDATE hwporteiro SET localizacao = '$this->localizacao', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', tela = '$this->tela', aquisicao = '$this->aquisicao', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                                break;
                                                                                // Tablets
                                                                                case "tablets":
                                                                                    $this->update = "UPDATE hwtablets SET localizacao = '$this->localizacao', usuario = '$this->usuario', saida = '$this->saida', entrada = '$this->entrada', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', imei = '$this->imei', processador = '$this->processador', memoria = '$this->memoria', disco = '$this->disco', tela = '$this->tela', sistemaoperacional = '$this->sistemaOperacional', aquisicao = '$this->aquisicao', patrimonio = '$this->patrimonio', simcard = '$this->simcard' WHERE id = '$this->id'";
                                                                                    break;
                                                                                    // Smartphones
                                                                                    case "smartphones":
                                                                                        $this->update = "UPDATE hwsmartphones SET localizacao = '$this->localizacao', usuario = '$this->usuario', saida = '$this->saida', entrada = '$this->entrada', fabricante = '$this->fabricacao', modelo = '$this->modelo', servicetag = '$this->servicetag', imei = '$this->imei', imeidois = '$this->imeidois', processador = '$this->processador', memoria = '$this->memoria', disco = '$this->disco', tela = '$this->tela', sistemaoperacional = '$this->sistemaOperacional', aquisicao = '$this->aquisicao', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                                        break;
                                                                                        // PIN's
                                                                                        case "pin":
                                                                                            $this->update = "UPDATE hwpin SET localizacao = '$this->localizacao', nome = '$this->nome', pin = '$this->pin', uuid = '$this->uuid', servicetag = '$this->servicetag', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                                            break;
                                                                                            // Softwares
                                                                                            case "softwares":
                                                                                                $this->update = "UPDATE softwares SET localizacao = '$this->localizacao', versao = '$this->versao', chave = '$this->chave', usuario = '$this->usuario', observacao = '$this->observacao', duracao = '$this->duracao', patrimonio = '$this->patrimonio' WHERE id = '$this->id'";
                                                                                                break;
                                                }

                        // Prepare das Querys via PDO
                        $this->execUpdate = $this->conectar->prepare($this->update);
             
                            // Verifica se algum das Query's retornou erro
                            if($this->execUpdate->execute() === false){
                                echo "<pre>";
                                print_r($this->execUpdate->errorInfo());
                                $this->checkFail = 1;
                            }else{
                                $this->atividade = new userLogs;
                                $this->atividadeComentario = "Editou o patrimônio - ".$this->patrimonio." na localidade : ".$this->localizacao.", inventário de ".$this->operacao;
                                $this->atividade->__constructor();
                                $this->atividade->registraLog($this->atividadeComentario);
                                $this->execUpdate = null;
                                $this->update = null;
                            }
                        


                        // Exibe a mensagem de erro ou de sucesso...
                        if($this->checkFail){

                            echo "ERRO - Query DB".PHP_EOL;

                        } else {

                            echo "Salvo com sucesso!<br>".PHP_EOL;
                            echo "Aguarde a atualização do inventário...".PHP_EOL;
                            echo "<script>
                            setTimeout(function(){
                                document.location.reload(true);
                            }, 3000);
                            </script>";
                        }


                 }

                 // FUNÇÃO - QUERY - EXCLUIR

                 public function excluiDesktop(){

                    // Query, preparação e execução da mesma...

                    switch($this->operacao){

                        // Desktops Dell
                        case "dell":
                        $this->update = "DELETE FROM hwdesktop WHERE patrimonio = '$this->patrimonio'";
                        break;
                         // Outros Desktop's
                           case "variados":
                           $this->update = "DELETE FROM hwdesktopnormal WHERE patrimonio = '$this->patrimonio'";
                           break;
                            // Notebooks Dell
                            case "notedell":
                                $this->update = "DELETE FROM hwnotebookdell WHERE patrimonio = '$this->patrimonio'";
                                break;
                                // Outros Notebook's
                                case "notebooks":
                                    $this->update = "DELETE FROM hwnotebooknormal WHERE patrimonio = '$this->patrimonio'";
                                    break;
                                    // Rede
                                    case "rede":
                                        $this->update = "DELETE FROM hwrede WHERE patrimonio = '$this->patrimonio'";
                                        break;
                                        // Nobreaks
                                        case "nobreaks":
                                            $this->update = "DELETE FROM hwnobreaks WHERE patrimonio = '$this->patrimonio'";
                                            break;
                                            // Gerador
                                            case "gmg":
                                                $this->update = "DELETE FROM hwgmg WHERE patrimonio = '$this->patrimonio'";
                                                break;
                                                // Link de Voz
                                                case "voz":
                                                    $this->update = "DELETE FROM hwvoz WHERE patrimonio = '$this->patrimonio'";
                                                    break;
                                                    // Link de Dados
                                                    case "dados":
                                                        $this->update = "DELETE FROM hwlink WHERE patrimonio = '$this->patrimonio'";
                                                        break;
                                                        // Servidores
                                                        case "servidores":
                                                            $this->update = "DELETE FROM hwservidores WHERE patrimonio = '$this->patrimonio'";
                                                            break;
                                                            // Impressoras
                                                            case "impressoras":
                                                                $this->update = "DELETE FROM hwimpressoras WHERE patrimonio = '$this->patrimonio'";
                                                                break;
                                                                // CFTV
                                                                case "cftv":
                                                                    $this->update = "DELETE FROM hwcftv WHERE patrimonio = '$this->patrimonio'";
                                                                    break;
                                                                    // Ares
                                                                    case "ares":
                                                                        $this->update = "DELETE FROM hwares WHERE patrimonio = '$this->patrimonio'";
                                                                        break;
                                                                        // Projetores
                                                                        case "projetores":
                                                                            $this->update = "DELETE FROM hwprojetores WHERE patrimonio = '$this->patrimonio'";
                                                                            break;
                                                                            // HD Externo
                                                                            case "hds":
                                                                                $this->update = "DELETE FROM hwhdexterno WHERE patrimonio = '$this->patrimonio'";
                                                                                break;
                                                                                // Porteiro Eletrônico
                                                                                case "peletronico":
                                                                                    $this->update = "DELETE FROM hwporteiro WHERE patrimonio = '$this->patrimonio'";
                                                                                    break;
                                                                                    // Tablets
                                                                                    case "tablets":
                                                                                        $this->update = "DELETE FROM hwtablets WHERE patrimonio = '$this->patrimonio'";
                                                                                        break;
                                                                                        // Smartphones
                                                                                        case "smartphones":
                                                                                            $this->update = "DELETE FROM hwsmartphones WHERE patrimonio = '$this->patrimonio'";
                                                                                            break;
                                                                                            // PIN's
                                                                                            case "pin":
                                                                                                $this->update = "DELETE FROM hwpin WHERE patrimonio = '$this->patrimonio'";
                                                                                                break;
                                                                                                // Softwares
                                                                                                case "softwares":
                                                                                                    $this->update = "DELETE FROM softwares WHERE patrimonio = '$this->patrimonio'";
                                                                                                    break;
                            
                    }
                    
                    $this->execUpdate = $this->conectar->prepare($this->update);
  
                        // Verifica se algum das Query's retornou erro
                        if($this->execUpdate->execute() === false){
                            echo "<pre>";
                            print_r($this->execUpdate->errorInfo());
                            $this->checkFail = 1;

                        }else{
                            $this->atividade = new userLogs;
                            $this->atividadeComentario = "Deletou o patrimônio - ".$this->patrimonio.", inventário de ".$this->operacao;
                            $this->atividade->__constructor();
                            $this->atividade->registraLog($this->atividadeComentario);
                            $this->execUpdate = null;
                        }


                        // Exibe a mensagem de erro ou de sucesso...
                        if($this->checkFail){

                            echo "ERRO - Query DB".PHP_EOL;

                        } else {

                            echo "Item deletado do inventário!<br>".PHP_EOL;
                            echo "Aguarde a atualização do inventário...".PHP_EOL;
                            echo "<script>
                            setTimeout(function(){
                                document.location.reload(true);
                            }, 3000);
                            </script>";
                        }
                 }

                 public function insereDesktop(){

                     // Query, preparação e execução da mesma...
                     switch($this->operacao){
                        // Desktop's Dell
                        case "dell":
                            $this->update = "INSERT INTO hwdesktop VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo', '$this->servicetag', '$this->uuid', '$this->processador','$this->memoria','$this->disco','$this->aquisicao','$this->idade','$this->suporte','$this->vigencia','$this->sistemaOperacional','$this->office','$this->patrimonio', NULL)";
                            break;
                            // Outros Desktop's
                            case "variados":
                                $this->update = "INSERT INTO hwdesktopnormal VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo', '$this->servicetag', '$this->uuid', '$this->processador','$this->memoria','$this->disco','$this->aquisicao','$this->idade','$this->suporte','$this->vigencia','$this->sistemaOperacional','$this->office','$this->patrimonio', NULL)";
                                break;
                                // Notebooks Dell's
                                case "notedell":
                                    $this->update = "INSERT INTO hwnotebookdell VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo', '$this->servicetag', '$this->uuid', '$this->processador','$this->memoria','$this->disco','$this->aquisicao','$this->idade','$this->suporte','$this->vigencia','$this->sistemaOperacional','$this->office','$this->patrimonio', NULL)";
                                    break;
                                    // Outros Notebook's
                                    case "notebooks":
                                        $this->update = "INSERT INTO hwnotebooknormal VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo', '$this->servicetag', '$this->uuid', '$this->processador','$this->memoria','$this->disco','$this->aquisicao','$this->idade','$this->suporte','$this->vigencia','$this->sistemaOperacional','$this->office','$this->patrimonio', NULL)";
                                        break;
                                        // Rede
                                        case "rede":
                                            $this->update = "INSERT INTO hwrede VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo', '$this->servicetag', '$this->tipo', '$this->aquisicao','$this->idade','$this->ipwan','$this->iplan','$this->dhcp','$this->mascara', '$this->patrimonio', NULL)";
                                            break;
                                            // Nobreak's
                                            case "nobreaks":
                                                $this->update = "INSERT INTO hwnobreaks VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo', '$this->servicetag', '$this->capacidade', '$this->batInterna','$this->batExterna','$this->tensao','$this->peso','$this->aquisicao','$this->idade', '$this->trocaBat', '$this->patrimonio', NULL)";
                                                break;
                                                // Gerador
                                                case "gmg":
                                                    $this->update = "INSERT INTO hwgmg VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->potencia','$this->corrente','$this->servicetag','$this->motor','$this->gerador','$this->comando','$this->peso','$this->aquisicao','$this->idade','$this->patrimonio', NULL)";
                                                    break;
                                                    // Link de Voz
                                                    case "voz":
                                                        $this->update = "INSERT INTO hwvoz VALUES('$this->localizacao','$this->nome','$this->operadora','$this->tipo','$this->circuito','$this->piloto','$this->ddr','$this->patrimonio', NULL)";
                                                        break;
                                                        // Link de Dados
                                                        case "dados":
                                                            $this->update = "INSERT INTO hwlink VALUES('$this->localizacao','$this->nome','$this->operadora','$this->tipo','$this->capacidade','$this->circuito','$this->ipwan','$this->gateway','$this->redelan','$this->mascara','$this->hardware','$this->endereco','$this->mensalidade','$this->patrimonio', NULL)";
                                                            break;
                                                            // Servidores
                                                            case "servidores":
                                                                $this->update = "INSERT INTO hwservidores VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo', '$this->servicetag', '$this->processador', '$this->memoria','$this->disco','$this->peso','$this->consumo','$this->aquisicao','$this->idade','$this->sistemaOperacional','$this->ip','$this->patrimonio', NULL)";
                                                                break;
                                                                // Impressoras
                                                                case "impressoras":
                                                                        $this->update = "INSERT INTO hwimpressoras VALUES('$this->localizacao','$this->nome','$this->fabricacao','$this->modelo','$this->servicetag','$this->tipo','$this->aquisicao','$this->idade','$this->iplan','$this->patrimonio', NULL)";
                                                                    break;
                                                                    // CFTV
                                                                    case "cftv":
                                                                        $this->update = "INSERT INTO hwcftv VALUES(NULL, '$this->localizacao','$this->fabricacao','$this->modelo','$this->servicetag','$this->tipo','$this->aquisicao','$this->idade','$this->patrimonio')";
                                                                        break;
                                                                        // ARES
                                                                        case "ares":
                                                                            $this->update = "INSERT INTO hwares VALUES(NULL, '$this->localizacao', '$this->nome', '$this->fabricacao', '$this->modelo', '$this->potencia', '$this->aquisicao', '$this->idade', '$this->patrimonio')";
                                                                            break;
                                                                            // Projetores
                                                                            case "projetores":
                                                                                $this->update = "INSERT INTO hwprojetores VALUES(NULL, '$this->localizacao', '$this->fabricacao', '$this->modelo', '$this->servicetag', '$this->aquisicao', '$this->idade', '$this->patrimonio')";
                                                                                break;
                                                                                // HD Externo
                                                                                case "hds":
                                                                                    $this->update = "INSERT INTO hwhdexterno VALUES(NULL, '$this->localizacao', '$this->fabricacao', '$this->modelo', '$this->servicetag', '$this->disco', '$this->aquisicao', '$this->patrimonio')";
                                                                                    break;
                                                                                    // Porteiro Eletrônico
                                                                                    case "peletronico":
                                                                                        $this->update = "INSERT INTO  hwporteiro VALUES(NULL, '$this->localizacao', '$this->fabricacao', '$this->modelo', '$this->servicetag', '$this->tela', '$this->aquisicao', '$this->patrimonio')";
                                                                                        break;
                                                                                        // Tablets
                                                                                        case "tablets":
                                                                                            $this->update = "INSERT INTO hwtablets VALUES(NULL, '$this->localizacao', '$this->usuario', '$this->saida', '$this->entrada', '$this->fabricacao', '$this->modelo', '$this->servicetag', '$this->imei', '$this->processador', '$this->memoria', '$this->disco', '$this->tela', '$this->sistemaOperacional', '$this->aquisicao', '$this->patrimonio', '$this->simcard')";
                                                                                            break;
                                                                                            // Smartphones 
                                                                                            case "smartphones":
                                                                                                $this->update = "INSERT INTO hwsmartphones VALUES(NULL, '$this->localizacao', '$this->usuario', '$this->saida', '$this->entrada', '$this->fabricacao', '$this->modelo', '$this->servicetag', '$this->imei','$this->imeidois', '$this->processador', '$this->memoria', '$this->disco', '$this->tela', '$this->sistemaOperacional', '$this->aquisicao', '$this->patrimonio')";
                                                                                                break;
                                                                                                // PIN's
                                                                                                case "pin":
                                                                                                    $this->update = "INSERT INTO hwpin VALUES(NULL, '$this->localizacao', '$this->nome', '$this->pin', '$this->uuid', '$this->servicetag', '$this->patrimonio')";
                                                                                                    break;
                                                                                                    //Softwares
                                                                                                    case "softwares":
                                                                                                        $this->update = "INSERT INTO softwares VALUES(NULL, '$this->localizacao', '$this->versao', '$this->chave', '$this->usuario', '$this->observacao', '$this->duracao','$this->patrimonio')";
                                                                                                        break;
                                                                                                    




                     }

                     $this->execUpdate = $this->conectar->prepare($this->update);
                         // Verifica se algum das Query's retornou erro
                         if($this->execUpdate->execute() === false){
                             echo "<pre>";
                             print_r($this->execUpdate->errorInfo());
                             $this->checkFail = 1;
                         }else{
                            $this->atividade = new userLogs;
                            $this->atividadeComentario = "Adicionou um novo patrimônio -  ".$this->patrimonio." na localidade : ".$this->localizacao.", inventário de ".$this->operacao;
                            $this->atividade->__constructor();
                            $this->atividade->registraLog($this->atividadeComentario);
                            $this->execUpdate = null;
                        }
 
 
                         // Exibe a mensagem de erro ou de sucesso...
                         if($this->checkFail){
 
                             echo "ERRO - Query DB".PHP_EOL;
 
                         } else {
 
                             echo "Item adicionado ao inventário!<br>".PHP_EOL;
                             echo "Aguarde a atualização do inventário...".PHP_EOL;
                             echo "<script>
                             setTimeout(function(){
                                 document.location.reload(true);
                             }, 3000);
                             </script>";
                         }
                  }


    }


    $update = new invhwUpdate;
    $update->__constructor();

                // Pega o tipo de ação que o usuário quer realizar
                // ADD - UPDATE - DELETE
                // Verficia se ao alterar ou inserir se o campo patrimônio e localização não está nulo...
                switch($update->tipoInv){
                        // DELETE
                    case "excluirDell":
                        $update->excluiDesktop();
                        break;

                        // UPDATE
                        case "alterarDell":
                        if($update->localizacao <> null && $update->patrimonio <> null){
                            $update->editaDesktop();
                        }elseif($update->patrimonio == null && $update->localizacao == null){
                            echo "Insira um patrimônio e uma localização válidas!";
                        }elseif($update->localizacao == null){
                            echo "Insira uma localização válida!";
                        }elseif($update->patrimonio == null){
                            echo "Insira um patrimônio válido!";
                        }
                        break;

                        // ADD
                        case "inserirDell":
                        if($update->localizacao <> null && $update->patrimonio <> null){
                            $update->insereDesktop();
                        }else{
                            echo "Não é possível adicionar um item ao inventário sem uma localidade e patrimônio!";
                        }
                        break;
                        // ????? WTF
                        default:
                        echo "Tipo inválido : ". $update->tipoinv.PHP_EOL;
                        break;

                }
               


    



?>
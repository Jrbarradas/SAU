<?php       
            // Conexão PDO com o DB
            require_once '../controller/PDOClass.php';
            // HTML Head
            include './dynamic/head.php';

            // Verifica se o Usuário tem permissão de Administrador
            include '../controller/adminAuth.php';
            $admin = new permissaoUsuario;
            $admin->verPermissao();

            class estadosInventario extends conPDO{
                private $nome;
                private $consulta;
                private $resul;
                public $resJSON;
                public $resDec;
                public $localizacao;
                public $operacao;

                    // Nesta função é setado o nome dos estados e a URL de requisição dos mesmos
                    public function __constructor(){
                        //Nome dos estados presentes do inventário
                        $this->localizacao = strip_tags(stripslashes(filter_input(INPUT_GET,'local')));
                        $this->operacao = filter_input(INPUT_GET,'op');
                    }

                    // Converte a Data de Aquisição para o padrão 00/00/0000
                    private function convertAquisicao(){
                        for($i=0;$i<count($this->resDec);$i++){
                            $formatAquisicao = explode('-',$this->resDec[$i]->aquisicao);
                            $this->resDec[$i]->aquisicao = $formatAquisicao[2].'/'.$formatAquisicao[1].'/'.$formatAquisicao[0];
                        }
                    }

                    // Converte a Data de vigencia para o padrão 00/00/0000
                    private function convertVigencia(){
                        for($i=0;$i<count($this->resDec);$i++){
                            $formatVigencia = explode('-',$this->resDec[$i]->vigencia);
                            $this->resDec[$i]->vigencia = $formatVigencia[2].'/'.$formatVigencia[1].'/'.$formatVigencia[0];
                        }
                    }

                    // Converte a Data de troca de bateria para o padrão 00/00/0000
                    private function convertBattery(){
                        for($i=0;$i<count($this->resDec);$i++){
                            $formatBattery = explode('-',$this->resDec[$i]->trocadebaterias);
                            $this->resDec[$i]->trocadebaterias = $formatBattery[2].'/'.$formatBattery[1].'/'.$formatBattery[0];
                        }
                    }


                    // Converte a Data de troca de baterias para o padrão 00/00/0000



                        // EXIBE OS DADOS NA MODAL DE EDITAR, SALVAR, EXCLUIR...
                        public function exibe_dadosModal(){
                            // Realiza a consulta, faz o fetch em OBJ, realiza o encode para JSON para ser inserido no DataTables
                            // A consulta é de acordo com a opção selecionada no select do inventário, filtrando pela localizacao também do select
                            // Esses dados preenchem a modal e também servem para realizar UPDATE / DELETE atravás do AJAX - JQUERY
                            switch($this->operacao){    
                            
                            // Desktops Dell
                            case "dell":
                            $this->consulta = $this->conectar->query("SELECT * FROM hwdesktop WHERE localizacao = '$this->localizacao'");
                            $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                            $this->resJSON = json_encode($this->resul);
                            $this->resDec = json_decode($this->resJSON);
                            $this->convertAquisicao();
                            $this->convertVigencia();
                            break;
                            
                            // Desktops Gerais
                            case "variados":
                            $this->consulta = $this->conectar->query("SELECT * FROM hwdesktopnormal WHERE localizacao = '$this->localizacao'");
                            $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                            $this->resJSON = json_encode($this->resul);
                            $this->resDec = json_decode($this->resJSON);
                            $this->convertAquisicao();
                            $this->convertVigencia();
                            break;
                            
                            // Notebooks Dell
                            case "notedell":
                                $this->consulta = $this->conectar->query("SELECT * FROM hwnotebookdell WHERE localizacao = '$this->localizacao'");
                                $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                $this->resJSON = json_encode($this->resul);
                                $this->resDec = json_decode($this->resJSON);
                                $this->convertAquisicao();
                                $this->convertVigencia();
                                break;

                                // Notebooks Gerais
                                case "notebooks":
                                    $this->consulta = $this->conectar->query("SELECT * FROM hwnotebooknormal WHERE localizacao = '$this->localizacao'");
                                    $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                    $this->resJSON = json_encode($this->resul);
                                    $this->resDec = json_decode($this->resJSON);
                                    $this->convertAquisicao();
                                    $this->convertVigencia();
                                    break;

                                    // Dispositivos de Rede
                                    case "rede":
                                      $this->consulta = $this->conectar->query("SELECT * FROM hwrede WHERE localizacao = '$this->localizacao'");
                                      $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                      $this->resJSON = json_encode($this->resul);
                                      $this->resDec = json_decode($this->resJSON);
                                      $this->convertAquisicao();
                                      break;

                                      // Nobreaks
                                      case "nobreaks":
                                        $this->consulta = $this->conectar->query("SELECT * FROM hwnobreaks WHERE localizacao = '$this->localizacao'");
                                        $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                        $this->resJSON = json_encode($this->resul);
                                        $this->resDec = json_decode($this->resJSON);
                                        $this->convertAquisicao();
                                        $this->convertBattery();
                                        break;

                                        // GMG
                                        case "gmg":
                                        $this->consulta = $this->conectar->query("SELECT * FROM hwgmg WHERE localizacao = '$this->localizacao'");
                                        $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                        $this->resJSON = json_encode($this->resul);
                                        $this->resDec = json_decode($this->resJSON);
                                        $this->convertAquisicao();
                                        break;

                                        // Link de Voz
                                        case "voz":
                                             $this->consulta = $this->conectar->query("SELECT * FROM hwvoz WHERE localizacao = '$this->localizacao'");
                                             $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                             $this->resJSON = json_encode($this->resul);
                                             $this->resDec = json_decode($this->resJSON);
                                            break;

                                            // Link de Dados
                                            case "dados":
                                                $this->consulta = $this->conectar->query("SELECT * FROM hwlink WHERE localizacao = '$this->localizacao'");
                                                $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                $this->resJSON = json_encode($this->resul);
                                                $this->resDec = json_decode($this->resJSON);
                                                break;

                                                // Servidores
                                                case "servidores":
                                                    $this->consulta = $this->conectar->query("SELECT * FROM hwservidores WHERE localizacao = '$this->localizacao'");
                                                    $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                    $this->resJSON = json_encode($this->resul);
                                                    $this->resDec = json_decode($this->resJSON);
                                                    $this->convertAquisicao();
                                                    break;

                                                    // Impressoras
                                                    case "impressoras":
                                                        $this->consulta = $this->conectar->query("SELECT * FROM hwimpressoras WHERE localizacao = '$this->localizacao'");
                                                        $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                        $this->resJSON = json_encode($this->resul);
                                                        $this->resDec = json_decode($this->resJSON);    
                                                        $this->convertAquisicao();
                                                        break;

                                                        // CFTV
                                                        case "cftv":
                                                            $this->consulta = $this->conectar->query("SELECT * FROM hwcftv WHERE localizacao = '$this->localizacao'");
                                                            $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                            $this->resJSON = json_encode($this->resul);
                                                            $this->resDec = json_decode($this->resJSON);
                                                            $this->convertAquisicao(); 
                                                            break;

                                                            // Ares
                                                            case "ares":
                                                                $this->consulta = $this->conectar->query("SELECT * FROM hwares WHERE localizacao = '$this->localizacao'");
                                                                $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                $this->resJSON = json_encode($this->resul);
                                                                $this->resDec = json_decode($this->resJSON); 
                                                                $this->convertAquisicao();
                                                                break;

                                                                // Projetores
                                                                case "projetores":
                                                                    $this->consulta = $this->conectar->query("SELECT * FROM hwprojetores WHERE localizacao = '$this->localizacao'");
                                                                    $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                    $this->resJSON = json_encode($this->resul);
                                                                    $this->resDec = json_decode($this->resJSON); 
                                                                    $this->convertAquisicao();
                                                                    break;

                                                                    // HD Externo
                                                                    case "hds":
                                                                        $this->consulta = $this->conectar->query("SELECT * FROM hwhdexterno WHERE localizacao = '$this->localizacao'");
                                                                        $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                        $this->resJSON = json_encode($this->resul);
                                                                        $this->resDec = json_decode($this->resJSON);
                                                                        $this->convertAquisicao();
                                                                        break;

                                                                        // Porteiro Eletrônico
                                                                        case "peletronico":
                                                                            $this->consulta = $this->conectar->query("SELECT * FROM hwporteiro WHERE localizacao = '$this->localizacao'");
                                                                            $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                            $this->resJSON = json_encode($this->resul);
                                                                            $this->resDec = json_decode($this->resJSON);
                                                                            $this->convertAquisicao();
                                                                            break;

                                                                            // Tablets
                                                                            case "tablets":
                                                                                $this->consulta = $this->conectar->query("SELECT * FROM hwtablets WHERE localizacao = '$this->localizacao'");
                                                                                $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                                $this->resJSON = json_encode($this->resul);
                                                                                $this->resDec = json_decode($this->resJSON);
                                                                                $this->convertAquisicao();
                                                                                break;

                                                                                // Smartphones
                                                                                case "smartphones":
                                                                                    $this->consulta = $this->conectar->query("SELECT * FROM hwsmartphones WHERE localizacao = '$this->localizacao'");
                                                                                    $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                                    $this->resJSON = json_encode($this->resul);
                                                                                    $this->resDec = json_decode($this->resJSON);
                                                                                    $this->convertAquisicao();
                                                                                    break;

                                                                                     // PIN's
                                                                                     case "pin":
                                                                                        $this->consulta = $this->conectar->query("SELECT * FROM hwpin WHERE localizacao = '$this->localizacao'");
                                                                                        $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                                        $this->resJSON = json_encode($this->resul);
                                                                                        $this->resDec = json_decode($this->resJSON);
                                                                                        break;

                                                                                        // Softwares
                                                                                        case "softwares":
                                                                                            $this->consulta = $this->conectar->query("SELECT * FROM softwares WHERE localizacao = '$this->localizacao'");
                                                                                            $this->resul = $this->consulta->fetchAll(PDO::FETCH_OBJ);
                                                                                            $this->resJSON = json_encode($this->resul);
                                                                                            $this->resDec = json_decode($this->resJSON);
                                                                                            break;

                                    
                            }

                            
                            
                        }

            }

            $sauInv = new estadosInventario;
            $sauInv->__constructor();
            $sauInv->exibe_dadosModal();
            

            
            
?>

            <?php 

            // View Dinâmica de acordo com a opção selecionada na Modal Inventário
            if($sauInv->operacao == "dell" || $sauInv->operacao == "variados" || $sauInv->operacao == "notedell" || $sauInv->operacao == "notebooks"){
                include './dynamic/inventario_computadores.php';
            }elseif($sauInv->operacao == "rede"){
                include './dynamic/inventario_rede.php';
            }elseif($sauInv->operacao == "nobreaks"){
                include './dynamic/inventario_nobreaks.php';
            }elseif($sauInv->operacao == "gmg"){
                include './dynamic/inventario_gmg.php';
            }elseif($sauInv->operacao == "voz"){
                include './dynamic/inventario_linkvoz.php';
            }elseif($sauInv->operacao == "dados"){
                include './dynamic/inventario_linkdados.php';
            }elseif($sauInv->operacao == "servidores"){
                include './dynamic/inventario_servidores.php';
            }elseif($sauInv->operacao == "impressoras"){
                include './dynamic/inventario_impressoras.php';
            }elseif($sauInv->operacao == "cftv"){
                include './dynamic/inventario_cftv.php';
            }elseif($sauInv->operacao == "ares"){
                include './dynamic/inventario_ares.php';
            }elseif($sauInv->operacao == "projetores"){
                include './dynamic/inventario_projetores.php';
            }elseif($sauInv->operacao == "hds"){
                include './dynamic/inventario_hds.php';
            }elseif($sauInv->operacao == "peletronico"){
                include './dynamic/inventario_porteiro.php';
            }elseif($sauInv->operacao == "tablets"){
                include './dynamic/inventario_tablets.php';
            }elseif($sauInv->operacao == "smartphones"){
                include './dynamic/inventario_smartphones.php';
            }elseif($sauInv->operacao == "pin"){
                include './dynamic/inventario_pin.php';
            }elseif($sauInv->operacao == "softwares"){
                include './dynamic/inventario_softwares.php';
            }else{
                include 'error_page.php';
            }

            ?>

          


                        </main><!-- End #main -->

                        <!-- ======= Footer ======= -->
                        <?php include './dynamic/footer.php'?>
                        <!-- End  Footer -->

                        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

                        <?php include './dynamic/scripts.php'?>



                 <script>

                    $(document).ready(function() {
                
                    // Chamada das funções responsáveis por pular as tabelas dos inventários
                    inventarioBasic();
                    inventarioRede();
                    inventarioNobreak();
                    inventarioGMG();
                    inventarioVoz();
                    inventarioDados();
                    inventarioServidores();
                    inventarioImpressoras();
                    inventarioCFTV();
                    inventarioAres();
                    inventarioProjetores();
                    inventarioHD();
                    inventarioPorteiro();
                    inventarioTablets();
                    inventarioSmartphones();
                    inventarioPin();
                    inventarioSoftwares();

                    <?php   
                    // Cria de forma automática a função Jquery responsável por fazer o POST via Ajax
                    // A criação é de acordo com o número de patrimônios no inventário selecionado...

                    // Responsável por passar os dados que serão alterados independente do tipo de dispositivo - UPDATE
                    // Não será modificado
                    for($i=0;$i<count($sauInv->resDec);$i++){ 
                    
                    echo '$("#btnSalvaHW'.$sauInv->resDec[$i]->patrimonio.'").click(function(){'.PHP_EOL;
                    echo 'let dadosAlterar'.$sauInv->resDec[$i]->id. '= { '.PHP_EOL;
                    // Computadores / Gerais
                    echo 'txtId : $("#btnVisuInv'.$sauInv->resDec[$i]->id.'").val(),'.PHP_EOL;
                    echo 'txtPat : $("#txtPat'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtLocal : $("#txtLocal'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtNome : $("#txtNome'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtFab : $("#txtFab'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtMod : $("#txtMod'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtUUID : $("#txtUUID'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtProc : $("#txtProc'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtMB : $("#txtMB'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtHD : $("#txtHD'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtAqu : $("#txtAqu'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtIda : $("#txtIda'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtVig : $("#txtVig'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtSup : $("#txtSup'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtSO : $("#txtSO'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtST : $("#txtST'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'tipoInv : "alterarDell",'.PHP_EOL;
                    echo 'txtOffice : $("#txtOffice'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Rede
                    echo 'txtTipo : $("#txtTipo'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtIpwan : $("#txtIpwan'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtIplan : $("#txtIplan'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtDhcp : $("#txtDhcp'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtMascara : $("#txtMascara'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Nobreaks
                    echo 'txtTbat : $("#txtTbat'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtPeso : $("#txtPeso'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtBati : $("#txtBati'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtBate : $("#txtBate'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtCap : $("#txtCap'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtTen : $("#txtTen'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // GMG
                    echo 'txtCorrente : $("#txtCorrente'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtPotencia : $("#txtPotencia'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtMotor : $("#txtMotor'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtGerador : $("#txtGerador'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtComando : $("#txtComando'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Link de Voz
                    echo 'txtOperadora : $("#txtOperadora'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtCircuito : $("#txtCircuito'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtPiloto : $("#txtPiloto'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtDDR : $("#txtDDR'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Link de Dados
                    echo 'txtGateway : $("#txtGateway'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtRedelan : $("#txtRedelan'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtEndereco : $("#txtEndereco'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtMensalidade : $("#txtMensalidade'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Servidores
                    echo 'txtIp : $("#txtIp'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtConsumo : $("#txtConsumo'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Porteiro Eletrônico
                    echo 'txtTela : $("#txtTela'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Tablets
                    echo 'txtUsuario : $("#txtUsuario'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtSaida: $("#txtSaida'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtEntrada : $("#txtEntrada'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtIMEI : $("#txtIMEI'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtSimcard : $("#txtSimcard'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Smartphones
                    echo 'txtIMEIdois : $("#txtIMEIdois'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // PIN's
                    echo 'txtPIN : $("#txtPIN'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    // Softwares's
                    echo 'txtVersao : $("#txtVersao'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                    echo 'txtChave : $("#txtChave'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;    
                    echo 'txtDuracao : $("#txtDuracao'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL; 
                    echo 'txtObservacao : $("#txtObservacao'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;

                    echo "op : '$sauInv->operacao'"; 
                    echo'}'.PHP_EOL;
                    echo "$.post('../controller/inventario_update.php',dadosAlterar".$sauInv->resDec[$i]->id.",function(retorno".$sauInv->resDec[$i]->id."){".PHP_EOL;
                    echo '$("#HWsalvaResul'.$sauInv->resDec[$i]->patrimonio.'").html(retorno'.$sauInv->resDec[$i]->id.')'.';'.PHP_EOL;
                    echo"});".PHP_EOL;
                    echo "});".PHP_EOL;
                    }

                    

                    

                    // Responsável por passar o delete de um dispositivo, independente do tipo de dispositivo - DELETE
                    // Não será modificado

                    for($i=0;$i<count($sauInv->resDec);$i++){
                        echo '$("#btnExcluiHW'.$sauInv->resDec[$i]->patrimonio.'").click(function(){'.PHP_EOL;
                        echo 'let dadosExcluir'.$sauInv->resDec[$i]->id. '= { '.PHP_EOL;
                        echo 'txtPat : $("#txtPat'.$sauInv->resDec[$i]->patrimonio.'").val(),'.PHP_EOL;
                        echo 'tipoInv : "excluirDell",'.PHP_EOL;
                        echo "op : '$sauInv->operacao'";
                        echo'}'.PHP_EOL;
                        echo "$.post('../controller/inventario_update.php?',dadosExcluir".$sauInv->resDec[$i]->id.",function(retornoExc".$sauInv->resDec[$i]->id."){".PHP_EOL;
                        echo '$("#HWsalvaResul'.$sauInv->resDec[$i]->patrimonio.'").html(retornoExc'.$sauInv->resDec[$i]->id.')'.';'.PHP_EOL;
                        echo"});".PHP_EOL;
                        echo "});".PHP_EOL;
                    }
                    ?>  


                    


                    // Responsável por passar os dados de um novo dispositivo ao inventário, independente do tipo - INSERT
                    // Não será modificado

                    $("#addDell").click(function(){

                        let dadosInserir = {

                            // Computadores - Geral
                            txtPat : $("#txtPat").val(),
                            txtLocal : $("#txtLocal").val(),
                            txtNome : $("#txtNome").val(),
                            txtFab : $("#txtFab").val(),
                            txtMod : $("#txtMod").val(),
                            txtUUID : $("#txtUUID").val(),
                            txtProc : $("#txtProc").val(),
                            txtMB : $("#txtMB").val(),
                            txtHD : $("#txtHD").val(),
                            txtAqu : $("#txtAqu").val(),
                            txtIda : $("#txtIda").val(),
                            txtVig : $("#txtVig").val(),
                            txtSup : $("#txtSup").val(),
                            txtSO : $("#txtSO").val(),
                            txtST : $("#txtST").val(),
                            txtOffice : $("#txtOffice").val(),

                            // Rede
                            txtTipo : $("#txtTipo").val(),
                            txtIpwan : $("#txtIpwan").val(),
                            txtIplan : $("#txtIplan").val(),
                            txtDhcp : $("#txtDhcp").val(),
                            txtMascara : $("#txtMascara").val(),

                            // Nobreak
                            txtTbat : $("#txtTbat").val(),
                            txtPeso : $("#txtPeso").val(),
                            txtBati : $("#txtBati").val(),
                            txtBate : $("#txtBate").val(),
                            txtCap : $("#txtCap").val(),
                            txtTen : $("#txtTen").val(),
                            
                            // Gerador
                            txtCorrente : $("#txtCorrente").val(),
                            txtPotencia : $("#txtPotencia").val(),
                            txtMotor : $("#txtMotor").val(),
                            txtGerador : $("#txtGerador").val(),
                            txtComando : $("#txtComando").val(),

                            // Link de Voz
                            txtOperadora : $("#txtOperadora").val(),
                            txtCircuito : $("#txtCircuito").val(),
                            txtPiloto : $("#txtPiloto").val(),
                            txtDDR : $("#txtDDR").val(),

                            // Link de Dados
                            txtGateway : $("#txtGateway").val(),
                            txtRedelan : $("#txtRedelan").val(),
                            txtEndereco : $("#txtEndereco").val(),
                            txtMensalidade : $("#txtMensalidade").val(),
                            
                            // Servidores
                            txtIp : $("#txtIp").val(),
                            txtConsumo : $("#txtConsumo").val(),

                            // Porteiro Eletrônico
                            txtTela : $("#txtTela").val(),

                            // Tablets
                            txtUsuario : $("#txtUsuario").val(),
                            txtSaida : $("#txtSaida").val(),
                            txtEntrada : $("#txtEntrada").val(),
                            txtIMEI : $("#txtIMEI").val(),
                            txtSimcard : $("#txtSimcard").val(),

                            // Smartphones
                            txtIMEIdois : $("#txtIMEIdois").val(),

                            // PIN's
                            txtPIN : $("#txtPIN").val(),

                            // Softwares
                            txtVersao : $("#txtVersao").val(),
                            txtChave : $("#txtChave").val(),
                            txtDuracao : $("#txtDuracao").val(),
                            txtObservacao : $("#txtObservacao").val(),
                            
                            // Coletam o tipo de requisição - Gerais
                            tipoInv : "inserirDell",
                            op : "<?php echo $sauInv->operacao?>"
                        }

                        $.post('../controller/inventario_update.php',dadosInserir,function(retornoInserir){

                            $("#HWaddDellPC").html(retornoInserir);


                        });
                    });


                    // Responsável por encaminhar para o Gerador de PDF
                    $("#btnHWAddInvDellPDF").click(function(){

                        window.location.href="http://sau.spacecom.com.br/sau/view/inventario_pdf.php?localPDF=<?php echo $_GET['local'];?>&opPDF=<?php echo $_GET['op']?>&token=dGlAc3BhY2Vjb20uY29tLmJy";


                    });



                  });
                    // Fim do Document Ready

                    // Responsável por fazer a requisição AJAX na API do Banco e preencher a tabela básica da view
                    // Computadores
                    var inventarioBasic = function(){
                    var tablehwBasic = $("#tblinvHWBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"nome"},
                            {"data":"fabricante"},
                            {"data":"servicetag"},
                            {"data":"btnvisualizar"},
                        ]
                    });
                    }

                    // Rede
                    var inventarioRede = function(){
                    var tblredeBasic = $("#tblredeBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"fabricante"},
                            {"data":"ipwan"},
                            {"data":"iplan"},
                            {"data":"btnvisualizar"},
                        ]
                    });
                    }

                    // Nobreaks
                    var inventarioNobreak = function(){
                    var tblNBBasic = $("#tblNBBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"servicetag"},
                            {"data":"modelo"},
                            {"data":"trocadebaterias"},
                            {"data":"btnvisualizar"},
                        ]
                    });
                    }

                    // GMG
                    var inventarioGMG = function(){
                    var tblGMGBasic = $("#tblGMGBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"motor"},
                            {"data":"gerador"},
                            {"data":"potencia"},
                            {"data":"btnvisualizar"},
                        ]
                    });
                    }

                    // Link de Voz
                    var inventarioVoz = function(){
                    var tblVozBasic = $("#tblVozBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"operadora"},
                            {"data":"piloto"},
                            {"data":"ddr"},
                            {"data":"btnvisualizar"},
                        ]
                    });
                    }

                    // Link de Dados
                    var inventarioDados = function(){
                    var tblDadosBasic = $("#tblDadosBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"operadora"},
                            {"data":"ipwan"},
                            {"data":"circuito"},
                            {"data":"btnvisualizar"},
                        ]
                    });
                    }

                    // Servidores
                    var inventarioServidores = function(){

                        var tblServidoresBasic = $("#tblServidoresBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"nome"},
                            {"data":"modelo"},
                            {"data":"ip"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }

            // Impressoras
            var inventarioImpressoras = function(){
                var tblImpressoraBasic = $("#tblImpressoraBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"fabricante"},
                            {"data":"iplan"},
                            {"data":"nome"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }

            // CFTV
            var inventarioCFTV = function(){
                var tblCFTVBasic = $("#tblCFTVBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"fabricante"},
                            {"data":"modelo"},
                            {"data":"tipo"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // Ares
            var inventarioAres = function(){
                var tblAresBasic = $("#tblAresBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"nome"},
                            {"data":"fabricante"},
                            {"data":"modelo"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // Projetores
            var inventarioProjetores = function(){
                var tblProjetoresBasic = $("#tblProjetoresBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"fabricante"},
                            {"data":"modelo"},
                            {"data":"servicetag"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // HD Externo
            var inventarioHD = function(){
                var tblHDBasic = $("#tblHDBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"fabricante"},
                            {"data":"modelo"},
                            {"data":"disco"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // Porteiro Eletrônico
            var inventarioPorteiro = function(){
                var tblPorteiroBasic = $("#tblPorteiroBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"fabricante"},
                            {"data":"modelo"},
                            {"data":"servicetag"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // Tablets
            var inventarioTablets = function(){
                var tblTabletsBasic = $("#tblTabletsBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"servicetag"},
                            {"data":"imei"},
                            {"data":"sistemaoperacional"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // Smartphones
            var inventarioSmartphones = function(){
                var tblSmartBasic = $("#tblSmartBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"servicetag"},
                            {"data":"imei"},
                            {"data":"sistemaoperacional"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // PIN's
            var inventarioPin = function(){
                var tblPinBasic = $("#tblPinBasic").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"nome"},
                            {"data":"pin"},
                            {"data":"servicetag"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }
            // Softwares
            var inventarioSoftwares = function(){
                var tblSoftwares = $("#tblSoftwares").DataTable({
                        "ajax":{
                            "method":"POST",
                            "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?localizacao=<?php echo $sauInv->localizacao?>&op=<?php echo $sauInv->operacao?>",
                            "dataSrc":"[]"
                        },
                        "columns":[
                            {"data":"patrimonio"},
                            {"data":"localizacao"},
                            {"data":"usuario"},
                            {"data":"versao"},
                            {"data":"duracao"},
                            {"data":"btnvisualizar"},
                        ]
                    });
            }

                    

            </script>

          
</body>

</html>


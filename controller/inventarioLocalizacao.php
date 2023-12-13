<?php

// Futuramente será reformulado
// O objetivo é tornar o select de inventário mais dinâmico...
// Atualmente o Select funciona bem com este script porém não é dinâmico

/*
Anotação : Uma ideia para deixar o Select dinâmico é, deixar o select do estados
Enabled e o select de inventário Disabled, após selecionado o Estado, pego o estado
Faço um SELECT * FROM com WHERE direcionado para o estado selecionado nas tabelas do banco,
As que retornarem dados eu exibo no Select Inventário, as que não retornarem, ignoro...
*/

// Conexão PDO com o DB
require_once 'PDOClass.php';


    class mostraLocais extends conPDO{

        private $query;
        private $execQuery;
        private $resul;
        private $valores;
        private $arrUnique;
        private $arrString;
        private $exString;
        private $arrJson;
        private $arrMerge;



            // Realiza a Query com filtro em localização e retorna em JSON, será utilizado no inventário, na tabela referente as localizações cadastradas
            public function __constructor(){


                // Exec das Query
                // Desktop's Dell
                $this->query = $this->conectar->query("SELECT localizacao FROM hwdesktop");
                $this->execQuery = $this->query->fetchAll(PDO::FETCH_OBJ);
                $this->resJSON = json_encode($this->execQuery);
                $this->resDec = json_decode($this->resJSON);

                
                //Desktop's Genêricos
                $this->queryDesktop = $this->conectar->query("SELECT localizacao FROM hwdesktopnormal");
                $this->execQueryDesktop = $this->queryDesktop->fetchAll(PDO::FETCH_OBJ);
                $this->resJSONDesktop = json_encode($this->execQueryDesktop);
                $this->resDecDesktop = json_decode($this->resJSONDesktop);

                //Notebook's Dell
                $this->queryTres = $this->conectar->query("SELECT localizacao FROM hwnotebookdell");
                $this->execQueryTres = $this->queryTres->fetchAll(PDO::FETCH_OBJ);
                $this->resJSONtres = json_encode($this->execQueryTres);
                $this->resDectres = json_decode($this->resJSONtres);

                //Notebook's
                $this->queryQuatro = $this->conectar->query("SELECT localizacao FROM hwnotebooknormal");
                $this->execQueryQuatro = $this->queryQuatro->fetchAll(PDO::FETCH_OBJ);
                $this->resJSONquatro = json_encode($this->execQueryQuatro);
                $this->resDecquatro = json_decode($this->resJSONquatro);

                //Rede
                $this->queryCinco = $this->conectar->query("SELECT localizacao FROM hwrede");
                $this->execQueryCinco = $this->queryCinco->fetchAll(PDO::FETCH_OBJ);
                $this->resJSONcinco = json_encode($this->execQueryCinco);
                $this->resDeccinco = json_decode($this->resJSONcinco);

                //Nobreak's
                $this->querySeis = $this->conectar->query("SELECT localizacao FROM hwnobreaks");
                $this->execQuerySeis = $this->querySeis->fetchAll(PDO::FETCH_OBJ);
                $this->resJSONseis = json_encode($this->execQuerySeis);
                $this->resDecseis = json_decode($this->resJSONseis);

                //GMG
                $this->querySete = $this->conectar->query("SELECT localizacao FROM hwgmg");
                $this->execQuerySete = $this->querySete->fetchAll(PDO::FETCH_OBJ);
                $this->resJSONsete = json_encode($this->execQuerySete);
                $this->resDecsete = json_decode($this->resJSONsete);

                //Link de Voz

                $this->queryVoz = $this->conectar->query("SELECT localizacao FROM hwvoz");
                $this->execVoz = $this->queryVoz->fetchAll(PDO::FETCH_OBJ);
                $this->vozJSON = json_encode($this->execVoz);
                $this->vozDecode = json_decode($this->vozJSON);

                //Link de Dados

                $this->queryDados = $this->conectar->query("SELECT localizacao FROM hwlink");
                $this->execDados = $this->queryDados->fetchAll(PDO::FETCH_OBJ);
                $this->dadosJSON = json_encode($this->execDados);
                $this->dadosDecode = json_decode($this->dadosJSON); 

                //Servidores
                $this->queryServidores = $this->conectar->query("SELECT localizacao FROM hwservidores");
                $this->execServidores = $this->queryServidores->fetchAll(PDO::FETCH_OBJ);
                $this->servidoresJSON = json_encode($this->execServidores);
                $this->servidoresDecode = json_decode($this->servidoresJSON);

                //Impressoras
                $this->queryPrinter = $this->conectar->query("SELECT localizacao FROM hwimpressoras");
                $this->execPrinter = $this->queryPrinter->fetchAll(PDO::FETCH_OBJ);
                $this->printerJSON = json_encode($this->execPrinter);
                $this->printerDecode = json_decode($this->printerJSON);

                //CFTV
                $this->queryCFTV = $this->conectar->query("SELECT localizacao FROM hwcftv");
                $this->execCFTV = $this->queryCFTV->fetchAll(PDO::FETCH_OBJ);
                $this->cftvJSON = json_encode($this->execCFTV);
                $this->cftvDecode = json_decode($this->cftvJSON);

                //Ar Condicionado
                $this->queryAres = $this->conectar->query("SELECT localizacao FROM hwares");
                $this->execAres = $this->queryAres->fetchAll(PDO::FETCH_OBJ);
                $this->aresJSON = json_encode($this->execAres);
                $this->aresDecode = json_decode($this->aresJSON);

                //Projetores
                $this->queryProjetores = $this->conectar->query("SELECT localizacao FROM hwprojetores");
                $this->execProjetores = $this->queryProjetores->fetchAll(PDO::FETCH_OBJ);
                $this->projetoresJSON = json_encode($this->execProjetores);
                $this->projetoresDecode = json_decode($this->projetoresJSON);

                //HD Externo
                $this->queryHD = $this->conectar->query("SELECT localizacao FROM hwhdexterno");
                $this->execHD = $this->queryHD->fetchAll(PDO::FETCH_OBJ);
                $this->hdJSON = json_encode($this->execHD);
                $this->hdDecode = json_decode($this->hdJSON);

                //Porteiro Eletrônico;
                $this->queryPorteiro = $this->conectar->query("SELECT localizacao FROM hwporteiro");
                $this->execPorteiro = $this->queryPorteiro->fetchAll(PDO::FETCH_OBJ);
                $this->porteiroJSON = json_encode($this->execPorteiro);
                $this->porteiroDecode = json_decode($this->porteiroJSON);

                //Tablets
                $this->queryTB = $this->conectar->query("SELECT localizacao FROM hwtablets");
                $this->execTB = $this->queryTB->fetchAll(PDO::FETCH_OBJ);
                $this->tbJSON = json_encode($this->execTB);
                $this->tbDecode = json_decode($this->tbJSON);

                //Smartphones
                $this->querySM = $this->conectar->query("SELECT localizacao FROM hwsmartphones");
                $this->execSM = $this->querySM->fetchAll(PDO::FETCH_OBJ);
                $this->smJSON = json_encode($this->execSM);
                $this->smDecode = json_decode($this->smJSON);

                //PIN
                $this->queryPIN = $this->conectar->query("SELECT localizacao FROM hwpin");
                $this->execPIN = $this->queryPIN->fetchAll(PDO::FETCH_OBJ);
                $this->pinJSON = json_encode($this->execPIN);
                $this->pinDecode = json_decode($this->pinJSON);

                //Softwares
                $this->querySW = $this->conectar->query("SELECT localizacao FROM softwares");
                $this->execSW = $this->querySW->fetchAll(PDO::FETCH_OBJ);
                $this->swJSON = json_encode($this->execSW);
                $this->swDecode = json_decode($this->swJSON);
                
                //Pega os valores, ignorando as chaves do Array

                // Desktop's Dell
                for($i=0;$i<count($this->resDec);$i++){

                    $this->desktopDell[$i] = trim($this->resDec[$i]->localizacao);

                }

                // Desktop's Genêricos
                for($i=0;$i<count($this->resDecDesktop);$i++){

                    $this->desktop[$i] = trim($this->resDecDesktop[$i]->localizacao);

                }
                
                //Notebook's Dell
                for($i=0;$i<count($this->resDectres);$i++){

                    $this->notebookDell[$i] = trim($this->resDectres[$i]->localizacao);

                }

                //Notebook's
                for($i=0;$i<count($this->resDecquatro);$i++){

                    $this->notebook[$i] = trim($this->resDecquatro[$i]->localizacao);

                }

                //Rede
                for($i=0;$i<count($this->resDeccinco);$i++){

                    $this->rede[$i] = trim($this->resDeccinco[$i]->localizacao);

                }

                //Nobreaks
                for($i=0;$i<count($this->resDecseis);$i++){

                    $this->nobreak[$i] = trim($this->resDecseis[$i]->localizacao);

                }

                //GMG
                for($i=0;$i<count($this->resDecsete);$i++){

                    $this->gmg[$i] = trim($this->resDecsete[$i]->localizacao);

                }

                // Link de Voz
                for($i=0;$i<count($this->vozDecode);$i++){

                    $this->linkvoz[$i] = trim($this->vozDecode[$i]->localizacao);

                }

                // Link de Dados
                for($i=0;$i<count($this->dadosDecode);$i++){

                    $this->linkdados[$i] = trim($this->dadosDecode[$i]->localizacao);


                }

                // Servidores
                for($i=0;$i<count($this->servidoresDecode);$i++){

                    $this->servidores[$i] = trim($this->servidoresDecode[$i]->localizacao);

                }

                // Impressoras
                for($i=0;$i<count($this->printerDecode);$i++){

                    $this->impressoras[$i] = trim($this->printerDecode[$i]->localizacao);

                }

                // CFTV
                for($i=0;$i<count($this->cftvDecode);$i++){

                    $this->cftv[$i] = trim($this->cftvDecode[$i]->localizacao);

                }

                // Ar Condicionado
                for($i=0;$i<count($this->aresDecode);$i++){

                    $this->ares[$i] = trim($this->aresDecode[$i]->localizacao);

                }

                // Projetores
                for($i=0;$i<count($this->projetoresDecode);$i++){

                    $this->projetores[$i] = trim($this->projetoresDecode[$i]->localizacao);

                }

                // HD Externo
                for($i=0;$i<count($this->hdDecode);$i++){

                    $this->hd[$i] = trim($this->hdDecode[$i]->localizacao);

                }

                // Porteiro Eletrônico
                for($i=0;$i<count($this->porteiroDecode);$i++){

                    $this->porteiro[$i] = trim($this->porteiroDecode[$i]->localizacao);

                }
                
                // Tablets
                for($i=0;$i<count($this->tbDecode);$i++){

                    $this->tablet[$i] = trim($this->tbDecode[$i]->localizacao);

                }

                //Smartphones
                for($i=0;$i<count($this->smDecode);$i++){

                    $this->smartphones[$i] = trim($this->smDecode[$i]->localizacao);

                }

                //PIN
                for($i=0;$i<count($this->pinDecode);$i++){

                    $this->pin[$i] = trim($this->pinDecode[$i]->localizacao);

                }

                //Softwares
                for($i=0;$i<count($this->swDecode);$i++){

                    $this->softwares[$i] = trim($this->swDecode[$i]->localizacao);

                }

                    // Verifica se há dados nas tabelas, caso não haja, cria uma array vazia para que o merge não bug, fazendo com que o select retorne vazio...
                    ## GAMBIARRA DAS BRABA ###
                    if($this->desktopDell == null){

                        $this->desktopDell = array();

                    }elseif($this->desktop == null){

                        $this->desktop = array();

                    }elseif($this->notebookDell == null)
                    {
                        $this->notebookDell = array();

                    }elseif($this->notebook == null)
                    {
                        $this->notebook = array();

                    }elseif($this->rede == null)
                    {
                        $this->rede = array();

                    }elseif($this->nobreak == null)
                    {
                        $this->nobreak = array();

                    }elseif($this->gmg == null)
                    {
                        $this->gmg = array();

                    }elseif($this->linkvoz == null)
                    {
                        $this->linkvoz = array();

                    }elseif($this->linkdados == null)
                    {
                        $this->linkdados = array();

                    }elseif($this->servidores == null)
                    {
                        $this->servidores = array();

                    }elseif($this->impressoras == null)
                    {
                        $this->impressoras = array();

                    }elseif($this->cftv == null)
                    {
                        $this->cftv = array();

                    }elseif($this->ares == null)
                    {
                        $this->ares = array();

                    }elseif($this->projetores == null)
                    {
                        $this->projetores = array();

                    }elseif($this->hd == null){

                        $this->hd = array();

                    }elseif($this->porteiro == null){

                        $this->porteiro = array();

                    }elseif($this->tablet == null){

                        $this->tablet = array();

                    }elseif($this->smartphones == null){

                        $this->smartphones = array();

                    }elseif($this->pin == null){

                        $this->pin = array();

                    }elseif($this->softwares == null){

                        $this->softwares = array();

                    }

            
                //Une as duas arrays e ignora os valores repetidos
                //Adicionar valores ao Merge de acordo com o preenchimento do inventário
                //EX: HWDESKTOP, HWDESKTOPNORMAL E HWNOTEBOOKNORMAL ADICIONADOS AO MERGE,
                //CASO EU TENTE ADICIONAR O HWNOTEBOOKDELL E ELE ESTIVER VAZIO,
                //O RETORNO DO JSON SERÁ NULO
                
                
                $this->arrMerge = array_merge($this->desktopDell,$this->desktop,$this->notebookDell,$this->notebook, $this->rede, $this->nobreak, $this->gmg, $this->linkvoz,$this->linkdados,$this->servidores,$this->impressoras,$this->cftv,$this->ares,$this->projetores,$this->hd,$this->porteiro,$this->tablet,$this->smartphones,$this->pin,$this->softwares);
                $this->arrUnique = array_unique(array_filter($this->arrMerge));
                
                // Joga os valores numa Array, porém, a array não é válida para o JSON
                for($i=0;$i<count($this->arrUnique);$i++){
                    $this->resul = $this->arrUnique;
                }

                // joga os valores numa String

                $this->arrString = implode('---',$this->resul);


                // Separa os valores da String que antes estavam juntos...
                $this->exString = explode('---',$this->arrString);

                // Transforma os valores numa array associativa

                for($i=0;$i<count($this->exString);$i++){

                    $resultado[$i] = array(
                        "localizacao"=>$this->exString[$i]
                    );


                }

                // Retorna o JSON válido, aceitável para o DataTables
                $this->arrJson = json_encode($resultado);
                echo $this->arrJson;
                
            }


    }


    //Chamada das funções
    $sauInv = new mostraLocais;
    $sauInv->__constructor();


?>


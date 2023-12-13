<?php

include '../../controller/PDOClass.php';

class responseSelect extends conPDO{

    // Variáveis utilizadas para execução da consulta
    public $localizacao;
    private $query;
    private $exec;
    private $resul;
    private $value;

    // SET das Quey's
    private function __constructor(){
        $this->localizacao = filter_input(INPUT_GET,'localizacao');
        $this->query['dell'] = "SELECT * FROM hwdesktop WHERE localizacao = '$this->localizacao'";
        $this->query['variados'] = "SELECT * FROM hwdesktopnormal WHERE localizacao = '$this->localizacao'";
        $this->query['notedell'] = "SELECT * FROM hwnotebookdell WHERE localizacao = '$this->localizacao'";
        $this->query['notebookOutros'] = "SELECT * FROM hwnotebooknormal WHERE localizacao = '$this->localizacao'";
        $this->query['rede'] = "SELECT * FROM hwrede WHERE localizacao = '$this->localizacao'";
        $this->query['nobreaks'] = "SELECT * FROM hwnobreaks WHERE localizacao = '$this->localizacao'";
        $this->query['gmg'] = "SELECT * FROM hwgmg WHERE localizacao = '$this->localizacao'";
        $this->query['voz'] = "SELECT * FROM hwvoz WHERE localizacao = '$this->localizacao'";
        $this->query['dados'] = "SELECT * FROM hwlink WHERE localizacao = '$this->localizacao'";
        $this->query['servidores'] = "SELECT * FROM hwservidores WHERE localizacao = '$this->localizacao'";
        $this->query['impressoras'] = "SELECT * FROM hwimpressoras WHERE localizacao = '$this->localizacao'";
        $this->query['cftv'] = "SELECT * FROM hwcftv WHERE localizacao = '$this->localizacao'";
        $this->query['tablets'] = "SELECT * FROM hwtablets WHERE localizacao = '$this->localizacao'";
        $this->query['smartphones'] = "SELECT * FROM hwsmartphones WHERE localizacao ='$this->localizacao'";
        $this->query['hds'] = "SELECT * FROM hwhdexterno WHERE localizacao = '$this->localizacao'";
        $this->query['peletronico'] = "SELECT * FROM hwporteiro WHERE localizacao = '$this->localizacao'";
        $this->query['projetores'] = "SELECT * FROM hwprojetores WHERE localizacao = '$this->localizacao'";
        $this->query['ares'] = "SELECT * FROM hwares WHERE localizacao = '$this->localizacao'";
        $this->query['pin'] = "SELECT * FROM hwpin WHERE localizacao = '$this->localizacao'";
        $this->query['softwares'] = "SELECT * FROM softwares WHERE localizacao = '$this->localizacao'";

    }

    // As funções abaixo são responsáveis por verificar se o local informado contem dados na tabela 
    // Caso contenha, retorna a opção da tabela

    // Desktops Dell
    private function verificaDell(){
        $this->exec = $this->conectar->prepare($this->query['dell']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="dell">Desktops Dell</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }

    }

    // Desktop's Outros
    private function verificaDesktop(){
        $this->exec = $this->conectar->prepare($this->query['variados']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="variados">Desktops</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }

    }

    // Notebook's Dell
    private function verificaNoteDell(){
        $this->exec = $this->conectar->prepare($this->query['notedell']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="notedell">Notebooks Dell</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Notebook's Outros
    private function verificaNotebookOutros(){
        $this->exec = $this->conectar->prepare($this->query['notebookOutros']);
            if($this->exec->execute() === true){
                $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
                if($this->resul <> null){
                    echo '<option value="notebooks">Notebooks</option>'.PHP_EOL;
                }else{
                    return false;
                }
            }else{
                echo "ERRO : Não foi possível realizar a consulta";
                print_r($this->exec->errorInfo());
            }
    }

    // Rede
    private function verificaRede(){
        $this->exec = $this->conectar->prepare($this->query['rede']);
            if($this->exec->execute() === true){
                $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
                if($this->resul <> null){
                    echo '<option value="rede">Rede</option>'.PHP_EOL;
                }else{
                    return false;
                }
            }else{
                echo "ERRO : Não foi possível realizar a consulta";
                print_r($this->exec->errorInfo());
            }
    }

    // Nobreaks
    private function verificaNobreaks(){
        $this->exec = $this->conectar->prepare($this->query['nobreaks']);
            if($this->exec->execute() === true){
                $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
                if($this->resul <> null){
                    echo '<option value="nobreaks">Nobreaks</option>'.PHP_EOL;
                }else{
                    return false;
                }
            }else{
                echo "ERRO : Não foi possível realizar a consulta";
                print_r($this->exec->errorInfo());
            }
    }

    // GMG
    private function verificaGMG(){
        $this->exec = $this->conectar->prepare($this->query['gmg']);
            if($this->exec->execute() === true){
                $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
                if($this->resul <> null){
                    echo '<option value="gmg">GMG</option>'.PHP_EOL;
                }else{
                    return false;
                }
            }else{
                echo "ERRO : Não foi possível realizar a consulta";
                print_r($this->exec->errorInfo());
            }
    }

    // Link de Voz
    private function verificaVoz(){
        $this->exec = $this->conectar->prepare($this->query['voz']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="voz">Link de Voz</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Link de Dados
    private function verificaDados(){
        $this->exec = $this->conectar->prepare($this->query['dados']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="dados">Link de Dados</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Servidores
    private function verificaServidores(){
        $this->exec = $this->conectar->prepare($this->query['servidores']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="servidores">Servidores</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Impressoras
    private function verificaImpressoras(){
        $this->exec = $this->conectar->prepare($this->query['impressoras']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="impressoras">Impressoras</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // CFTV
    private function verificaCFTV(){
        $this->exec = $this->conectar->prepare($this->query['cftv']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="cftv">CFTV</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Tablets
    private function verificaTablets(){
        $this->exec = $this->conectar->prepare($this->query['tablets']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="tablets">Tablets</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Smartphones
    private function verificaSmartphones(){
        $this->exec = $this->conectar->prepare($this->query['smartphones']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="smartphones">Smartphones</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // HD Externo
    private function verificaHDS(){
        $this->exec = $this->conectar->prepare($this->query['hds']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="hds">HD Externo</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Porteiro Eletronico
    private function verificaPorteiro(){
        $this->exec = $this->conectar->prepare($this->query['peletronico']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="peletronico">Porteiro Eletrônico</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Projetores
    private function verificaProjetores(){
        $this->exec = $this->conectar->prepare($this->query['projetores']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="projetores">Projetores</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Ar condicionado
    private function verificaAres(){
        $this->exec = $this->conectar->prepare($this->query['ares']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="ares">Ares</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // PIN
    private function verificaPIN(){
        $this->exec = $this->conectar->prepare($this->query['pin']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="pin">PIN</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    // Softwares
    private function verificaSoftwares(){
        $this->exec = $this->conectar->prepare($this->query['softwares']);
        if($this->exec->execute() === true){
            $this->resul = $this->exec->fetchAll(PDO::FETCH_OBJ);
            if($this->resul <> null){
                echo '<option value="softwares">Softwares</option>'.PHP_EOL;
            }else{
                return false;
            }
        }else{
            echo "ERRO : Não foi possível realizar a consulta";
            print_r($this->exec->errorInfo());
        }
    }

    

    public function executeAll(){
        $this->__constructor();
        $this->verificaDell();
        $this->verificaDesktop();
        $this->verificaNoteDell();
        $this->verificaNotebookOutros();
        $this->verificaRede();
        $this->verificaNobreaks();
        $this->verificaGMG();
        $this->verificaVoz();
        $this->verificaDados();
        $this->verificaServidores();
        $this->verificaImpressoras();
        $this->verificaCFTV();
        $this->verificaTablets();
        $this->verificaSmartphones();
        $this->verificaHDS();
        $this->verificaPorteiro();
        $this->verificaProjetores();
        $this->verificaAres();
        $this->verificaPIN();
        $this->verificaSoftwares();
    }

}

   

     


$inventario = new responseSelect;
$inventario->executeAll();


?>
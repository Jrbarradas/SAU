<?php

include "../../controller/PDOClass.php";

/*
 Classe responsável por verificar se o btnVisualizar foi acionado
 Caso tenha sido acionada, ela responde ao Cliente para que o mesmo possa enviar Print's ao server a cada X Segundos
 */
class checkVisualizar extends conPDO{

    // Variáveis utilizadas no Script
    static private $hostname;
    static private $diretorio;
    static private $arquivo;

    // Variáveis da Query
    protected $id;
    protected $resultado;
    protected $closed;
    static private $query;
    static private $execQuery;

    // Set das variáveis
    public function __constructor(){
        self::$hostname = filter_input(INPUT_GET,'hostname');
        self::$diretorio = "../../imagens_central/";
        self::$arquivo = self::$diretorio.self::$hostname;
    }

    // Caso seja acionado a visualização de tela
    public function criaArquivo(){
        // Set Variáveis da Query
        $this->id = filter_input(INPUT_GET,'id');
        self::$query = "SELECT * FROM sau_central WHERE id = $this->id";
        // Verifica se foi repassado o ID, caso não, não faz nada
        if($this->id <> null){
            // Executa e verifica o resultado da Query  
            self::$execQuery = $this->conectar->prepare(self::$query);
            if(self::$execQuery->execute()){
                $this->resultado = self::$execQuery->fetchAll(PDO::FETCH_OBJ);
                // Cria o Arquivo no Servidor
                $arq = "../../imagens_central/".$this->resultado[0]->hostname;
                $fp = fopen($arq,'w+');
                fwrite($fp,1);
                fclose($fp);
                self::$query = null;
                self::$execQuery = null;
            }else{
                self::$query = null;
                self::$execQuery = null;
            }
        }
    
    }

    // Deleta arquivo caso a tela seja
    public function deletaArquivo(){
        // Set das variáveis
        $this->closed = filter_input(INPUT_GET,'closed');
        self::$query = "SELECT * FROM sau_central WHERE id = $this->closed";
        // Verifica se a operação Closed foi repassada via Ajax
        if($this->closed<>null){
            // Execução e verificação da Query
            self::$execQuery = $this->conectar->prepare(self::$query);
            if(self::$execQuery->execute()){
                $this->resultado = self::$execQuery->fetchAll(PDO::FETCH_OBJ);
                $arq = "/var/www/html/sau/imagens_central/".$this->resultado[0]->hostname;
                if(file_exists($arq)){
                $shxExec = shell_exec("rm $arq");
                self::$query = null;
                self::$execQuery = null;
                }else{
                    echo "FILE RENEW";
                    self::$query = null;
                    self::$execQuery = null;
                }
            }
        }
    
    }
    

    // Verifica se o Server está requisitando a visualização de tela do Cliente
    public function verificaArquivo(){
        $this->__constructor();
        if(file_exists(self::$arquivo)){
            echo 1;
        }else{
            echo 0;
        }
    }

    
}

// Utilização da classe
$sauServer = new checkVisualizar;
$sauServer->deletaArquivo();
$sauServer->criaArquivo();
$sauServer->verificaArquivo();

?>
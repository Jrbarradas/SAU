<?php

class conPDO{
    // Atributos necessários para a conexão
    public $conectar;
    private $host;
    private $port;
    private $db;
    private $user;
    private $pass;

    // Realiza a conexão com o banco de dados
    // A conexão é tratada no try/catch
    public function conPDO(){
        // Set de atributos
        $this->host = "localhost";
        $this->port = "3306";
        $this->db =  "inventario_teste";
        $this->user = "root";
        $this->pass = "kratos.2010";
        try {
            // Caso não haja nenhum erro, realiza a conexão
            $this->conectar = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db","$this->user","$this->pass");
            return true;

        }catch(PDOException $error){
            // Caso haja algum erro na conexão, exibe a mensagem...
            echo "ERRO : ". $error->getMessage().'<br>'.PHP_EOL;
            echo "ID : ". $error->getLine();
            return false;
        }

    }
}

?>
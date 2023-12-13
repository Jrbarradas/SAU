<?php

include "../../controller/PDOClass.php";

class computadoresCentral extends conPDO{

    // Variáveis utilizadas na class
    static private $token;
    static private $query;
    static private $select;
    static private $execQuery;
    protected $hostname;
    
    public function cadastraComputador(){

        // Set das variáveis
        $this->hostname = filter_input(INPUT_GET,'hostname');
        self::$select = "SELECT * FROM sau_central WHERE hostname = '$this->hostname'";
        self::$query = "INSERT INTO sau_central VALUES(NULL, '$this->hostname','X','0000','X')";
        self::$execQuery = $this->conectar->prepare(self::$select);

        // É realizado a execução e verificação da Query
        // Após isso é retornado a mensagem de sucesso ou erro...
            // Verifica se o Computador já foi cadastrado no sistema
            if(self::$execQuery->execute()){
                echo "Consulta Realizada!<br>";
                $resultado = self::$execQuery->fetchAll(PDO::FETCH_OBJ);
                self::$select = null;
                self::$execQuery = null;
                // Caso já tenha sido cadastrado
                if($resultado <> null){
                    echo "ERRO : O computador já foi cadastrado!";
                }else{
                    // Caso não tenha sido cadastrado, é realizado o cadastro
                    self::$execQuery = $this->conectar->prepare(self::$query);
                    switch(self::$execQuery->execute()){
                        case true:
                            echo "Computador adicionado com sucesso!";
                            self::$execQuery = null;
                            self::$query = null;
                            break;

                            case false:
                                echo "ERRO : Não foi possível cadastrar o computador!";
                                print_r(self::$execQuery->errorInfo());
                                self::$execQuery = null;
                                self::$query = null;
                                break;
                    }
                }
            }else{
                echo "Não foi possível realizar a consulta";
                print_r(self::$execQuery->errorInfo());
                self::$select = null;
                self::$execQuery = null;
            }
    }

}

$monitor = new computadoresCentral;
$monitor->cadastraComputador();

?>
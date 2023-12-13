<?php

// Include da Conexão
include './PDOClass.php';

class centralCadastrados extends conPDO{
    // Variáveis utilizadas para a Query
    static private $query;
    static private $execQuery;
    protected $resultado;
    protected $objCad;

    // Set das variáveis
    public function __constructor(){
        self::$query = "SELECT * FROM sau_central";
        self::$execQuery = $this->conectar->prepare(self::$query);
    }

    //Realiza a consulta
    public function verCadastrados(){
        // Chamada do Constructor
        $this->__constructor();
        /* Verifica se a Query foi executada com sucesso,
        Caso tenha sido executada corretamente, realiza o fetch do Obj e o transforma numa array
        Cuja a qual será exibida em JSON para que o DataTables possa consumi-lá
        */
        if(self::$execQuery->execute()){
            // Fetch
            $this->resultado = self::$execQuery->fetchAll(PDO::FETCH_OBJ);
            // Transformando em Array
            for($i=0;$i<count($this->resultado);$i++){
                $this->objCad[$i] = array(
                    "id"=>$this->resultado[$i]->id,
                    "pa"=>$this->resultado[$i]->pa,
                    "hostname"=>$this->resultado[$i]->hostname,
                    "token"=>$this->resultado[$i]->token,
                    "observacao"=>$this->resultado[$i]->observacao,
                    "acao"=>"
                    <button type='submit' id='btnCentral".$this->resultado[$i]->id."' data-toggle='modal' data-target='#centralModal' class='sau-btn centralView' value='".$this->resultado[$i]->id."'>Visualizar</button>
                    <button type='submit' id='btnCEditar".$this->resultado[$i]->id."' data-toggle='modal' data-target='#DVModal' class='sau-btn-dark centralViewEditar' value='".$this->resultado[$i]->id."'>Editar</button>
                    "
                    
                );
            }
            // JSON Encode
            $this->objCad = json_encode($this->objCad);
            echo $this->objCad;
            // Caso a Query não tenha sucesso
        }else{
            echo "ERRO : Não foi possível realizar a consulta! <br>".PHP_EOL;
            print_r(self::$execQuery->errorInfo());
        }
    }

}

// Chamada das Ações
$listarCad = new centralCadastrados;
$listarCad->verCadastrados();


?>
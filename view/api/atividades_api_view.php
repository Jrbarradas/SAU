<?php

include '../../controller/dir_inc.php';
include DIR_INC.'/controller/PDOClass.php';

    class extraiLog extends conPDO{
        // Variáveis da Query
        protected $query;
        protected $execQuery;
        private $resulConsulta;
        private $convertJSON;

        // SET da Query
        private function __constructor(){
            $this->query = "SELECT * FROM sau_atividades";
        }

        // Realiza a consulta no DB e faz um Fetch do Resul
        // Caso a consulta de errado, é retornado o erro
        private function realizaConsulta(){
            $this->__constructor();

            $this->execQuery = $this->conectar->prepare($this->query);

            if($this->execQuery->execute() === true){
                $this->resulConsulta = $this->execQuery->fetchAll(PDO::FETCH_OBJ);
                $this->query = null;
                $this->execQuery = null;

            }else{
                echo "ERRO : Não foi possível exibir os LOG'S";
                print_r($this->execQuery->errorInfo());
            }
        
        }

        // Exibe o resultado da Consulta
        public function exibeConsulta(){
            $this->realizaConsulta();
            /* Armazena os dados do Fetch numa array associativa */
            /* Essa Array Será convertida em JSON para que o DataTables possa consumila */
            for($i=0;$i<count($this->resulConsulta);$i++){

                $data = explode(" ",$this->resulConsulta[$i]->DateTime);
                //var_dump($data);
                $this->convertJSON[$i] = array(
                    "usuario"=>$this->resulConsulta[$i]->usuario,
                    "acao"=>$this->resulConsulta[$i]->acao,
                    "data"=>$data[0],
                    "hora"=>$data[1]
                );
            }
           // Exibe o JSON
           echo json_encode($this->convertJSON);
        }
        
    }

    $atividades = new extraiLog;
    $atividades->exibeConsulta();

?>
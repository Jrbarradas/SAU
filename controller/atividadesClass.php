<?php

/* 
Require - Conexão Banco de Dados
Include - Verificar se o usuário tem permissão de Administrador
*/

require_once './dir_inc.php';
require DIR_INC.'/controller/PDOClass.php';
include DIR_INC.'/controller/adminAuth.php';
$admin = new permissaoUsuario;
$admin->verPermissao();

class userLogs extends conPDO{

    // Variáveis que armazenam o usuario, query e a execução da query
    public $usuario;
    private $query;
    private $execPDO;

    // SET da variável usuário através do valor recuperado da SESSION
    public function __constructor(){
        $this->usuario = base64_decode($_SESSION['usuario_logado']);
    }

    // Função responsável por registrar a ação do usuário no DB
    public function registraLog($acao){
        // Query e Prepare da Query
        $this->query = "INSERT INTO sau_atividades VALUES(NULL,'$this->usuario','$acao', CURRENT_TIMESTAMP())";
        $this->execPDO = $this->conectar->prepare($this->query);
        // Executa, verifica se foi executado corretamente e limpa a conexão
        if($this->execPDO->execute() === true){
            $this->query = null;
            $this->execPDO = null;
        }else{
            // Caso a query do LOG não funcione por algum motivo!;
            print_r($this->execPDO->errorInfo());
        }

    }

}


/*
Exemplo de uso
$atividade = new userLogs;
$atividade->__constructor();
$atividade->registraLog("Deletou um usuário!");
*/

?>
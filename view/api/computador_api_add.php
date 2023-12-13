<?php


class externalInsert{

    protected $patrimonio;
    protected $localizacao;
    protected $nome;
    protected $fabricante;
    protected $modelo;
    protected $uuid;
    protected $servicetag;


    private function __constructor(){
        $this->nome = strip_tags(addslashes(filter_input(INPUT_GET,'nome')));
    }

    public function addInventario(){
        $this->__constructor();
        echo $this->nome;
    }


}


$externalUser = new externalInsert;
$externalUser->addInventario();

?>
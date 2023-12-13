<?php

include PATH.'/controller/toolsAuth.php';

class redmineComent {
    public $id;
    public $comentario;
    public $stripComentario;
    public $filter;
    private $exec;



        public function checarDados(){
            if($this->id && $this->comentario <> null){
               return true;
            }else{
                return false;
            }   
        }

        public function enviaComentario(){
            if($this->checarDados()){
             $this->exec = shell_exec("php /var/www/html/owncloud/beta/sau/tarefas_json/editarTarefa.php $this->id $this->stripComentario");
             echo "<script>window.location.href=\"http://docs.spacecom.com.br/beta/sau/view/editarTarefa.php?id=$this->id\";</script>";
            } else {
                var_dump($this->id);
                var_dump($this->comentario);
                die('Protocolo 003 - Undefined Post');
            }
        }
}


$infos = new redmineComent;
$infos->id = strip_tags(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT));
$infos->comentario = filter_input(INPUT_POST,'comentario');
$infos->stripComentario = preg_replace('/[\n|\r|\n\r|\r\n]{2,}/',' ',$infos->comentario);
$infos->enviaComentario();


?>
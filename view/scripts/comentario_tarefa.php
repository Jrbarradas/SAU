<?php

class redmineComent {
    public $id;
    public $comentario;
    public $stripComentario;
    public $filter;
    private $adicionaComentario;

        public function checarDados(){
            if($this->id && $this->comentario <> null){
               return true;
            }else{
                return false;
            }   
        }

        public function enviaComentario(){
            if($this->checarDados()){
            // $this->exec = shell_exec("php /var/www/html/sau/scripts/add_comentario_tarefa.php $this->id $this->stripComentario");
            // echo $this->exec;
            $this->adicionaComentario = popen("curl -v -H 'Content-Type: application/json' -X PUT -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$this->id.json -d '{\"issue\": {\"notes\": \"$this->stripComentario\"}}'", 'r');
            if($this->adicionaComentario){
                echo "Comentário adicionado!";
                pclose($this->adicionaComentario);
            }else{
                echo "ERRO : Não foi possível adicionar um comentário!";
                pclose($this->adicionaComentario);
            }
        } else {
                echo "Não é possível enviar comentários em branco!";
            }
        }
}


$infos = new redmineComent;
$infos->id = strip_tags(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT));
$infos->comentario = filter_input(INPUT_POST,'comentario');
$infos->stripComentario = preg_replace('/[\n|\r|\n\r|\r\n]{2,}/',' ',$infos->comentario);
$infos->enviaComentario();


?>
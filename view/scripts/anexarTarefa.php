<?php

class anexaArquivo{

    // Variáveis utilizadas na classe
    static private $pasta;
    static private $formatos;
    static private $tmp;
    static private $nomeAtual;
    protected $nomeArquivo;
    protected $tamanhoArquivo;
    protected $extensao;
    protected $anexaImagem;
    protected $id;

    // Caminho / Formatos Permitidos
    private function __constructor(){
        $this->id = filter_input(INPUT_GET,'id');
        self::$pasta = "../../tarefas_anexos/";
        self::$formatos = array(
            "jpg",
            "jpeg",
            "png",
            "bmp",
            "gif",
            "pdf",
            "docx",
            "txt",
            "xlsx",
            "xls",
            "avi",
            "mp4",


        );
    }

    // Realiza o Upload dos arquivos
    public function realizaUpload(){
        // Chamada Constructor
        $this->__constructor();
            // Verifica se  o $_POST foi recebido corretamente
            if(isset($_POST)){
                // Atribui o nome e o tamanho do arquivo a ser enviado
                $this->nomeArquivo = $_FILES['file']['name'];
                $this->tamanhoArquivo = $_FILES['file']['size'];
                $this->extensao = pathinfo($this->nomeArquivo, PATHINFO_EXTENSION);
                // Caso o Formato seja permitido    
                if(in_array($this->extensao,self::$formatos)){
                    // Converte o tamanho do arquivo para KB
                    $this->tamanhoArquivo = round($this->tamanhoArquivo / 1024);
                    // Caso o tamanho seja o permitido
                    if($this->tamanhoArquivo < 1024){
                    // Caminho temporário do arquivo
                    self::$nomeAtual = md5(uniqid(time())).".".$this->extensao;
                    self::$tmp = $_FILES['file']['tmp_name'];
                    // Move o arquivo para a pasta setada
                    if(move_uploaded_file(self::$tmp,self::$pasta.self::$nomeAtual)){
                        echo "<br>Enviando Arquivo...<br>";
                        /*
                        Verifica a extensão e comenta no Redmine de acordo com o tipo de extensão 
                        Imgs : Upload no servidor e anexa na tarefa
                        Documentos : Upload no servidor e envia o Link no Redmine
                        */
                        $nome = self::$nomeAtual;
                        if($this->extensao === "avi" || $this->extensao === "mp4" || $this->extensao === "xlsx" || $this->extensao === "txt" || $this->extensao === "docx" || $this->extensao === "pdf"){
                            $this->anexaImagem = popen("curl -v -H 'Content-Type: application/json' -X PUT -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$this->id.json -d '{\"issue\": {\"notes\": \"[[http://sau.spacecom.com.br/sau/tarefas_anexos/$nome]]\"}}'", 'r');
                        }else{
                            $this->anexaImagem = popen("curl -v -H 'Content-Type: application/json' -X PUT -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$this->id.json -d '{\"issue\": {\"notes\": \"!http://sau.spacecom.com.br/sau/tarefas_anexos/$nome!\"}}'", 'r');                        }
                        if($this->anexaImagem){
                            echo "Arquivo anexado!";
                            pclose($this->anexaImagem);
                        }else{
                            echo "ERRO : Não foi possível anexar o arquivo!";
                            pclose($this->anexaImagem);
                        }
                    }else{
                        echo "ERRO : Não foi possível mover o arquivo!";
                    }

                    }else{
                        echo "ERRO : Tamanho não permitido!";
                    }

                    }else{
                        echo "ERRO : Formato não permitido!<br>";
                    }
            }else{
                echo "ERRO : Nenhum arquivo foi selecionado!";
            }

    }

}

        $sauTask = new anexaArquivo;
        $sauTask->realizaUpload();

?>
<?php

    include 'treAuth.php';

    class correcao extends treAuth{
        /*
        Dados que serão recebidos via POST através da página corrigir_prova.php
        */
        private $id;
        private $provaComentario;
        private $diretorio;
        private $formato;
        private $provaCorrigida;
        private $fp;
        private $dirStatus;
        private $provaStatus;

            // Set dos atributos recebidos
            public function __constructor(){
                // Requisição POST e caminho da prova com correção
                $this->id = filter_input(INPUT_POST,'id');
                $this->provaComentario = filter_input(INPUT_POST,'provaComentario');
                $this->diretorio = '../provas_json/corrigidas_json/';
                $this->formato = ".json";
                //Variáveis com o caminho da prova sem correção - Será utilizado para alterar os status 
                $this->dirStatus = '../provas_json/';
                $this->provaCorrigida = $this->diretorio.$this->id.$this->formato;
                $this->provaStatus = $this->dirStatus.$this->id.$this->formato;
            }
 
            // Verificar se os dados estão ou não estão em branco
            private function verAtributos(){
                if($this->id && $this->provaComentario <> null){
                    return true;
                } else{
                    return false;
                }
            }

            // Caso os dados não estejam em branco, faz a correção da prova e arquiva no provas_json
            public function corrigeProva(){
                if($this->verAtributos()){
                     // Retira caracteres desnecessário e que podem oferecer perigo que foram passados via POST
                     $this->provaComentario = array(
                     "comentario"=>strip_tags($this->provaComentario)
                     );
                     $this->provaEncode = json_encode($this->provaComentario);
                     // Verifica se a prova já foi corrigida
                     // Caso tenha sido corrigada, retorna erro, caso não tenha, realiza a correção 
                     if(file_exists($this->provaCorrigida)){
                         echo "<center><span class =\"badge badge-danger\" id=corrigeResul>A prova já foi corrigida, por favor, atualize a página!</span></center>";
                     } else {
                        // Armazena a correção da prova - /provas_json/corrigidas_json/
                        $this->fp = fopen($this->provaCorrigida,"w+") or die("<center><span class =\"badge badge-danger\" id=corrigeResul>ERRO : Não foi possível armazenar a correção!</span></center>");
                        fwrite($this->fp,$this->provaEncode);
                        fclose($this->fp);
                        // Altera o Status da prova na view  para corrigida!- /provas_json/
                        $this->fp = json_decode(file_get_contents($this->provaStatus));
                        $this->fp->status = "Corrigida";
                        $this->fpSalva = file_put_contents($this->provaStatus,json_encode($this->fp));
                        // Retorna a mensagem de sucesso!
                        echo "<center><span class =\"badge badge-danger\" id=corrigeResul>Correção Efetuada</span></center>";
                        echo "<center><span class =\"badge badge-danger\" id=corrigeResul>Protocolo : $this->id</span></center>";
                        echo "<center><span class =\"badge badge-danger\" id=corrigeResul>Você será redirecionado para a prova corrigida!</span></center>";
                        // Aguarda 5 segundos, redireciona para a prova Corrigida 
                        echo "<script>
                        setTimeout(function(){
                            location.href = \"prova_corrigida.php?id=$this->id\";
                      
                         }, 5000);
                        </script>";
                     }
                }else{
                    echo "<center><span class =\"badge badge-danger\" id=corrigeResul>ERRO :  Não foi feito um comentário!</span></center>";
                }

            }


    }

    // Verifica se o usuário tem a permissão para fazer a requisição POST
    // Caso tenha permissão, é efetuado o POST dos atributos e a chamada das funções respectivas!
    $corrigir = new correcao;
    if($corrigir->verPermissao() === true){
        $corrigir->__constructor();
        $corrigir->corrigeProva();
    } else {
        echo $corrigir->verPermissao();
    }

?>
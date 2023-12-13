<?php

    include '../../controller/toolsAuth.php';

     /* Respostas da prova */
     $resposta['questao1'] = strip_tags($_POST['qst1']);
     $resposta['questao2'] = strip_tags($_POST['qst2']);
     $resposta['questao3'] = strip_tags($_POST['qst3']);
     $resposta['questao4'] = strip_tags($_POST['qst4']);
     $resposta['questao5'] = strip_tags($_POST['qst5']);
     $resposta['questao6'] = strip_tags($_POST['qst6']);
     $resposta['questao7'] = strip_tags($_POST['qst7']);


     class arquivaProva{
        public $resArr;
        public $resJson;
    
            public function convertJson(){
                $this->resJson = json_encode($this->resArr);
            }

            public function salvaProva(){
                $this->dir = '../../provas_json/';
                $this->user = $_SESSION['usuario_logado'];
                $this->file = $this->dir.$this->user.'.json';
                if(file_exists($this->file) === true){
                }elseif(file_exists($this->file) === false){
                    $this->fp = fopen($this->file,'w+');
                    fwrite($this->fp,$this->resJson);
                    fclose($this->fp);
              }

            }


     }
     
        // Set de Atributos - Respostas da Prova
        $today = date("D M j G:i:s T Y"); 
        $data = new DateTime($today);
        $fuso = new DateTimeZone('America/Sao_Paulo');
        $data->setTimeZone($fuso);
        $resul = new arquivaProva;
        $resul->resArr = array(
            "questao_1"=>base64_encode($resposta['questao1']),
            "questao_2"=>base64_encode($resposta['questao2']),
            "questao_3"=>base64_encode($resposta['questao3']),
            "questao_4"=>base64_encode($resposta['questao4']),
            "questao_5"=>base64_encode($resposta['questao5']),
            "questao_6"=>base64_encode($resposta['questao6']),
            "questao_7"=>base64_encode($resposta['questao7']),
            "usuario"=>base64_decode($_SESSION['usuario_logado']),
            "status"=>"Corrigir",
            "data"=> $data->format('D-m-y H:i:s'),
            "acao"=>$_SESSION['usuario_logado']
        );
        //Convertendo os Dados em JSON
        $resul->convertJson();
        $resul->salvaProva();



?>


<h4 class="font-weight-bold text-center mt-3">Prova concluída!</h4>
      <hr>
     <div class="survey-head text-center">
   <i class="fas fa-poll-h fa-3x blue-text mb-2"></i>
  <p class="font-weight-normal">A prova realizada foi computada em nosso sistema!</p>
 </div>
<hr>
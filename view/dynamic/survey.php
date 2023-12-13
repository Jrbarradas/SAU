<?php

/* 
Dados da Avaliação que foram passados pelas telas anteriores, é realizado um Strip Tags para remover caracteres inúteis...
Essas informações são passadas via Jquery, coletadas através de Input's que estão como Hidden na view, ou seja, mesmo que sejá realizado um <script></script>
Ou algo do tipo no textarea ou no get, o comando malicioso não é executado e quando chega nesta etapa é realizado o strip tags para limpar este comando...
*/
    include '../../controller/toolsAuth.php';
    $rating['geral'] = strip_tags($_POST['rating']);
    $opiniao['geral'] = strip_tags($_POST['opiniao']);
    $rating['teoria'] = strip_tags($_POST['ratingTeoria']);
    $opiniao['teoria'] = strip_tags($_POST['opiniaoTeoria']);
    $rating['carga'] = strip_tags($_POST['ratingCarga']);
    $opiniao['carga'] = strip_tags($_POST['opiniaoCarga']);
    $rating['instrutores'] = strip_tags($_POST['ratingIns']);
    $opiniao['instrutores'] = strip_tags($_POST['opiniaoIns']);
    $rating['apostila'] = strip_tags($_POST['ratingApostila']);
    $opiniao['apostila'] = strip_tags($_POST['opiniaoApostila']);
    $rating['info'] = strip_tags($_POST['ratingInfo']);
    $opiniao['info'] = strip_tags($_POST['opiniaoInfo']);

            class surveySend extends toolsAuth{

                public $dados;
                public $dadosJson;
                private $dir;
                private $file;
                private $fp;
                private $user;

                // Converte os dados passados pelas Views em JSON
                public function convertJson(){
                    $this->dadosJson = json_encode($this->dados);
                }

                // Salve a Survey realizada em um DB JSON com o nome do usuário
                public function saveSurvey(){
                    $this->dir = '../../ava_json/';
                    $this->user = $_SESSION['usuario_logado'];
                    $this->file = $this->dir.$this->user.'.json';

                    if(file_exists($this->file) === true){
                    }elseif(file_exists($this->file) === false){
                        $this->fp = fopen($this->file,'w+');
                        fwrite($this->fp,$this->dadosJson);
                        fclose($this->fp);
                  }

                }
            }
        


        // Set dos atributos que foram repassados durante a Survey
        $today = date("D M j G:i:s T Y"); 
        $data = new DateTime($today);
        $fuso = new DateTimeZone('America/Sao_Paulo');
        $data->setTimeZone($fuso);
        $surveyFinish = new surveySend;
        $surveyFinish->dados = array(
            "ratingGeral"=>base64_encode($rating['geral']),
            "opiniaoGeral"=>base64_encode($opiniao['geral']),
            "ratingTeoria"=>base64_encode($rating['teoria']),
            "opiniaoTeoria"=>base64_encode($opiniao['teoria']),
            "ratingCarga"=>base64_encode($rating['carga']),
            "opiniaoCarga"=>base64_encode($opiniao['carga']),
            "ratingIns"=>base64_encode($rating['instrutores']),
            "opiniaoIns"=>base64_encode($opiniao['instrutores']),
            "ratingApostila"=>base64_encode($rating['apostila']),
            "opiniaoApostila"=>base64_encode($opiniao['apostila']),
            "ratingInfo"=>base64_encode($rating['info']),
            "opiniaoInfo"=>base64_encode($opiniao['info']),
            "usuario"=>base64_decode($_SESSION['usuario_logado']),
            "data"=> $data->format('D-m-y H:i:s'),
            "status"=>"Realizada",
            "acao"=>$_SESSION['usuario_logado']
        );

        // Chamada das funções responsáveis por converter em JSON e armazenar os dados da Survey
        $surveyFinish->convertJson();
        $surveyFinish->saveSurvey();
        
       
        



?>





      <h4 class="font-weight-bold text-center mt-3">Avaliação concluída!</h4>
      <hr>
     <div class="survey-head text-center">
   <i class="fas fa-poll-h fa-3x blue-text mb-2"></i>
  <p class="font-weight-normal">Sua avaliação foi computada em nosso sistema!</p>
 </div>
<hr>
        
        
        
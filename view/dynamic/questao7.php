<?php

include '../../controller/toolsAuth.php';
$resposta['questao1'] = $_POST['qst1'];
$resposta['questao2'] = $_POST['qst2'];
$resposta['questao3'] = $_POST['qst3'];
$resposta['questao4'] = $_POST['qst4'];
$resposta['questao5'] = $_POST['qst5'];
$resposta['questao6'] = $_POST['qst6'];



?>


<div class="row">
      <div class="container" id="conteudo">
        <h4 class="font-weight-bold text-center mt-3">Questão 7</h4>
        <hr>
        <div class="survey-head text-center">
          <i class="fas fa-poll-h fa-3x blue-text mb-2"></i>
          <p class="font-weight-normal">
          Como podemos verificar as operadoras dos simcards dosdispositivos.
          </p>
        </div>
        <hr>
        <!--<p class="text-center">Assinale a alternativa que preenche as lacunas:</p> -->
<center>
        <textarea class="form-control" id="qst7" name="opiniao" placeholder="" required></textarea>
        <!-- Valores que serão passados para as próximas views -->
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst1" value="<?php echo $resposta['questao1'];?>">
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst2" value="<?php echo $resposta['questao2'];?>">
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst3" value="<?php echo $resposta['questao3'];?>">
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst4" value="<?php echo $resposta['questao4'];?>">
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst5" value="<?php echo $resposta['questao5'];?>">
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst6" value="<?php echo $resposta['questao6'];?>">
        <div class="form-check mb-4">
        <button type="button" class="sau-btn" style="margin-top:10px" id="btnQst4">Enviar</button>
        </div>
      </div>

</center>

<script>
            //Botão Enviar
            $('#btnQst4').on('click', function(){
            let resposta = {
                qst1 : $("#qst1").val(),
                qst2 : $("#qst2").val(),
                qst3 : $("#qst3").val(),
                qst4 : $("#qst4").val(),
                qst5 : $("#qst5").val(),
                qst6 : $("#qst6").val(),
                qst7 : $("#qst7").val()
            }
            $('#conteudo').load('../view/dynamic/provafinalizada.php',{qst1:resposta.qst1,qst2:resposta.qst2,qst3:resposta.qst3,qst4:resposta.qst4,qst5:resposta.qst5,qst6:resposta.qst6,qst7:resposta.qst7});
    });
</script>
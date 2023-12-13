<?php
include '../../controller/toolsAuth.php';
$resposta['questao1'] = $_GET['qst1'];
$resposta['questao2'] = $_GET['qst2'];



?>


<div class="row">
      <div class="container" id="conteudo">
        <h4 class="font-weight-bold text-center mt-3">Questão 3</h4>
        <hr>
        <div class="survey-head text-center">
          <i class="fas fa-poll-h fa-3x blue-text mb-2"></i>
          <p class="font-weight-normal">
          Em relação ao estoque assinale a opção incorreta:
          </p>
        </div>
        <hr>
        <!--<p class="text-center">Assinale a alternativa que preenche as lacunas:</p> -->
<center>
        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstA" value="A" checked>
          <label class="form-check-label" for="radio-179">Só é possível ativar o monitorado caso o equipamento esteja no mesmo
estabelecimento</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstB" value="B">
          <label class="form-check-label" for="radio-279">Para realizar a ativação do monitorado o status do equipamento tem que estar
classificado como “estoque”.
</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstC" value="C">
          <label class="form-check-label" for="radio-379">Podemos alterar o status de todos os equipamentos relacionados no inventário.</label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstD" value="D">
          <label class="form-check-label" for="radio-479">É impossível alterar o status de qualquer equipamento que esteja ativo.</label>
        </div>
        <!-- Valores que serão passados para as próximas views -->
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst1" value="<?php echo $resposta['questao1'];?>">
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst2" value="<?php echo $resposta['questao2'];?>">
        <div class="form-check mb-4">
        <button type="button" class="sau-btn" style="margin-top:10px" id="btnQst3">Enviar</button>
        </div>
      </div>

</center>

<script>
            //Botão Enviar
            $('#btnQst3').on('click', function(){

            if(qstA.checked){
            let resposta = {
                qst1 : $("#qst1").val(),
                qst2 : $("#qst2").val(),
                qst3 : $("#qstA").val()
            }
            $('#conteudo').load('../view/dynamic/questao4.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2+'&qst3='+resposta.qst3);

            }else if(qstB.checked){

            let resposta = {
                qst1 : $("#qst1").val(),
                qst2 : $("#qst2").val(),
                qst3 : $("#qstB").val()
            }
            $('#conteudo').load('../view/dynamic/questao4.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2+'&qst3='+resposta.qst3);

            }else if(qstC.checked){

            let resposta = {
                qst1 : $("#qst1").val(),
                qst2 : $("#qst2").val(),
                qst3 : $("#qstC").val()
            }
            $('#conteudo').load('../view/dynamic/questao4.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2+'&qst3='+resposta.qst3);

            }else if(qstD.checked){

            let resposta = {
                qst1 : $("#qst1").val(),
                qst2 : $("#qst2").val(),
                qst3 : $("#qstD").val()
            }
            $('#conteudo').load('../view/dynamic/questao4.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2+'&qst3='+resposta.qst3);

            }

            });
</script>
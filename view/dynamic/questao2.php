<?php
include '../../controller/toolsAuth.php';
$resposta['questao1'] = $_GET['qst1'];


?>

<div class="row">
      <div class="container" id="conteudo">
        <h4 class="font-weight-bold text-center mt-3">Questão 2</h4>
        <hr>
        <div class="survey-head text-center">
          <i class="fas fa-poll-h fa-3x blue-text mb-2"></i>
          <p class="font-weight-normal">
          A localização é obtida através do ______ a cada minuto e transmitida para os servidores do SAC24 pela rede _________.______ <br> só serão finalizadas quando o equipamento
          recuperar a comunicação.
          </p>
        </div>
        <hr>
        <p class="text-center">Assinale a alternativa que preenche as lacunas:</p>
<center>
        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstA" value="A" checked>
          <label class="form-check-label" for="radio-179">A - Chamadas de contato, GPRS e GPS</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstB" value="B">
          <label class="form-check-label" for="radio-279">B - GPS, GPRS e Áreas individuais</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstC" value="C">
          <label class="form-check-label" for="radio-379">C - GPS, GPRS e chamadas de contato</label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="qstD" value="D">
          <label class="form-check-label" for="radio-479">D - GPRS, GPS e chamadas de contato</label>
        </div>
        <!-- Valores que serão passados para as próximas views -->
        <input type="hidden" class="form-check-input" name="rating" type="radio" id="qst1" value="<?php echo $resposta['questao1'];?>">
        <div class="form-check mb-4">
        <button type="button" class="sau-btn" style="margin-top:10px" id="btnQst2">Enviar</button>
        
        </div>
      </div>

</center>


<script>


//Botão Enviar
$('#btnQst2').on('click', function(){

if(qstA.checked){
let resposta = {
    qst1 : $("#qst1").val(),
    qst2 : $("#qstA").val()
}
$('#conteudo').load('../view/dynamic/questao3.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2);

}else if(qstB.checked){

let resposta = {
    qst1 : $("#qst1").val(),
    qst2 : $("#qstB").val()
}
$('#conteudo').load('../view/dynamic/questao3.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2);

}else if(qstC.checked){

let resposta = {
    qst1 : $("#qst1").val(),
    qst2 : $("#qstC").val()
}
$('#conteudo').load('../view/dynamic/questao3.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2);

}else if(qstD.checked){

let resposta = {
    qst1 : $("#qst1").val(),
    qst2 : $("#qstD").val()
}
$('#conteudo').load('../view/dynamic/questao3.php?qst1='+resposta.qst1+'&qst2='+resposta.qst2);

}

});


// Botão Voltar
$('#btnbQst2').on('click', function(){
    window.location.href="../view/home.php";
});
</script>
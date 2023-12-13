<?php

include "../../../../controller/toolsAuth.php";

$var = $_SESSION['usuario_logado'];

?>

<h1 class="display-3">
  <center>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <p class="lead">Procedimentos Realizados:</p>
      </div>
    </div>
  </center>
</h1>


<!--Texto Agrupado -->

<div style="margin-top: 10px " class="list-group">
  <button type="button" class="list-group-item">Verificado problema relacionada a parte física.</button>
  <button type="button" class="list-group-item">Queda de energia durante a impressão".</button>
  <button type="button" class="list-group-item">Verificado papel preso na impressora após queda de energia.</button>
  <button type="button" class="list-group-item">Ligado impressora novamente.</button>
  <button type="button" class="list-group-item">Problema não solucionado.</button>
</div>
<center>

  <div style="margin-top: 10px" class="form-group">
    <label for="comment">
      <h6>
        Escreva no campo abaixo todas as observações, informando se houve danos físicos, derramamento líquido, ou procedimentos não
        realizados.
        <span id="redmineOpen" class="badge badge-danger"></span>
      </h6>
    </label>
    <textarea class="form-control" rows="5" id="comment">
    Procedimentos Realizados (Protocolo 042):
    - Verificado problema relacionada a parte física;
    - Queda de energia durante a impressão;
    - Verificado papel preso na impressora após queda de energia;
    - Ligado impressora novamente;
    - Problema não solucionado;
    </textarea>
    <textarea class="form-control" rows="5" id="txtProtocolo"  name="textarea" hidden="true">042</textarea>	
		<textarea class="form-control" rows="5" id="txtSessao"  name="textarea" hidden="true">
		<?php echo $var ?>;
		</textarea>	
  </div>

</center>


    <center>
      <div style="margin-top: 10px">
        <button id="abrirTarefa" class="sau-btn" data-toggle="confirmation" data-popout="true"> Abrir Tarefa</button>
        <button id="voltar" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Voltar</button>
        <button id="sair" class="sau-btn-secondary" data-toggle="confirmation" data-popout="true"> Sair </button>
      </div>
    </center>

    <div style="margin-top: 10px">
      <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Protocolo 042
    </button>
  </div>

  <script>
  
  $('#abrirTarefa').on('click', function(){
 
   let procedimentos = {
   txtSessao : $("#txtSessao").val(),
   txtProtocolo : $("#txtProtocolo").val()
   }

   $.post('../view/scripts/redmine_abrir_tarefa.php',procedimentos,function(retorno){

   $("#redmineOpen").html(retorno);

   });

   });

   $('#voltar').on('click', function(){

   $('#conteudo').load('./procedimentos/impressora/impressora_fisica/energia.php');

   });

   $('#sair').on('click', function(){

   window.location.reload();

   });

 </script>




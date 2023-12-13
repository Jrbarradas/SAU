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

<div style="margin-top: 30px " class="list-group">
  <button type="button" class="list-group-item">Verificado encaixe do cabo no Modem ou na entrada de rede do computador.</button>
  <button type="button" class="list-group-item">Feito reinicialização do modem (Ligar e desligar após 15 segundos).</button>
  <button type="button" class="list-group-item">Verificado Leds no Modem acesos normalmente.</button>

  <button type="button" class="list-group-item">Identificada rede no sistema não está como conectada.</button>
</div>
<center>

  <div style="margin-top: 20px" class="form-group">
    <label for="comment">
      <h6>
        Escreva no campo abaixo todas as observações, informando se houve danos físicos, derramamento líquido, ou procedimentos não
        realizados.
      </h6>
      <span id="redmineOpen" class="badge badge-danger"></span>
    </label>
    <textarea class="form-control" rows="5" id="comment">
      Procedimentos Realizados (Protocolo 012):
      - Verificado encaixe do cabo no Modem ou na entrada de rede do computador;
      - Verificado cabo conectado corretamente;
      - Feito reinicialização do modem (Ligar e desligar após 15 segundos);
      - Verificado modem ou cabo não apresenta LED;      
      </textarea>
    </div>
    <textarea class="form-control" rows="5" id="txtProtocolo"  name="textarea" hidden="true">012</textarea>	
    <textarea class="form-control" rows="5" id="txtSessao"  name="textarea" hidden="true">
    <?php echo $var ?>;
    </textarea>	

</center>

    <center>
      <div style="margin-top: 10px">
        <button id="abrirTarefa" class="sau-btn" data-toggle="confirmation" data-popout="true"> Abrir Tarefa</button>
        <button id="voltar" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Voltar</button>
        <button id="sair" class="sau-btn-secondary" data-toggle="confirmation" data-popout="true"> Sair </button>
      </div>
    </center>


    <button style="margin-top: 10px; margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
    title="Tooltip on top">
    Protocolo 012
  </button>


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

      $('#conteudo').load('./procedimentos/rede/rede_cabo/procedimento_2_cabo.php');

      });

      $('#sair').on('click', function(){

      window.location.reload();

      });
  </script>


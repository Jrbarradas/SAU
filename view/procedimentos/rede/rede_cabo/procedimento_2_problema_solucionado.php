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
    <button type="button" class="list-group-item">Verificado encaixe do cabo no Moden ou na entrada de rede do computador.</button>
    <button type="button" class="list-group-item">Feito reinicialização do modem (Ligar e desligar após 15 segundos).</button>
    <button type="button" class="list-group-item">Verificado Leds no Modem acesos normalmente.</button>
    <button type="button" class="list-group-item">Identificada rede no sistema está como conectada.</button>
    <button type="button" class="list-group-item">Feito Procedimento de limpeza de cache no Histórico.</button>
    <button type="button" class="list-group-item">Problema Solucionado após procedimentos.</button>
  </div>


  <center>
    <div style="margin-top: 10px">
       <button id="voltar" class="sau-btn" data-toggle="btnNao" data-popout="true">Voltar</button>
        <button id="sair" class="sau-btn-secondary" data-toggle="confirmation" data-popout="true"> Sair </button>
    </div>
  </center>

  <div style="margin-top: 20px">
    <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Protocolo 011
    </button>
  </div>

  <div style="margin-top: 50px">

  </div>
  <script>
    $('#voltar').on('click', function(){

    $('#conteudo').load('./procedimentos/rede/rede_cabo/resposta_sim_procedimento2.php');

    });

    $('#sair').on('click', function(){

    window.location.reload();

    });
  </script>

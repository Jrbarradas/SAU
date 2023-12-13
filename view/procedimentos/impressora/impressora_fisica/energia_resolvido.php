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
    <button type="button" class="list-group-item">Problema solucionado.</button>
  </div>



  <center>
    <div style="margin-top: 10px">
    <button id="sair" class="sau-btn" data-toggle="btnNao" data-popout="true">Sair</button>
    <button id="voltar" class="sau-btn-secondary" data-toggle="btnVoltar" data-popout="true">Voltar</button>
    </div>
  </center>

  <div style="margin-top: 10px">
    <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Protocolo 041
    </button>
  </div>

  <script>
    $("#sair").click(function(){
        window.location.reload();
    });
    $("#voltar").click(function(){
      $("#conteudo").load("./procedimentos/impressora/impressora_fisica/energia.php");
    });
  </script>


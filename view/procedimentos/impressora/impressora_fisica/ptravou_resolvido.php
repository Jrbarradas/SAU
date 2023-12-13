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
    <button type="button" class="list-group-item">Verificado papel "travou" no meio da impressão".</button>
    <button type="button" class="list-group-item">Feito procedimento para retirar papel da impressora.</button>
    <button type="button" class="list-group-item">Problema Solucionado.</button>
  </div>



  <center>
    <div style="margin-top: 10px">
           <button id="sim" class="sau-btn" data-toggle="confirmation" data-popout="true">Sair</button>
           <button id="voltar" class="sau-btn-secondary" data-toggle="btnVoltar" data-popout="true">Voltar</button>
    </div>
  </center>

  <div style="margin-top: 10px">
    <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Protocolo 039
    </button>
  </div>

  <script>
    $("#sair").click(function(){
      window.location.reload();
    });
    $("#voltar").click(function(){
      $("#conteudo").load("./procedimentos/impressora/impressora_fisica/papel_travou.php");
    });
  </script>

 
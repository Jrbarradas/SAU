
  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Procedimentos Realizados:</p>
        </div>
      </div>
    </center>
  </h1>

  <div style="margin-top: 10px " class="list-group">
    <button type="button" class="list-group-item">Verificado Lentidão em Geral.</button>
    <button type="button" class="list-group-item">Feito procedimento de "Limpeza de Arquivos temporários".</button>
    <button type="button" class="list-group-item">Problema Solucionado.</button>
  </div>


  <center>
    <div style="margin-top: 10px">
      <button id="sair" class="sau-btn" data-toggle="btnSair" data-popout="true">Confirmar</button>
      <button id="voltar" class="sau-btn-secondary" data-toggle="btnVoltar" data-popout="true">Voltar</button>
    </div>
  </center>

  <div style="margin-top: 10px">
    <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Protocolo 026
    </button>
  </div>

  <script>

  $("#sair").click(function(){
    window.location.reload();
  });
  
  $("#voltar").click(function(){
    $("#conteudo").load("./procedimentos/lentidao/lentidao_geral/pro_3_slow.php");
  });

  </script>

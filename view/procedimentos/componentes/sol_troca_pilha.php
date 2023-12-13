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
  <button type="button" class="list-group-item">Problema sanou após a troca da pilha, ou carregador.</button>
</div>

    <center>
      <div style="margin-top: 10px">
      <button id="voltar" class="sau-btn" data-toggle="btnNao" data-popout="true">Voltar</button>
        <button id="sair" class="sau-btn-secondary" data-toggle="confirmation" data-popout="true"> Sair </button>
      </div>
    </center>


    <div style="margin-top: 10px">
      <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Protocolo 017
    </button>
  </div>


  <script>
    $('#voltar').on('click', function(){

    $('#conteudo').load('./procedimentos/componentes/componentes_inicial.php');

    });

    $('#sair').on('click', function(){

    window.location.reload();

    });
  </script>


</body>

</html>
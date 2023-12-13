 <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Power</h1>
          <p class="lead">Procedimentos Realizados:</p>
        </div>
      </div>
    </center>
  </h1>


  <!--Texto Agrupado -->

  <div style="margin-top: 100px " class="list-group">
    <button type="button" class="list-group-item">Verificado Led e Beep.</button>
    <button type="button" class="list-group-item">Testado computador em outra tomada.</button>
    <button type="button" class="list-group-item">Efetuado a troca do cabo energia ou trocado carregado.</button>
    <button type="button" class="list-group-item">Computador permanece desligado após procedimentos.</button>
    <button type="button" class="list-group-item">Efetuado procedimento de drenagem de energia.</button>
    <button type="button" class="list-group-item">Problema solucionado.</button>
  </div>


  <center>
    <div style="margin-top: 10px">
      <button id="sair" class="btn btn-info" data-toggle="confirmation" data-popout="true"> Sair </button>
      <button id="voltar" class="btn btn-info" data-toggle="btnNao" data-popout="true">Voltar</button>
      
    </div>
  </center>


  <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
    title="Tooltip on top">
    Procotolo 003
  </button>


  <script>
  
  $('#sair').on('click', function(){

      window.location.reload();

  });

  $('#voltar').on('click', function(){

   $('#conteudo').load('./procedimentos/naooutrocarregador.php');

  });
  
  </script>


<h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid3">
        <div class="container">
          <h1 class="display-4">No Power</h1>
          <p class="lead">O “No Power” ocorre quando a máquina não liga e não apresenta sinais de energia, será necessário
            efetuar os seguintes diagnósticos:</p>
        </div>
      </div>
    </center>
  </h1>


  <!--Texto Agrupado -->

  <div style="margin-top: 80px" class="list-group">
    <button type="button" class="list-group-item">Verifique se o computador apresenta algum tipo de BEEP ou LED.</button>
    <button type="button" class="list-group-item">Ligue o computador em outra tomada.</button>
    <button type="button" class="list-group-item">Troque cabo (Desktop) ou carregador (Notebook) e verifique se o problema
      persiste.
    </button>
  </div>

  <center>
    <div style="margin-top: 90px">
      <h6>Computador ligou com outro carregador ou cabo?</h6>
      <button id="sim" class="btn btn-info" data-toggle="btnSim" data-popout="true">Sim</button>
      <button id="nao" class="btn btn-info" data-toggle="btnNao" data-popout="true">Não</button>
      <button id="voltar" class="btn btn-info" data-toggle="btnNao" data-popout="true">Voltar</button>
    </div>
  </center>


    

  <script>
  
  $('#sim').on('click', function(){

      $('#conteudo').load('./procedimentos/simoutrocarregador.php');

  });

  $('#nao').on('click', function(){

    $('#conteudo').load('./procedimentos/naooutrocarregador.php');

  });

  $('#voltar').on('click', function(){

   window.location.reload();

  });
  
  </script>

<h1 class="display-3">
  <center>
    <div class="jumbotron jumbotron-fluid2">
      <div class="container">
        <h1 class="display-4">No Power</h1>
      </div>
    </div>
  </center>
</h1>

<!--Texto Agrupado -->

<div style="margin-top: 50px" class="list-group">
  <button type="button" class="list-group-item">Verifique a integridade do carregador nas partes mostradas na imagem.</button>
  <button type="button" class="list-group-item">Caso o problema seja no CABO, verifique se há algum dano nessas áreas mostradas
  abaixo.</button>
</div>

<center>
  <div style="margin-top: 0px">

    <img src="../view/Fotos/No power/caboEnergia.jpg" class="img-fluid" alt="Responsive image">

    <img src="../view/Fotos/No power/carregador.jpg" class="img-fluid" alt="Responsive image">
  </div>
</center>


<center>
  <div style="margin-top: 40px">
    <h6>O Cabo, ou carregador, possui algum dano Físico?</h6>
    <button id="sim" class="btn btn-info" data-toggle="btnSim" data-popout="true">Sim</button>
      <button id="nao" class="btn btn-info" data-toggle="btnNao" data-popout="true">Não</button>
      <button id="voltar" class="btn btn-info" data-toggle="btnNao" data-popout="true">Voltar</button>
  </div>
</center>


<script>


$('#sim').on('click', function(){

$('#conteudo').load('./procedimentos/carregadorcomdefeito.php');

});

$('#nao').on('click', function(){

$('#conteudo').load('./procedimentos/carregadorsemdefeito.php');

});

$('#voltar').on('click', function(){

  $('#conteudo').load('./procedimentos/nopowerinicial.php');

});


</script>


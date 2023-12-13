
  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Se a porta de entrada do CABO apresenta led, porém NÃO acessa a internet, siga com os procedimentos
            abaixo</p>
        </div>
      </div>
    </center>
  </h1>

  <!--Texto Agrupado -->

  <div style="margin-top: 20px" class="list-group">
    <button type="button" class="list-group-item">Verifique se a sua maquina esta conectada a rede pelo seu sistema, para
      realizar este procedimento, siga este passo a passo.</button>
    <button type="button" class="list-group-item">1. Clique no ícone de REDE.</button>
    <button type="button" class="list-group-item">2. Idenfique o nome da sua rede e certifique-se que está como "Conectada".
      Vide o exemplo abaixo: </button>

  </div>
  </center>

  <center>
    <div style="margin-top: 30px">
      <img src=".\Fotos\Rede/RedeGif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>

  <center>
    <div style="margin-top: 20px">
        <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Sim</button>
        <button id="nao" class="sau-btn-dark" data-toggle="btnSim" data-popout="true">Não</button>
				<button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
    </div>
  </center>


<script>

    $('#sim').on('click', function(){
      $("#conteudo").load("./procedimentos/rede/rede_cabo/resposta_sim_procedimento2.php");
    });

    $('#nao').on('click',function(){
      $("#conteudo").load("./procedimentos/rede/rede_cabo/resposta_nao_procedimento2.php");
    })

    $('#voltar').on('click', function(){

    $("#conteudo").load("./procedimentos/rede/redeinicial.php");

    });
  
</script>

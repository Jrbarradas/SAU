

  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Se o MODEM apresenta led, porém NÃO acessa a internet, siga com os procedimentos abaixo</p>
        </div>
      </div>
    </center>
  </h1>

  <!--Texto Agrupado -->

  <div style="margin-top: 20px" class="list-group">
    <button type="button" class="list-group-item">Verifique se a sua maquina esta conectada a rede pelo seu sistema, para
      realizar este procedimento, siga este passo a passo.</button>
    <button type="button" class="list-group-item">1. Clique no ícone de REDE.</button>
    <button type="button" class="list-group-item">2. Idenfique o nome da sua rede e certifique-se que está como "Conectada".</button>
    <button type="button" class="list-group-item">3. Caso o WIFI esteja desconectado, conecte selecionando a sua rede e senha,
      como no exemplo abaixo.</button>
  </div>
  </center>

  <center>
    <div style="margin-top: 30px">
      <img src="./Fotos/Rede/wifiGif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>



  <center>
    <div style="margin-top: 20px">
      <h6>Sistema mostra a rede como conectada?</h6>
      <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Sim</button>
      <button id="nao" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Não</button>
      <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
    </div>
  </center>
  <div style="margin-top: 50px">
  </div>

  <script>

    $('#sim').on('click', function(){

    $('#conteudo').load('./procedimentos/rede/rede_wifi/resposta_sim_procedimento1.php');

    });

    $('#nao').on('click', function(){

    $('#conteudo').load('./procedimentos/rede/rede_wifi/resposta_nao_procedimento1.php');

    });

    $('#voltar').on('click', function(){

    $('#conteudo').load('./procedimentos/rede/redeinicial.php');

});
  </script>


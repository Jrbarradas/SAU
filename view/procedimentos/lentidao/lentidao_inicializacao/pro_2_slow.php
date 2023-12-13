<h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Caso o sisema esteja apresentando lentidão na inicialização, realize os seguintes procedimentos</p>
        </div>
      </div>
    </center>
  </h1>

  <!--Texto Agrupado -->

  <div style="margin-top: 20px" class="list-group">
    <button type="button" class="list-group-item">Se possível, ative a inicialização Rápida, siga com os procedimentos.</button>
    <button type="button" class="list-group-item">1. Digite "Painel de controle" (sem as aspas) na caixa de busca do Windows
      10.</button>
    <button type="button" class="list-group-item">2. Logo após, procure "Opções de Energia" no Buscador do painel de controle.</button>
    <button type="button" class="list-group-item">3. Em "Opções de Energia", clique em "Escolher a função dos botões e energia".</button>
    <button type="button" class="list-group-item">4. Clique em "Alterar configurações não disponíveis no momento".</button>
    <button type="button" class="list-group-item">5. Marque a opção "Ligar inicialização rápida" e clique em "Salvar alterações".</button>
  </div>
  </center>

  <center>
    <div style="margin-top: 20px">
      <img src="..\Fotos\Videos e gifs Sistema/InicializaçãoGif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <div style="margin-top: 10px">
    <center>
      <h6>Selecione uma das opções</h6>
    </center>
  </div>


  <center>
    <div style="margin-left: 20px">
      <div style="margin-top:5px">
        <div style="margin-left: 20px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnResolvido" value="option1" checked>
          <label class="form-check-label" for="exampleRadios1">
            Após os procedimentos problema foi SOLUCIONADO
          </label>
        </div>

        <div style="margin-left: -48px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnPersiste" value="option2">
          <label class="form-check-label" for="exampleRadios2">
            Após os procedimentos problema PERSISTE
          </label>
        </div>

        <div style="margin-left: -80px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnNaoFeito" value="option3">
          <label class="form-check-label" for="exampleRadios3">
            Não possível realizar os procedimentos
          </label>
        </div>
      </div>
  </center>
  <div style="margin-top: 50px">
  </div>

  <center>
    <div style="margin-top: -40px">
          <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Confirmar</button>
          <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
    </div>

    <div style="margin-top: 30px">
    </div>

  </center>

  <div style="margin-top: 50px"></div>
  <script>
    $("#sim").click(function(){
      if(btnResolvido.checked){
        $("#conteudo").load("./procedimentos/lentidao/lentidao_inicializacao/pro_2_solucionado.php");
      }else if(btnPersiste.checked){
        $("#conteudo").load("./procedimentos/lentidao/lentidao_inicializacao/pro_2_persiste.php");
      }else if(btnNaoFeito.checked){
        $("#conteudo").load("./procedimentos/lentidao/lentidao_inicializacao/pro_2_impossivel.php");
      }
    });

    $("#voltar").click(function(){
      $("#conteudo").load("./procedimentos/lentidao/lentidao_inicial.php");
    });
  </script>


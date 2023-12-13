
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p> O Problema de Lentidão, pode ser ocasionado por varios fatores, selecione
      uma das opções abaixo</p>
        </div>
      </div>
    </center>



  <!--Texto Agrupado -->

  <div style="margin-top: 80px" class="list-group">

    <center>
      <div style="margin-top: -20px">
        <img src="..\Fotos\carregando.jpg" class="img-fluid" alt="Responsive image">
      </div>
    </center>
    <center>
      <div style="margin-top: 10px">
        <h6>Selecione uma das opções abaixo</h6>
      </div>

      <!--Botão rádio -->

      <center>
        <div style="margin-top:10px">
          <div style="margin-left: 20px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnNavegador" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Lentidão apenas no navegador
            </label>
          </div>

          <div style="margin-left: 55px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnInicializacao" value="option2">
            <label class="form-check-label" for="exampleRadios2">
              Lentidão na inicialização do Sistema
            </label>
          </div>

          <div style="margin-left: -70px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnGeral" value="option3">
            <label class="form-check-label" for="exampleRadios3">
              Lentidão em geral
            </label>
          </div>

          <div style="margin-top:10px">
          <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Confirmar</button>
          <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
          </div>
      </center>

      <div style="margin-top: 30px"></div>
      <script>
          $("#sim").click(function(){
              if(btnNavegador.checked){
                $("#conteudo").load("./procedimentos/lentidao/lentidao_navegador/pro_1_slow.php");
              }else if(btnInicializacao.checked){
                $("#conteudo").load("./procedimentos/lentidao/lentidao_inicializacao/pro_2_slow.php");
              }else if(btnGeral.checked){
                $("#conteudo").load("./procedimentos/lentidao/lentidao_geral/pro_3_slow.php");
              }
          });

          $("#voltar").click(function(){
            window.location.reload();
          })
      </script>




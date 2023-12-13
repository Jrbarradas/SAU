
  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Se o problema não foi resolvido com a mudança de horario, talvez o seu JAVA, esteja em uma versão
            não compatível.</p>
        </div>
      </div>
    </center>
  </h1>

  <!--Texto Agrupado -->

  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item">Para saber a versão do seu Java, realize os seguintes procedimentos:</button>
    <button type="button" class="list-group-item">1. Clique no ícone iniciar, digite "Meu computador" e o selecione.</button>
    <button type="button" class="list-group-item">2. Clique em "Disco Local C".</button>
    <button type="button" class="list-group-item">3. Arquivos e programas, Java.</button>
    <button type="button" class="list-group-item">4. Verifique a versão do seu JAVA, a versão deve ser esta: jre1.8.0_161.</button>
  </div>
  </center>

  <center>
    <div style="margin-top: 30px">
      <img src="..\Fotos\Sins/javaGif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>



  <center>
    <div style="margin-top: 10px">
      <h6>Sua versão JAVA, esta correta?</h6>
    </div>


    <center>
      <div style="margin-top: 10px">
             <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Sim</button>
             <button id="nao" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Não</button>
             <button id="voltar" class="sau-btn-secondary" data-toggle="btnVoltar" data-popout="true">Voltar</button>
      </div>
    </center>



    <script>

      $("#sim").click(function(){
        $("#conteudo").load("./procedimentos/sins/sins_horario/pro_1_opsim.php");
      });

      $("#nao").click(function(){
        $("#conteudo").load("./procedimentos/sins/sins_horario/pro_1_opnao.php");
      })

      $("#voltar").click(function(){
        $("#conteudo").load("./procedimentos/sins/sins_horario/pro_1_sins.php");
      });

    </script>

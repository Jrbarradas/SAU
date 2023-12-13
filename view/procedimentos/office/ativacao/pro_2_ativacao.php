  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Verifique se o seu Office, está ativado, para seguir com esse procedimento, relalize o passo a
            passo:</p>
        </div>
      </div>
    </center>
  </h1>


  <!--Texto Agrupado -->

  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item"> 1. Abra sua ferramenta Office.</button>

    <button type="button" class="list-group-item"> 2. Selecione a Tabela, ou arquivo de texto, como no exemplo abaixo.</button>

    <button type="button" class="list-group-item"> 3. Clique em Arquivos, Conta, e verifique se seu Office está ativado.</button>
  </div>


  <center>
    <div style="margin-top: 10px">
      <img src="..\Fotos\Videos e gifs Sistema/OfficeGif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top: 10px">
      <h6>Seu Office está ativado?</h6>
    </div>

    <center>
      <div style="margin-top: 10px">
      <button id="sim" class="sau-btn" data-toggle="confirmation" data-popout="true">Sim</button>
      <button id="nao" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Não</button>
      <button id="voltar" class="sau-btn-secondary" data-toggle="btnVoltar" data-popout="true">Voltar</button>
      </div>
    </center>


    <script>

      $("#sim").click(function(){
        $("#conteudo").load("./procedimentos/office/ativacao/pro_2_sim.php");
      });

      $("#nao").click(function(){
        $("#conteudo").load("./procedimentos/office/ativacao/pro_2_nao.php");
      });

      $("#voltar").click(function(){
        $("#conteudo").load("./procedimentos/office/office_inicial.php");
      });
    </script>

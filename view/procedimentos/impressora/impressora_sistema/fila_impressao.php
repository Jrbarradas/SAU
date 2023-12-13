  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Se a fila de impressão parou ou não responde, realize os seguintes procedimentos no sistema:</p>
        </div>
      </div>
    </center>
  </h1>

  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item"> 1. Abra o "Iniciar" e digite "Painel de Controle", na barra de pesquisa.</button>

    <button type="button" class="list-group-item"> 2. Abra o Painel de controle e pesquise no canto direito superior por
      "Impressoras".</button>
    <button type="button" class="list-group-item">3. Selecione a opção "Exibir impressora e dispositivos".</button>
    <button type="button" class="list-group-item">4. Verifique qual a sua impressora, e clique sobre ela com o botão DIREITO
      do mouse.</button>
    <button type="button" class="list-group-item">5. Logo após clique com botão direito em todos os arquivos na "Fila de
      impressão", e vá em "Parar".</button>
  </div>


  <center>
    <div style="margin-top: 10px">
      <img src="..\Fotos\Videos e gifs Sistema/ImpressoraGif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top: 10px">
      <h6>Após este procedimento, o problema foi solucionado?</h6>
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
        $("#conteudo").load("./procedimentos/impressora/impressora_sistema/fila_resolvido.php");
      });
      
      $("#nao").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_sistema/fila_nao_resolvido.php");
      });

      $("#voltar").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_sistema/tela_sistema.php");
      });

    </script>

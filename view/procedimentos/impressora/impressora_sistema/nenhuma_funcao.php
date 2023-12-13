  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Se a impressora não esta efetuando nenhuma função no SISTEMA, realize os seguintes procedimentos</p>
        </div>
      </div>
    </center>
  </h1>


  <div style="margin-top: 0px" class="list-group">
    <button type="button" class="list-group-item"> Verifique se sua impressora esta conectada no sistema corretamente, siga
      o passo a passo.</button>
    <button type="button" class="list-group-item"> 1. Abra o "Iniciar" e digite "Painel de Controle", na barra de pesquisa.</button>
    <button type="button" class="list-group-item">2. Abra o Painel de controle e pesquise no canto direito superior por "Impressoras".</button>
    <button type="button" class="list-group-item">3. Selecione a opção "Exibir impressora e dispositivos".</button>
    <button type="button" class="list-group-item">4. Verifique se aparece o modelo e o nome da sua impressora no painel.</button>
  </div>


  <center>
    <div style="margin-top: 0px">
      <img src="..\Fotos\Videos e gifs Sistema/Impressora2Gif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top: 0px">
      <h6>Foi encontrado a sua Impressora?</h6>
    </div>

    <center>
      <div style="margin-top: 0px">
               <button id="sim" class="sau-btn" data-toggle="confirmation" data-popout="true">Sim </button>
               <button id="nao" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Não</button>
         		   <button id="voltar" class="sau-btn-secondary" data-toggle="btnVoltar" data-popout="true">Voltar</button>
      </div>
    </center>

    <script>

        $("#sim").click(function(){
          $("#conteudo").load("./procedimentos/impressora/impressora_sistema/impressora_encontrada.php");
        });

        $("#nao").click(function(){
          $("#conteudo").load("./procedimentos/impressora/impressora_sistema/impressora_n_encontrada.php");
        });
        
        $("#voltar").click(function(){
          $("#conteudo").load("./procedimentos/impressora/impressora_sistema/tela_sistema.php");
        });
    </script>

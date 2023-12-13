  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Caso esteja dando problema em uma ou todas as ferramentas do seu Office, verifique se o arquivo
            selecionado, esta no formato correto.</p>
        </div>
      </div>
    </center>
  </h1>

  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item"> - Para saber se o Arquivo tem uma Exetensão Correta para a ferramenta
      do OFFICE, leia e siga com os procedimentos:</button>

    <button type="button" class="list-group-item"> - Para abrir um arquivo de TEXTO (com WORD), as extensões corretas são:
      "TXT ", "DOC". </button>

    <button type="button" class="list-group-item"> - Para abrir um arquivo para PLANILHAS (com EXCEL), as extensões corretas
      são: "XLSx "</button>

    <button type="button" class="list-group-item"> - Para abrir um arquivo de SLIDES (com PowerPoint), as extensões corretas
      são: "PPT "</button>
  </div>

  <center>
    <div style="margin-top: 10px">
      <h6>Para idenficar a extensão do arquivo, siga com o exemplo abaixo:</h6>
    </div>
  </center>


  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item"> 1. Vá no arquivo desejado.</button>

    <button type="button" class="list-group-item"> 2. Clique com botão DIREITO do mouse.</button>

    <button type="button" class="list-group-item"> 3. Vá em opção "propriedades".</button>

    <button type="button" class="list-group-item"> 4. Verifique a extensão do arquivo.</button>
  </div>


  <center>
    <div style="margin-top: 10px">
      <img src="..\Fotos\Videos e gifs Sistema/ExtensãoGif.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top: 10px">
      <h6>A extensão do arquivo esta correta para ser aberta na ferramenta do OFFICE?</h6>
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
          $("#conteudo").load("./procedimentos/office/ferramentas/pro_1_sim.php");
      });

      $("#nao").click(function(){
        $("#conteudo").load("./procedimentos/office/ferramentas/pro_1_nao.php");
      });

      $("#voltar").click(function(){
        $("#conteudo").load("./procedimentos/office/office_inicial.php");
      });
    

    </script>

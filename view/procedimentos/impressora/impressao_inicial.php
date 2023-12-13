 <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Impressora</h1>
        </div>
      </div>
    </center>
  </h1>


  <!--Texto Agrupado -->

  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item">Para diagnosticar os problemas relacionado a impressora:</button>
  </div>

  <center>
    <div style="margin-top: 10px">
      <img src="../Fotos/impressora.jpg" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top: 10px">
      <h6>Selecione uma das opções abaixo</h6>
    </div>

    <center>
      <div style="margin-left: 120px">
        <div style="margin-top:10px">
          <div style="margin-left: -110px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnFisico" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Impressora com problema na parte Física
            </label>
          </div>

          <div style="margin-left: -135px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnSistema" value="option2">
            <label class="form-check-label" for="exampleRadios2">
              Impressora com problema no Sistema
            </label>
          </div>

          <div style="margin-left: -300px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnOutros" value="option3">
            <label class="form-check-label" for="exampleRadios3">
              Outros
            </label>
          </div>
    </center>

    <center>

      <div style="margin-left:  10px" , class="form-check">
        <div style="margin-top:10x">
          <button id="confirmar" class="sau-btn" data-toggle="confirmation" data-popout="true">Confirmar</button>
          <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
        </div>
      </div>
    </center>


    <script>

     $("#confirmar").click(function(){
       if(btnFisico.checked){
         $("#conteudo").load("./procedimentos/impressora/impressora_fisica/tela_fisico.php");
       }else if(btnSistema.checked){
         $("#conteudo").load("./procedimentos/impressora/impressora_sistema/tela_sistema.php");
       }else if(btnOutros.checked){
         $("#conteudo").load("./procedimentos/impressora/nao_identificado.php");
       }
     });

     $("#voltar").click(function(){
      window.location.reload();
     });
     
    </script>

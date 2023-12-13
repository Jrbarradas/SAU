  <div style="margin-top: 0px" class="list-group">
    <button type="button" class="list-group-item">Caso seu sistema esteja apresetando problema nas ferramentas do Office
      (Word, PowerPoint, Exel,), Identifique o seu problema.</button>
  </div>

  <center>
    <div style="margin-top: 0px">
      <img src="..\Fotos\office2.png" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top: 0px">
      <h6>Selecione uma das opções abaixo</h6>
    </div>

    <!--Botão rádio -->

    <center>
      <div style="margin-top:0px">
        <div style="margin-left: 20px"  class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnFerramentas" value="option1" checked>
          <label class="form-check-label" for="exampleRadios1">
            Todas ou algumas ferramentas do Office, não estão abrindo
          </label>
        </div>

        <div style="margin-left: -75px"  class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnAtivacao" value="option2">
          <label class="form-check-label" for="exampleRadios2">
            Office informa uma mensagem que ira expirar
          </label>
        </div>

        <div style="margin-left: -250px"  class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnOutros" value="option3">
          <label class="form-check-label" for="exampleRadios3">
            Outros
          </label>
        </div>
        <div style="margin-top:10px">
        <div style="margin-left: -100px"  class="form-check">
              <button id="confirmar" class="sau-btn" data-toggle="confirmation" data-popout="true">Confirmar</button>
         		  <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
          </div>
          </div>
    </center>


    <script>

        $("#confirmar").click(function(){
            if(btnFerramentas.checked){
              $("#conteudo").load("./procedimentos/office/ferramentas/pro_1_ferramentas.php");
            }else if(btnAtivacao.checked){
              $("#conteudo").load("./procedimentos/office/ativacao/pro_2_ativacao.php");
            }else if(btnOutros.checked){
              $("#conteudo").load("./procedimentos/office/nao_identificado_office.php");
            }
        });

        $("#voltar").click(function(){
          window.location.reload();
        });

    </script>

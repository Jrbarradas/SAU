  <!--Texto Agrupado -->

  <div style="margin-top: 0px" class="list-group">
    <button type="button" class="list-group-item">Para diagnosticar os problemas relacionado a parte física da impressora:</button>
  </div>

  <center>
    <div style="margin-top: 10px">
      <img src="..\Fotos\impressora.jpg" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top: 10px">
      <h6>Selecione uma das opções abaixo</h6>
    </div>

    <!--Botão rádio -->

    <center>
      <div style="margin-left: 120px">
        <div style="margin-top:10px">
          <div style="margin-left: -110px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnPapelEngasgou" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              1. O papel engasgou e travou a impressora
            </label>
          </div>

          <div style="margin-left: -23px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnEnergia" value="option2">
            <label class="form-check-label" for="exampleRadios2">
              2. A energia elétrica acabou no meio de uma impressão
            </label>
          </div>
    </center>

    <center>

      <div style="margin-left:  10px" , class="form-check">
        <div style="margin-top:10px">
           <button id="confirmar" class="sau-btn" data-toggle="confirmation" data-popout="true">Confirmar</button>
           <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
        </div>
      </div>
    </center>



    <script>

      $("#confirmar").click(function(){
          if(btnPapelEngasgou.checked){
            $("#conteudo").load("./procedimentos/impressora/impressora_fisica/papel_travou.php");
          }else if(btnEnergia.checked){
            $("#conteudo").load("./procedimentos/impressora/impressora_fisica/energia.php");
          }
      });

      $("#voltar").click(function(){
          $("#conteudo").load("./procedimentos/impressora/impressao_inicial.php");
      });


    </script>

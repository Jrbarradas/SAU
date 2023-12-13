  <div style="margin-top: 0px" class="list-group">
    <button type="button" class="list-group-item">Se a energia elétrica acabou no meio de uma impressão, realize os seguintes
      procedimentos:</button>
    <button type="button" class="list-group-item">1. Desligue a impressora, mesmo sem energia.</button>
    <button type="button" class="list-group-item">2. Após o retorno da energia, ligue novamente o aparelho e note se ele
      por si só irá soltar o papel.</button>
    <button type="button" class="list-group-item">3. Se o papel não for removido, tente o procedimento indicado para o papel
      engasgado clicando no botão abaixo.</button>

  </div>

  <center>
    <div style="margin-top: 0px">
      <button id="papelEngasgado" class="btn-sau btn btn-default" data-toggle="btnPapel" data-popout="true">Ir para
        papel engasgado</button>
    </div>
  </center>

  <center>
    <div style="margin-top: 0px">
      <img src="..\Fotos\impressora.jpg" class="img-fluid" alt="Responsive image">
    </div>
  </center>
  <center>
    <div style="margin-top:  0px">
      <h6>Após este procedimento, o problema foi solucionado?</h6>
    </div>

    <center>
      <div style="margin-top: 0px">
           <button id="sim" class="sau-btn" data-toggle="confirmation" data-popout="true">Sim</button>
           <button id="nao" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Não</button>
           <button id="voltar" class="sau-btn-secondary" data-toggle="btnVoltar" data-popout="true">Voltar</button>
      </div>
    </center>

    <script>

      $("#sim").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_fisica/energia_resolvido.php");
      });

      $("#nao").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_fisica/energia_n_resolvido.php");
      })

      $("#voltar").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_fisica/tela_fisico.php");
      })
      
      $("#papelEngasgado").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_fisica/papel_travou.php");
      })


    </script>

    
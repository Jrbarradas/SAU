
  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Se o papel engasgou e travou a impressora, siga com os seguintes procedimentos:</p>
        </div>
      </div>
    </center>
  </h1>


  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item"> 1. Abra o compartimento onde o papel é disponibilizado ou, dependendo
      do equipamento, acesse a bandeja de papel. Tente verificar onde o papel travou, desde a entrada da folha até onde o
      papel é impresso. Libere as travas se existirem.</button>

    <button type="button" class="list-group-item"> 2. Tire com cuidado o papel agarrado e possíveis fragmentos que estejam
      impedindo este de correr livremente. Tenha cuidado para não danificar motores ou engrenagens.</button>

    <button type="button" class="list-group-item"> 3. Após retirar todo o material preso, reinicie a impressora com papel
      novo, liso e seco. Evite inserir papeis com dobras ou irregularidades que impeçam o equipamento de efetuar o procedimento
      corretamente.
    </button>
  </div>


  <center>
    <img src="..\Fotos\impressora.jpg" class="img-fluid" alt="Responsive image">
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
          $("#conteudo").load("./procedimentos/impressora/impressora_fisica/ptravou_resolvido.php");
      });

      $("#nao").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_fisica/ptravou_n_resolvido.php");
      })

      $("#voltar").click(function(){
        $("#conteudo").load("./procedimentos/impressora/impressora_fisica/tela_fisico.php");
      })

      </script>
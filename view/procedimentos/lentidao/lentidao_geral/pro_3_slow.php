

  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item">Realize o procedimento de limpeza de Arquivos Temporarios, siga com o passo
      a passo abaixo.</button>
    <button type="button" class="list-group-item">1. Clique no ícone "Windows", digite "Executar" e selecione o mesmo.</button>
    <button type="button" class="list-group-item">2. Logo após, digite "%temp%" na barra de texto e tecle enter.</button>
    <button type="button" class="list-group-item">3. Selecione todas as pastas e clique com botão direito e vá em "excluir".</button>
    <button type="button" class="list-group-item">4. Feche as pastas, e veifique se o problema persiste.</button>
  </div>
  </center>

  <center>
    <div style="margin-top: 10px">
      <img src="..\Fotos\Lentidão/Arquivos Temporarios.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>


  <div style="margin-top: 10px">
    <center>
      <h6>Selecione uma das opções</h6>
    </center>
  </div>


  <center>
    <div style="margin-left: 20px">
      <div style="margin-top:5px">
        <div style="margin-left: 20px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnResolvido" value="option1" checked>
          <label class="form-check-label" for="exampleRadios1">
            Após os procedimentos problema foi SOLUCIONADO
          </label>
        </div>

        <div style="margin-left: -80px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnNaoFeito" value="option2">
          <label class="form-check-label" for="exampleRadios2">
            Não possível realizar os procedimentos
          </label>
        </div>

        <div style="margin-left: -49px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnPersiste" value="option3">
          <label class="form-check-label" for="exampleRadios3">
            Após os procedimentos problema PERSISTE
          </label>
        </div>
      </div>
  </center>
  <center>
    <div style="margin-top: 10px">
      <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Confirmar</button>
      <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
    </div>

    <div style="margin-top: 30px">
    </div>

  </center>
  <script>

    $("#sim").click(function(){
      if(btnResolvido.checked){
        $("#conteudo").load("./procedimentos/lentidao/lentidao_geral/pro_3_solucionado.php");
      }else if(btnNaoFeito.checked){
        $("#conteudo").load('./procedimentos/lentidao/lentidao_geral/pro_3_impossivel.php');
      }else if(btnPersiste.checked){
        $("#conteudo").load('./procedimentos/lentidao/lentidao_geral/pro_3_persiste.php');
      }
    });

    $("#voltar").click(function(){
      $("#conteudo").load('./procedimentos/lentidao/lentidao_inicial.php');
    });


  </script>

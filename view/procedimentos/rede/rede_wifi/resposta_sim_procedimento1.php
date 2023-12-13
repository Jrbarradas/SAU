
  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Se o sistema apresenta a rede como CONECTADA porém esta sem acesso a internet. Siga com os seguintes
            procedimentos</p>
        </div>
      </div>
    </center>
  </h1>
  <!--Texto Agrupado -->

  <div style="margin-top: 20px" class="list-group">
    <button type="button" class="list-group-item">Realize o procedimento de limpeza do Histórico do navegar, siga com o passo
      a passo.</button>
    <button type="button" class="list-group-item">1. Abra o seu navegador (Google Chrome).</button>
    <button type="button" class="list-group-item">2. Vá para a Barra de "Configurações do Chrome", selecione a opção "Histórico".</button>
    <button type="button" class="list-group-item">3. Selecione a opção "Limpar Dados de Navegação".</button>
    <button type="button" class="list-group-item">4. Em intervalo de tempo, selecione a opção "Todo o Período" e "Todas as
      opções".</button>
    <button type="button" class="list-group-item">Siga com exemplo abaixo.</button>
  </div>
  </div>
  </center>

  <center>
    <div style="margin-top: 30px">
      <img src="./Fotos/Rede/Limpar Cache.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>


  <center>
    <div style="margin-top: 20px">
      <h6>Selecione uma das opções abaixo</h6>
    </div>

    <!--Botão rádio -->

    <center>
      <div style="margin-top:30px">
        <div style="margin-left: 20px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnSitesEspecificos" value="option1" checked>
          <label class="form-check-label" for="exampleRadios1">
            Problema ocorre apenas com sites específicos
          </label>
        </div>

        <div style="margin-left: -56px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnTodosOsSites" value="option2">
          <label class="form-check-label" for="exampleRadios2">
            Problema ocorre em todos os Sites
          </label>
        </div>

        <div style="margin-left: 63px" , class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="btnProblemaResolvido" value="option3">
          <label class="form-check-label" for="exampleRadios3">
            Após os procedimentos o problema foi solucionado
          </label>
        </div>

        <div style="margin-top:20px">
        <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Confirmar</button>
				<button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
        </div>
    </center>




    <div style="margin-top: 50px">
    </div>

    <script>

      $('#sim').on('click', function(){

      if(btnSitesEspecificos.checked){
        $("#conteudo").load("./procedimentos/rede/rede_wifi/procedimento_1_sites_especificos.php");
      }else if(btnTodosOsSites.checked){
        $("#conteudo").load("./procedimentos/rede/rede_wifi/procedimento_1_todos_os_sites.php");
      }else if(btnProblemaResolvido.checked){
        $("#conteudo").load("./procedimentos/rede/rede_wifi/procedimento_1_problema_solucionado.php");
      }else{
        alert("ERRO : Opção inválida!");
      }

      });

      $('#voltar').on('click', function(){

      $("#conteudo").load("./procedimentos/rede/rede_wifi/procedimento_1_wifi.php");

      });

    </script>


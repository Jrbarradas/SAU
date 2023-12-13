
<h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Caso o problema ocorra apenas no NAVEGADOR efetue os seguintes procedimentos</p>
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
    <button type="button" class="list-group-item">4. Em intervalo de tempo, selecione a opção "Todo o Período", todas as
      opções. Vide o exemplo abaixo.</button>
  </div>
  </center>

  <center>
    <div style="margin-top: 0px">
      <img src="../../../sau/Fotos/Rede/Limpar Cache.gif" class="img-fluid" alt="Responsive image">
    </div>
  </center>



  <center>
    <div style="margin-top: 20px">
      <h6>Após o procedimento o problema foi solucionado?</h6>
      <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Sim</button>
      <button id="nao" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Não</button>
      <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
    </div>
  </center>

  <script>

    $("#sim").click(function(){
      $("#conteudo").load("./procedimentos/lentidao/lentidao_navegador/pro_1_solucionado.php");
    });

    $("#nao").click(function(){
      $("#conteudo").load("./procedimentos/lentidao/lentidao_navegador/pro_1_persiste.php");
    });

    $("#voltar").click(function(){
      $("#conteudo").load("./procedimentos/lentidao/lentidao_inicial.php");
    });

  </script>

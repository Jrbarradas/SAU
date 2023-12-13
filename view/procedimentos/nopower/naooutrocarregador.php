<!--Texto Agrupado -->

  <div class="list-group">
    <button type="button" class="list-group-item">Efetue uma drenagem de energia: retire todos os periféricos da máquina
      e segure o botão POWER (Ligar e Desligar) por 40 segundos.</button>
    <button type="button" class="list-group-item">Verifique se o computador apresenta algum tipo de LED ou BEEP apos este
      procedimento de drenagem de energia, geralmente os Leds se posicionam nos locais como no exemplo abaixo.</button>
    <button type="button" class="list-group-item">Teste em outra tomada.</button>
  </div>

  <center>
    <div style="margin-top: 0px">
      <img src="../view/Fotos/No power/note3.jpg" class="img-fluid" alt="Responsive image">
    </div>
  </center>

  <center>
    <div style="margin-top: 10px">
      <h6>Computador ligou após o procedimento de "Drenagem de Energia"?</h6>
      <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Sim</button>
      <button id="nao" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Não</button>
      <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
    </div>
  </center>

  <script>
  
  $('#sim').on('click', function(){

      $('#conteudo').load('./procedimentos/nopower/drenagemsucesso.php');

  });

  $('#nao').on('click', function(){

    $('#conteudo').load('./procedimentos/nopower/drenagemsemsucesso.php');

  });

  $('#voltar').on('click', function(){

   $('#conteudo').load('./procedimentos/nopower/nopowerinicial.php');

  });
  
  </script>





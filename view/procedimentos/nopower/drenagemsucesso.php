<!--Texto Agrupado -->

  <div  class="list-group">
    <button type="button" class="list-group-item">Verificado Led e Beep.</button>
    <button type="button" class="list-group-item">Testado computador em outra tomada.</button>
    <button type="button" class="list-group-item">Efetuado a troca do cabo energia ou trocado carregado.</button>
    <button type="button" class="list-group-item">Computador permanece desligado após procedimentos.</button>
    <button type="button" class="list-group-item">Efetuado procedimento de drenagem de energia.</button>
    <button type="button" class="list-group-item">Problema solucionado.</button>
  </div>


  <center>
    <div style="margin-top: 0px">
      <button id="sair" class="sau-btn" data-toggle="confirmation" data-popout="true"> Sair </button>
      <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
      
    </div>
  </center>


  <button style="margin-left: 10px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
    title="Tooltip on top">
    Protocolo 003
  </button>


  <script>
  
  $('#sair').on('click', function(){

      window.location.reload();

  });

  $('#voltar').on('click', function(){

   $('#conteudo').load('./procedimentos/nopower/naooutrocarregador.php');

  });
  
  </script>

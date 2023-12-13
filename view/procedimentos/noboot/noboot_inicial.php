  <h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid3">
        <div class="container">
          <p class="lead">O "NO BOOT" ocorre quando a máquina não inicia o sistema operacional, devido a um problema no próprio sistema ou no HD do equipamento...
            Será necessário efetuar os seguintes diagnósticos:</p>
        </div>
      </div>
    </center>
  </h1>


  <!--Texto Agrupado -->

  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item">Verifique se o computador apresenta algum tipo de BEEP ou LED.</button>
    <button type="button" class="list-group-item">Ao ligar, verifique a mensagem que é exibida, na maioria dos casos, duas situações podem acontecer:</button>
    <button type="button" class="list-group-item">1 - Mensagem de No Device Bootable Found ou Hard Disk Not Found (Possivel Problema no HD, exemplo 1).</button>
    <button type="button" class="list-group-item">2 - Mensagem de erro do Windows ou Loading infinito (Exemplo 2).</button>
    </div>

        <div style="margin-top: 10px">  
            <center>
            <img src="..\Fotos\No Boot/NoBootExemplo1.pnj" class="img-fluid" alt="Re  sponsive image">
        </div>
        <div style="margin-top: 10px"> 
           <img src="..\Fotos\No Boot/NoBootExemplo2.pnj" class="img-fluid" alt="Re  sponsive image">
          </center>      
          </div>
      

        <center>
         <div style="margin-top: 10px">
      <h6>Qual das imagens acima mais se assemelha com o seu problema?</h6>
         </div>

    <!--Botão rádio -->

    <center>


   <center>
      <div style="margin-left: 120px">
        <div style="margin-top:10px">
          <div style="margin-left: -110px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnFisico" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Exemplo 1
            </label>
          </div>

          <div style="margin-left: -109px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnSistema" value="option2">
            <label class="form-check-label" for="exampleRadios2">
               Exemplo 2
            </label>
          </div>

          <div style="margin-left: -076px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnOutros" value="option3">
            <label class="form-check-label" for="exampleRadios3">
              Nenhum acima
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
      if(btnFisico.checked){
        $("#conteudo").load("./procedimentos/noboot/ex_1/fisico.php");
      }else if(btnSistema.checked){
        $("#conteudo").load("./procedimentos/noboot/ex_2/sistema.php");
      }else if(btnOutros.checked){
        $("#conteudo").load("./procedimentos/noboot/no_ex/nenhum.php");
      }
    });

    $("#voltar").click(function(){
      window.location.reload();
    })


  </script>


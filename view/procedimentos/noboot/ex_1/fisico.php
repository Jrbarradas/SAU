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



  <div style="margin-top: 10px" class="list-group">
    <button type="button" class="list-group-item">Há algum colaborador? (Técnico no local).</button>
  
      



   <center>
      <div style="margin-left: 120px">
        <div style="margin-top:10px">
          <div style="margin-left: -110px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnSim" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Sim
            </label>
          </div>

          <div style="margin-left: -109px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnNao" value="option2">
            <label class="form-check-label" for="exampleRadios2">
               Não
            </label>
          </div>
    </center>
 
    <center>

      <div style="margin-left:  10px" , class="form-check">
        <div style="margin-top:30px">
        <button id="confirmar" class="sau-btn" data-toggle="confirmation" data-popout="true">Confirmar</button>
        <button id="voltar" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Voltar</button>
        </div>
      </div>
    </center>
    
  <script>

    $("#confirmar").click(function(){
      if(btnSim.checked){
        $("#conteudo").load("./procedimentos/noboot/ex_1/tecnico.php");
      }else if(btnNao.checked){
        $("#conteudo").load("./procedimentos/noboot/ex_1/semtecnico.php");
      }
    });

    $("#voltar").click(function(){
      $("#conteudo").load("./procedimentos/noboot/noboot_inicial.php");
    });
<h1 class="display-3">
    <center>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="lead">Entende-se por componente do computador, teclados, mouse, pendrives, HDs Externos e monitores (somente
            em caso de desktops).</p>
        </div>
      </div>
    </center>
  </h1>

  <!--Texto Agrupado -->

  <div style="margin-top: 40px" class="list-group">
    <button type="button" class="list-group-item">Teste a peça que esta com defeito em outro computador e verifique se o
      problema persiste.</button>
    <button type="button" class="list-group-item">Caso seja possível, teste com outra peça no computador, e verifique se
      o problema persiste.</button>
    <button type="button" class="list-group-item">Caso a peça seja carregável troque a pilha ou carregue o componente, e
      verifique se o problema persiste.</button>
    <button type="button" class="list-group-item">Verifique se o problema ocorre apenas em ALGUMAS funções do componente,
      ( Exemplo: Teclado: "defeito apenas na tecla G").</button>
    <button type="button" class="list-group-item">Teste o componente em outras portas USB (Caso se aplique).</button>
  </div>

  <center>
    <div style="margin-top: 20px">
      <h6>Selecione uma das opções abaixo</h6>
    </div>

    <!--Botão rádio -->

    <div style="margin-left: -200px">
      <center>
        <div style="margin-top:30px">
          <div style="margin-left: 81px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="BtnQualquerPc" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Componente continua com defeito qualquer computador
            </label>
          </div>

          <div style="margin-left: 98px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnUmPC" value="option2">
            <label class="form-check-label" for="exampleRadios2">
              Componente apresenta defeito apenas em UM computador
            </label>
          </div>

          <div style="margin-left: 174px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnPilha" value="option3">
            <label class="form-check-label" for="exampleRadios3">
              Ao testar com outra Bateria, Pilha ou Cabo o problema foi solucionado
            </label>
          </div>

          <div style="margin-left:  118px" , class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnIntermitente" value="option3">
            <label class="form-check-label" for="exampleRadios3">
              Problema persiste, porém ocorre apenas em alguns momentos
            </label>
          </div>

          <di class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="btnFuncoes" value="option3">
            <label class="form-check-label" for="exampleRadios3">
              Problema ocorre apenas em algumas funções
            </label>
          </div>
      </center>
      </div>

      <center>
        <div style="margin-top:20px">
				<button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Confirmar</button>
				<button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
				</div>
      </center>




      <script>

        $('#sim').on('click', function(){

          if(BtnQualquerPc.checked){
            $("#conteudo").load("./procedimentos/componentes/qualquer_computador.php");
          }else if(btnUmPC.checked){
            $("#conteudo").load("./procedimentos/componentes/um_computador.php");
          }else if(btnPilha.checked){
            $("#conteudo").load("./procedimentos/componentes/sol_troca_pilha.php");
          }else if(btnIntermitente.checked){
            $("#conteudo").load("./procedimentos/componentes/problema_intermitente.php");
          }else if(btnFuncoes.checked){
            $("#conteudo").load("./procedimentos/componentes/algumas_func.php");
          }else if(btnLED.checked){
            $("#conteudo").load("./procedimentos/componentes/todas_func_semled.php");
          }else{
            alert("ERRO : Opção inválida!");
          }

          });

          $('#voltar').on('click', function(){

          window.location.reload();

        });

      </script>

   

</body>
</html>
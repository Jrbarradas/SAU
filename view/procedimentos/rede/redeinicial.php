<h1 class="display-3">
		<center>
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<p class="lead">Para diagnosticar um problema ocorrido em rede, será necessário efetuar os seguintes diagnósticos:</p>
				</div>
			</div>
		</center>
	</h1>


	<!--Texto Agrupado -->

	<div style="margin-top: 40px" class="list-group">
		<button type="button" class="list-group-item">Caso a rede seja via cabo, certifique-se que está conectado corretamente
			na máquina como no exemplo abaixo.</button>
		<button type="button" class="list-group-item">Caso o problema seja somente com a conexão sem fio, desligue o modem WIFI
			aguarde 15 segundos e ligue novamente.</button>
		<button type="button" class="list-group-item">Apos os procedimentos realizados, verifique se o MODEM ou a porta de entrada
			do CABO, apresenta algum tipo de LED.</button>
	</div>

	<center>
		<div style="margin-top: 35px">
			<img src="..\Fotos\Rede/moden.PNG" class="img-fluid" alt="Responsive image">
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
					<input class="form-check-input" type="radio" name="exampleRadios" id="btnModem" value="option1" checked>
					<label class="form-check-label" for="exampleRadios1">
						MODEM apresenta LED, porem não acessa a internet
					</label>
				</div>

				<div style="margin-left: 98px" , class="form-check">
					<input class="form-check-input" type="radio" name="exampleRadios" id="btnCabo" value="option2">
					<label class="form-check-label" for="exampleRadios2">

						ENTRADA do CABO apresenta LED, porem não acessa a internet
					</label>
				</div>

				<div style="margin-left: 84px" , class="form-check">
					<input class="form-check-input" type="radio" name="exampleRadios" id="btnSemLeds" value="option3">
					<label class="form-check-label" for="exampleRadios3">
						MODEM ou CABO, não apresenta LED após os procedimentos
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

				if(btnModem.checked){
					$("#conteudo").load("./procedimentos/rede/rede_wifi/procedimento_1_wifi.php");
				}else if(btnCabo.checked){
					$("#conteudo").load("./procedimentos/rede/rede_cabo/procedimento_2_cabo.php");
				}else if(btnSemLeds.checked){
					$("#conteudo").load("./procedimentos/rede/semled.php");
				}else{
					alert("ERRO : Opção inválida!");
				}

			});

			$('#voltar').on('click', function(){

			window.location.reload();

			});
			
</script>

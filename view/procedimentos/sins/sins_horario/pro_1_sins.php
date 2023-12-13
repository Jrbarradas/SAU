	<h1 class="display-3">
		<center>
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<p class="lead">Se o sistema com SINS, esta apresentando o mesmo erro da imagem anterior, siga com os seguintes procedimentos:</p>
				</div>
			</div>
		</center>
	</h1>

	<!--Texto Agrupado -->

	<div style="margin-top: 10px" class="list-group">
		<button type="button" class="list-group-item">Caso seja possível realize a troca de horario do seu sistema, siga o passo
			a passo:</button>
		<button type="button" class="list-group-item">1. Clique no ícone de "Data e hora", que se encontra ao lado direito inferior
			do seu sistema.</button>
		<button type="button" class="list-group-item">2. Clique em "Ajustar data/hora".</button>
		<button type="button" class="list-group-item">3. Desative a opção "Definir horário automaticamente"</button>
		<button type="button" class="list-group-item">4. Em Alterar data e hora, clique em "Alterar".</button>
		<button type="button" class="list-group-item">5. Adiante seu relógio em 2 minutos.</button>
	</div>
	</center>

	<center>
		<div style="margin-top: 10px">
			<img src="..\Fotos\Sins/SinsGif.gif" class="img-fluid" alt="Responsive image">
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

				<div style="margin-left: -48px" , class="form-check">
					<input class="form-check-input" type="radio" name="exampleRadios" id="btnPersiste" value="option2">
					<label class="form-check-label" for="exampleRadios2">
						Após os procedimentos problema PERSISTE
					</label>
				</div>

				<div style="margin-left: -80px" , class="form-check">
					<input class="form-check-input" type="radio" name="exampleRadios" id="btnNaoFeito" value="option3">
					<label class="form-check-label" for="exampleRadios3">
						Não possível realizar os procedimentos
					</label>
				</div>
			</div>
	</center>


	<center>
		<div style="margin-top: 10px">
		     <button id="confirmar" class="sau-btn" data-toggle="btnSim" data-popout="true">Confirmar</button>
             <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
		</div>

		<script>

			$("#confirmar").click(function(){
				if(btnResolvido.checked){
					$("#conteudo").load("./procedimentos/sins/sins_horario/pro_1_solucionado.php");
				}else if(btnPersiste.checked){
					$("#conteudo").load("./procedimentos/sins/sins_horario/pro_2_persiste.php");
				}else if(btnNaoFeito.checked){
					$("#conteudo").load("./procedimentos/sins/sins_horario/pro_1_impossivel.php");
				}
			});

			$("#voltar").click(function(){
				$("#conteudo").load("./procedimentos/sins/sins_inicial.php");
			});

		</script>

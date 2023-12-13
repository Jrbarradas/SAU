
	<div style="margin-top: 0px" class="list-group">
		<button type="button" class="list-group-item">Para problemas na impressora relacionadas ao sistema, selecione uma das opções
			abaixo:</button>
	</div>

	<center>
		<div style="margin-top: 10px">
			<img src="..\Fotos\impressora.jpg" class="img-fluid" alt="Responsive image">
		</div>
	</center>
	<center>
		<div style="margin-top: -10px">
			<h6>Selecione uma das opções abaixo</h6>
		</div>


		<center>
			<div style="margin-left: 120px">
				<div style="margin-top:10px">
					<div style="margin-left: -110px" , class="form-check">
						<input class="form-check-input" type="radio" name="exampleRadios" id="btnFilaImpressao" value="option1" checked>
						<label class="form-check-label" for="exampleRadios1">
							1. A fila de impressão parou ou não responde
						</label>
					</div>

					<div style="margin-left: 10px" , class="form-check">
						<input class="form-check-input" type="radio" name="exampleRadios" id="btnNaoDigitaliza" value="option2">
						<label class="form-check-label" for="exampleRadios2">
							2. A impressora não esta Imprimindo ou não esta Digitalizando
						</label>
					</div>

					<div style="margin-left: -122px" , class="form-check">
						<input class="form-check-input" type="radio" name="exampleRadios" id="btnNenhumaFuncao" value="option2">
						<label class="form-check-label" for="exampleRadios2">
							3. A impressora não efetua nenhuma função
						</label>
					</div>
		</center>

		<center>
				<div style="margin-top:10px">
				  <button id="confirmar" class="sau-btn" data-toggle="confirmation" data-popout="true">Confirmar</button>
         		  <button id="voltar" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Voltar</button>
				</div>
		</center>
		<script>	

			$("#confirmar").click(function(){
				if(btnFilaImpressao.checked){
					$("#conteudo").load("./procedimentos/impressora/impressora_sistema/fila_impressao.php");
				}else if(btnNaoDigitaliza.checked){
					$("#conteudo").load("./procedimentos/impressora/impressora_sistema/nao_digitaliza.php");
				}else if(btnNenhumaFuncao.checked){
					$("#conteudo").load("./procedimentos/impressora/impressora_sistema/nenhuma_funcao.php");
				}	
			});

		</script>

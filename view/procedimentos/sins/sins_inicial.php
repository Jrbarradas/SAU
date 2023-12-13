
	<h1 class="display-3">
		<center>
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<p class="lead">Para a resolução do problema com Autorização SINS, realize os seguintes procedimentos:</p>
				</div>
			</div>
		</center>
	</h1>

	<!--Texto Agrupado -->

	<div style="margin-top: 10px" class="list-group">
		<button type="button" class="list-group-item">1. Verfique se o sistema esta informando esta mensagem a baixo:</button>
	</div>

	<center>
		<div style="margin-top: 10px">
			<img src="..\Fotos\SINS.png" class="img-fluid" alt="Responsive image">
		</div>
	</center>
	<center>
		<div style="margin-top: 10px">
			<h6>O problema com o SINS, é o mesmo da imagem?</h6>
		</div>


		<center>
			<div style="margin-top: 10px">
			 <button id="sim" class="sau-btn" data-toggle="btnSim" data-popout="true">Sim</button>
             <button id="nao" class="sau-btn-secondary" data-toggle="btnNao" data-popout="true">Não</button>
			</div>
		</center>


		<script>
			
			$("#sim").click(function(){
				$("#conteudo").load("./procedimentos/sins/sins_horario/pro_1_sins.php");
			});

			$("#nao").click(function(){
				$("#conteudo").load("./procedimentos/sins/sins_resposta_nao.php");
			});

		</script>

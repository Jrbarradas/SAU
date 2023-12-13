<?php

include "../../controller/toolsAuth.php";

$var = $_SESSION['usuario_logado'];

?>




<h1 class="display-3">
	<center>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">No Power</h1>
				<p class="lead">Procedimentos Realizados:</p>
			</div>
		</div>
	</center>
</h1>


<!--Texto Agrupado -->

<div style="margin-top: 60px " class="list-group">
	<button type="button" class="list-group-item">Verificado Led e Beep.</button>
	<button type="button" class="list-group-item">Testado computador em outra tomada.</button>
	<button type="button" class="list-group-item">Efetuado a troca do cabo energia ou trocado Carregador.</button>
	<button type="button" class="list-group-item">Verificado integridade do Carregador, com defeito.</button>
</div>


<center>

	<div style="margin-top: 40px" class="form-group">
		<label for="comment">
			<h6>
				Escreva no campo abaixo todas as observações, informando se houve danos físicos, derramamento líquido, ou procedimentos não
				realizados.
				<span id="redmineOpen" class="badge badge-danger"></span>
			</h6>
		</label>

		<textarea class="form-control" rows="5" id="txtProcedimento"  name="textarea">
			Procedimentos Realizados (Protocolo 001):
			- Verificado Led e Beep;
			- Testado computador em outra tomada;	
			- Efetuado a troca do cabo energia ou trocado Carregador;
			- Verificada integridade do Carregador;
			- Identificado Danos Físicos
		</textarea>	

		<textarea class="form-control" rows="5" id="txtProtocolo"  name="textarea" hidden="true">001</textarea>	

		<textarea class="form-control" rows="5" id="txtSessao"  name="textarea" hidden="true">
			<?php echo $var ?>;
		</textarea>	

	</div>

</center>
		<center>
			<div style="margin-top: 40px">
				<button id="abrirTarefa" class="btn btn-info" data-toggle="confirmation" data-popout="true"> Abrir Tarefa </button>
				<button id="voltar" class="btn btn-info" data-toggle="btnNao" data-popout="true">Voltar</button>
				<button id="sair" class="btn btn-info" data-toggle="confirmation" data-popout="true"> Sair </button>
			</div>
		</center>
		
		<button style="margin-left: 20px" type="button" id="btnProtocolo"  class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
			title="Tooltip on top">
		Protocolo 001
		</button>


	<script>

		
			// Realiza o Request para Abrir a tarefa no Redmine via API 

			$("#abrirTarefa").click(function(){

			let procedimentos = {
					txtSessao : $("#txtSessao").val(),
					txtProtocolo : $("#txtProtocolo").val()
			}

			$.post('http://docs.spacecom.com.br/beta/sau/redminepoo.php',procedimentos,function(retorno){
				
					$("#redmineOpen").html(retorno);

			});

			});



			$('#voltar').on('click', function(){

			$('#conteudo').load('./procedimentos/simoutrocarregador.php');

			});

			$('#sair').on('click', function(){

			window.location.reload();

			});
 
   </script>
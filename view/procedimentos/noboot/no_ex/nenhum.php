<?php

include "../../../../controller/toolsAuth.php";

$var = $_SESSION['usuario_logado'];

?>

<h1 class="display-3">
  <center>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
		<p class="lead">O "NO BOOT" ocorre quando a máquina não inicia o sistema operacional, devido a um problema no próprio sistema ou no HD do equipamento...
            Será necessário efetuar os seguintes diagnósticos:</p>

      </div>
    </div>
  </center>
</h1>


<!--Texto Agrupado -->

<div style="margin-top: 10px " class="list-group">
  <button type="button" class="list-group-item">Neste caso, não é possível indentificar o que está causando o erro de NO BOOT.</button>
  <button type="button" class="list-group-item">É necessário fotos do equipamento e patrimônio.</button>
  <button type="button" class="list-group-item">Também é necessário fotos do erro.</button>
  <button type="button" class="list-group-item">Favor coletar as fotos e abrir um chamado para a T.I Spacecom.</button>
</div>

<center>

  <div style="margin-top: 10px" class="form-group">
    <label for="comment">
      <h6>
        Escreva no campo abaixo todas as observações, informando se houve danos físicos, derramamento líquido, ou procedimentos não
        realizados.
        <span id="redmineOpen" class="badge badge-danger"></span>
      </h6>
    </label>
    <textarea class="form-control" rows="5" id="comment">
    Procedimentos Realizados (Protocolo 053):
    - Problema de NO BOOT;
    - Não é possível identificar o que está causando o NO BOOT;
    </textarea>
      <textarea class="form-control" rows="5" id="txtProtocolo"  name="textarea" hidden="true">053</textarea>	
			<textarea class="form-control" rows="5" id="txtSessao"  name="textarea" hidden="true">
			<?php echo $var ?>;
			</textarea>	
  </div>
</center>

    <center>
      <div style="margin-top: 10px">
        <button id="abrirTarefa" class="sau-btn" data-toggle="confirmation" data-popout="true"> Abrir Tarefa</button>
        <button id="voltar" class="sau-btn-dark" data-toggle="btnNao" data-popout="true">Voltar</button>
        <button id="sair" class="sau-btn-secondary" data-toggle="confirmation" data-popout="true"> Sair </button>
      </div>
    </center>

    <div style="margin-top: 10px">
      <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Protocolo 053
    </button>
  </div>


	   <script>
      
      $('#abrirTarefa').on('click', function(){
  
      let procedimentos = {
      txtSessao : $("#txtSessao").val(),
      txtProtocolo : $("#txtProtocolo").val()
      }
  
      $.post('../view/scripts/redmine_abrir_tarefa.php',procedimentos,function(retorno){
  
      $("#redmineOpen").html(retorno);
  
      });
  
      });
  
      $('#voltar').on('click', function(){
  
      $('#conteudo').load('./procedimentos/noboot/noboot_inicial.php');
  
      });
  
      $('#sair').on('click', function(){
  
      window.location.reload();
  
      });
      
      </script>
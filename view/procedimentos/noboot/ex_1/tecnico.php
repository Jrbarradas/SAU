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



<div style="margin-top: 10px " class="list-group">
  <button type="button" class="list-group-item">Orientar para que o mesmo entre em contato com a Dell para realização dos testes, é importante ter fotos do erro e fotos do equipamento, pois, serão solicitadas pela Dell.</button>
  <button  type="button" id="chatDell" class="list-group-item">Chat: <b>Acesse Aqui.</b></button>
  <button type="button" class="list-group-item">Telefone: 0-800 970- 3355, entre 8h e 19h, de segunda a sexta.</button>
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
    Procedimentos Realizados (Protocolo 050):
    - Problema de NO BOOT;
    - Possível problema no Hardware;
    - No Deivce Bootable Found ou Hard Disk Not Found (Possível problema no HD);
    - Passado link para contado com a Dell;
    </textarea>
      <textarea class="form-control" rows="5" id="txtProtocolo"  name="textarea" hidden="true">050</textarea>	
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
      Protocolo 050
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
  
      $('#conteudo').load('./procedimentos/noboot/ex_1/fisico.php');
  
      });
  
      $('#sair').on('click', function(){
  
      window.location.reload();
  
      });

      $("#chatDell").click(function(){
        window.open('https://www.dell.com/support/incidents-online/pt-br/contactus/dynamic');
      });
      
      </script>

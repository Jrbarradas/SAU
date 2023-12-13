
$(document).ready(function(){
    // Botão Visualizar
    $(document).on('click','.centralView', function(){
      let id = this.value;
      // POST Download Imagem
      $.post('http://sau.spacecom.com.br/sau/view/central_editar.php?id='+id+'&operacao=print',function(returnCentralPrint){
            $("#downloadSAU").attr("href",returnCentralPrint);
          });
      // POST Exibe Imagem
      $.post('http://sau.spacecom.com.br/sau/view/central_view.php?usuario='+id,function(returnCentral){
              $("#conteudoCentral").html(returnCentral);
          });
  
     });
  
     // Botão Editar
    $(document).on('click','.centralViewEditar', function(){
      let id = this.value;
      // Realiza o post, informando o ID clickado 
      $.post('http://sau.spacecom.com.br/sau/view/central_editar.php?id='+id+'&operacao=editar',function(returnCentralEditar){
              $("#conteudoEditarCentral").html(returnCentralEditar);
          });
     });
  
     // Botão Salvar [EDITAR]
     $("#btnCentralEditar").click(function(){
      let nome = $("#txtNomeCentral").val();
      let pa = $("#txtPACentral").val();
      let token = $("#txtTokenCentral").val();
      let observacao = $("#txtObsCentral").val();
        $.post('http://sau.spacecom.com.br/sau/view/central_editar.php?operacao=salvar&pa='+pa+'&token='+token+'&observacao='+observacao+'&nome='+nome,function(returnCentralSalvar){
          $("#CentralUpdate").html(returnCentralSalvar);
        });
     });
  
     // Botão Salvar Print
     $("#downloadSAU").click(function(){
        $("#returnDownload").html("PrintScreen Salvo!");
        setInterval(function(){
          $("#returnDownload").html("");
        },2000);
     });
  
     // Botão Excluir [EDITAR]
     $("#btnCentralExcluir").click(function(){
      let nome = $("#txtNomeCentral").val();
        $.post('http://sau.spacecom.com.br/sau/view/central_editar.php?operacao=excluir&nome='+nome,function(returnCentralExcluir){
          $("#CentralUpdate").html(returnCentralExcluir);
        });
     });
  
     // Verificar se a Modal Está Aberta
     // Caso esteja cria o arquivo que conversa com o Cliente
     
     const verificaModal = function(){
       setInterval(function(){
        if( $('#centralModal').is(':visible')){
          let id = $('#txtuserIDView').val();
          $.post('http://sau.spacecom.com.br/sau/view/scripts/view_monitor.php?id='+id,function(returnOpenModal){
          // Debug $("#returnDownload").html(returnOpenModal);
          });
         }else{
          let id = $('#txtuserIDView').val();
          if(typeof(id)==='undefined'){
          }else{
            $.post('http://sau.spacecom.com.br/sau/view/scripts/view_monitor.php?closed='+id,function(returnClosedModal){
            console.log(returnClosedModal);
           });
          }
         }
       },1000);
     }
  verificaModal();
  
  });
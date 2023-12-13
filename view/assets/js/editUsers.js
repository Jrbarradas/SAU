
$(document).ready(function(){

    // Responsável por encaminhar para o Gerador de PDF
    $("#btnUsuariosPDF").click(function(){
    window.location.href="http://sau.spacecom.com.br/sau/view/dynamic/inventario_pdf_usuarios.php?localPDF=geral&opPDF=users&token=dGlAc3BhY2Vjb20uY29tLmJy";
    });   


    

});

    /*
      Caso o Botão visualizar seja acionado
      Coleta o Value setado no botão, que armazena o ID do usuário
    */
    $(document).on('click','.visualizar', function(){
      // Pega o valor do Button clickado acessando o OBJ
      const usuario = {
      id : this.value
      }
      // Repassa o value via POST para a "API" que retorna as informações do usuário
      $.post('./api/editar_api_view.php?id='+usuario.id,usuario,function(retornoUsuario){
      $("#postResul").html(retornoUsuario);
      });

      // Caso o botão SALVAR da Modal de edição de usuários seja acionado
      $("#salvaUsuario").click(function(){
      // Coleta os dados contido na Modal através das classes setadas nos inputs
      let dadosUser = {
        nome : $('.nome').val(),
        email : $('.email').val(),
        senha : $('.senha').val(),
        permissao : $('.permissao').val(),
      }
      // Envia esses dados via POST para a "API" que realiza as modificações e retorna a mensagem de sucesso ou erro
      $.post('./api/editar_api_update.php?id='+usuario.id+'&operacao=salvar'+'&nome='+dadosUser.nome+'&email='+dadosUser.email+'&senha='+dadosUser.senha+'&permissao='+dadosUser.permissao,dadosUser,function(retornoModificacao){
        $("#updateUser").html(retornoModificacao);
      });
    })
    // Caso o botão EXCLUIR da modal de edição de usuários seja acionado
    $("#excluiUsuario").click(function(){
      let dadosUser = {
        email : $('.email').val(),
      }
      $.post('./api/editar_api_update.php?operacao=excluir&id='+usuario.id,function(excluirUsuario){
        $("#updateUser").html(excluirUsuario);
      });
    })

  });

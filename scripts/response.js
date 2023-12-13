$(document).ready(function(){

    /*
    Requisição POST efetuada através do AJAX no formulário de Login
    */
   
    $("#btnLogar").click(function(){

        let dadosLogin = {
            usuario : $("#usuario").val(),
            senha : $("#senha").val()
        }

        $.post('../controller/loginAuth.php',dadosLogin,function(retorno){
            $("#ajaxResul").html(retorno);

        });

    });

    $("#btnDados").click(function(){

        let dadosAlterar = {
            txtNome : $("#txtNome").val(),
            txtPass : $("#txtPass").val()
        }

        $.post('../controller/editarAuth.php',dadosAlterar,function(retorno){
           
            $("#editarResul").html(retorno);

        });


    });
    

});
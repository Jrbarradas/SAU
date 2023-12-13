$(document).ready(function(){

    /*
    Requisição POST efetuada através do AJAX no formulário de Login
    */
   
    // LOGIN - BOTÃO ENTRAR
    $("#btnLogar").click(function(){
        let dadosLogin = {
            usuario : $("#usuario").val(),
            senha : $("#senha").val()
        }

        $.post('../controller/loginAuth.php',dadosLogin,function(retorno){
            $("#msgLogin").html(retorno);

        });
    });

    // LOGIN - INPUTS
    $(".loginForm").keypress(function(event){
        let keycode = (event.keyCode ? event.keyCode : event.which);
         if(keycode == '13'){
            let dadosLogin = {
                usuario : $("#usuario").val(),
                senha : $("#senha").val()
            }
    
            $.post('../controller/loginAuth.php',dadosLogin,function(retorno){
                $("#msgLogin").html(retorno);
    
            });
        }
    })

    // Editar Perfil
    $("#btnDados").click(function(){

        let dadosAlterar = {
            txtNome : $("#txtNomeEdita").val(),
            txtPass : $("#txtPassEdita").val()
        }

        $.post('../controller/editarAuth.php',dadosAlterar,function(retorno){
           
            $("#editarResul").html(retorno);

        });


    });

    // Cadastrar Usuário

    $("#btnCad").click(function(){

        let dadosCad = {
            cadNome : $("#cadNome").val(),
            cadEmail : $("#cadEmail").val(),
            cadPass : $("#cadPass").val(),
            cadPermissao : $("#cadPermissao").val()
        }

        if(cadPermissao != 0){
            $.post('../controller/cadastroClass.php',dadosCad,function(retorno){
           
                $("#cadResul").html(retorno);
    
            });
        }else {

            let error = "Erro, a permissão de usuário não foi selecionada!";
            $("#cadResul").html(error);
        

        }
    });

    // Cadastro de Usuário - Treinamento

        $("#btnCadTRE").click(function(){

            let dadosCadTRE = {

                cadNome : $("#cadNomeTRE").val(),
                cadEmail : $("#cadEmailTRE").val(),
                cadPass : $("#cadPassTRE").val(),
                cadPermissao : 4

            }

            $.post('../controller/cadastroClass.php',dadosCadTRE,function(retorno){
           
                $("#cadResulTRE").html(retorno);
    
            });

        });



        // View Inventário -- Controle na busca
        $("#btnBuscaInv").click(function(){

            let localidade = $('#localidade').val();
            let operacao = $('#tipoInventario').val();

            // Verifica se os campos foram selcionados, caso não tenha, exibe um Alert
            if(localidade != "Selecione a Localidade" && operacao != "Selecione o Inventário"){
                
                window.location.href = '../view/inventario_view.php?local='+localidade+'&op='+operacao;    

            }else{
               alert('Selecione os campos necessários para a busca!');
            }
       
           });

           // View Inventário - Select Dinâmico
           $("#localidade").change(function(){

            let localizacao = $("#localidade").val();
            $.post('./api/inventario_api_select.php?localizacao='+localizacao,localizacao,function(retorno){
                     
                     $("#tipoInventario").html(retorno);
          
                 });
          
          });

        



});
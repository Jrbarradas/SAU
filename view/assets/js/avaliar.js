$('#btnAvaliar').on('click', function(){
    if(ratingOtimo.checked){
        /*
        Armazena os dados repassados na primeira Survey
        Dentro de um Objeto JSON, insere esses dados na Request URL da próxima Survey, repassando os dados até a última Survey...
        Na Última Survey será tratado os dados.
        */
        let ratingInfo = {
            rating : $("#ratingOtimo").val(),
            opiniao : $("#txtTreinamento").val()
        }
        $('#conteudo').load('../view/dynamic/teoria.php',{rating:ratingInfo.rating, opiniao:ratingInfo.opiniao});
        //$('#conteudo').load('../view/dynamic/teoria.php?rating='+ratingInfo.rating+'&opiniao='+ratingInfo.opiniao);

    }else if(ratingBom.checked){
        let ratingInfo = {
            rating : $("#ratingBom").val(),
            opiniao : $("#txtTreinamento").val()
        }
        $('#conteudo').load('../view/dynamic/teoria.php',{rating:ratingInfo.rating, opiniao:ratingInfo.opiniao});
        //$('#conteudo').load('../view/dynamic/teoria.php?rating='+ratingInfo.rating+'&opiniao='+ratingInfo.opiniao);
        
    }else if(ratingRazoavel.checked){
        let ratingInfo = {
            rating : $("#ratingRazoavel").val(),
            opiniao : $("#txtTreinamento").val()
        }
        $('#conteudo').load('../view/dynamic/teoria.php',{rating:ratingInfo.rating, opiniao:ratingInfo.opiniao});
        //$('#conteudo').load('../view/dynamic/teoria.php?rating='+ratingInfo.rating+'&opiniao='+ratingInfo.opiniao);
    }else if(ratingRuim.checked){
        let ratingInfo = {
            rating : $("#ratingRuim").val(),
            opiniao : $("#txtTreinamento").val()
        }
        $('#conteudo').load('../view/dynamic/teoria.php',{rating:ratingInfo.rating, opiniao:ratingInfo.opiniao});
        //$('#conteudo').load('../view/dynamic/teoria.php?rating='+ratingInfo.rating+'&opiniao='+ratingInfo.opiniao);
        
    }
});


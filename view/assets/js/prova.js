$('#btnQst1').on('click', function(){

    if(qst1A.checked){
    let resposta = {
        qst1 : $("#qst1A").val()
    }
    $('#conteudo').load('../view/dynamic/questao2.php?qst1='+resposta.qst1);

   }else if(qst1B.checked){

    let resposta = {
        qst1 : $("#qst1B").val()
    }
    $('#conteudo').load('../view/dynamic/questao2.php?qst1='+resposta.qst1);

   }else if(qst1C.checked){

    let resposta = {
        qst1 : $("#qst1C").val()
    }
    $('#conteudo').load('../view/dynamic/questao2.php?qst1='+resposta.qst1);

   }else if(qst1D.checked){

    let resposta = {
        qst1 : $("#qst1D").val()
    }
    $('#conteudo').load('../view/dynamic/questao2.php?qst1='+resposta.qst1);

   }

});
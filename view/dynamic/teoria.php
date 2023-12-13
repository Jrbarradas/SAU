<?php

// Coleta de dados da Tela Anterior
$rating['geral'] = $_POST['rating'];
$opiniao['geral'] = $_POST['opiniao'];
include '../../controller/toolsAuth.php';
$usuario = new toolsAuth;

  
?>




        <h4 class="font-weight-bold text-center mt-3">Avalie o treinamento</h4>
        <hr>
        <div class="survey-head text-center">
          <i class="fas fa-poll-h fa-3x blue-text mb-2"></i>
          <p class="font-weight-normal">Ajude-nos a melhorar nosso treinamento.</p>
        </div>
        <hr>
        <p class="text-center">2. Qual sua opinião sobre a forma como as aulas foram conduzidas entre teoria
e prática? Por que?</p>
        <center>
        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="ratingOtimo" value="Ótimo" checked>
          <label class="form-check-label" for="radio-179">Ótimo</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="ratingBom" value="Bom">
          <label class="form-check-label" for="radio-279">Bom</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="ratingRazoavel" value="Razoável">
          <label class="form-check-label" for="radio-379">Razoável</label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="ratingRuim" value="Ruim">
          <label class="form-check-label" for="radio-479">Ruim</label>
          <!-- Valores que serão repassados para a próxima tela -->
          <input class="form-check-input" name="rating" type="hidden" id="ratingGeral" value="<?php echo $rating['geral']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="opiniaoGeral" value="<?php echo $opiniao['geral']; ?>">
        </div>
        <div class="form-check mb-4">
        <textarea class="form-control" id="txtTreinamento" name="opiniao" placeholder="Descreva sua opinião..."  required></textarea>
        <button type="button" class="sau-btn" style="margin-top:20px" id="btnTeoria">Enviar</button>


        <script>
            // Dados coletados que serão repassados na próxima Survey
            $('#btnTeoria').on('click', function(){
                if(ratingOtimo.checked){
                    let ratingInfo = {
                        ratingGeral : $("#ratingGeral").val(),
                        opiniaoGeral : $("#opiniaoGeral").val(),
                        ratingTeoria : $("#ratingOtimo").val(),
                        opiniaoTeoria : $("#txtTreinamento").val()
                    }
                    $('#conteudo').load('../view/dynamic/carga.php',{rating:ratingInfo.ratingGeral, opiniao:ratingInfo.opiniaoGeral, ratingTeoria:ratingInfo.ratingTeoria, opiniaoTeoria:ratingInfo.opiniaoTeoria});
                    //$('#conteudo').load('../view/dynamic/carga.php?rating='+ratingInfo.ratingGeral+'&opiniao='+ratingInfo.opiniaoGeral+'&ratingTeoria='+ratingInfo.ratingTeoria+'&opiniaoTeoria='+ratingInfo.opiniaoTeoria);
                }else if(ratingBom.checked){
                    let ratingInfo = {
                        ratingGeral : $("#ratingGeral").val(),
                        opiniaoGeral : $("#opiniaoGeral").val(),
                        ratingTeoria : $("#ratingBom").val(),
                        opiniaoTeoria : $("#txtTreinamento").val()
                    }
                    $('#conteudo').load('../view/dynamic/carga.php',{rating:ratingInfo.ratingGeral, opiniao:ratingInfo.opiniaoGeral, ratingTeoria:ratingInfo.ratingTeoria, opiniaoTeoria:ratingInfo.opiniaoTeoria});
                    //$('#conteudo').load('../view/dynamic/carga.php?rating='+ratingInfo.ratingGeral+'&opiniao='+ratingInfo.opiniaoGeral+'&ratingTeoria='+ratingInfo.ratingTeoria+'&opiniaoTeoria='+ratingInfo.opiniaoTeoria);
                    
                }else if(ratingRazoavel.checked){
                    let ratingInfo = {
                        ratingGeral : $("#ratingGeral").val(),
                        opiniaoGeral : $("#opiniaoGeral").val(),
                        ratingTeoria : $("#ratingRazoavel").val(),
                        opiniaoTeoria : $("#txtTreinamento").val()
                    }
                    $('#conteudo').load('../view/dynamic/carga.php',{rating:ratingInfo.ratingGeral, opiniao:ratingInfo.opiniaoGeral, ratingTeoria:ratingInfo.ratingTeoria, opiniaoTeoria:ratingInfo.opiniaoTeoria});
                    //$('#conteudo').load('../view/dynamic/carga.php?rating='+ratingInfo.ratingGeral+'&opiniao='+ratingInfo.opiniaoGeral+'&ratingTeoria='+ratingInfo.ratingTeoria+'&opiniaoTeoria='+ratingInfo.opiniaoTeoria);
                }else if(ratingRuim.checked){
                    let ratingInfo = {
                        ratingGeral : $("#ratingGeral").val(),
                        opiniaoGeral : $("#opiniaoGeral").val(),
                        ratingTeoria : $("#ratingRuim").val(),
                        opiniaoTeoria : $("#txtTreinamento").val()
                    }
                    $('#conteudo').load('../view/dynamic/carga.php',{rating:ratingInfo.ratingGeral, opiniao:ratingInfo.opiniaoGeral, ratingTeoria:ratingInfo.ratingTeoria, opiniaoTeoria:ratingInfo.opiniaoTeoria});
                    //$('#conteudo').load('../view/dynamic/carga.php?rating='+ratingInfo.ratingGeral+'&opiniao='+ratingInfo.opiniaoGeral+'&ratingTeoria='+ratingInfo.ratingTeoria+'&opiniaoTeoria='+ratingInfo.opiniaoTeoria);
                    
                }
            });
</script>

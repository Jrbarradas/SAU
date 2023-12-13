<?php

// Coleta de dados da Tela Anterior
$rating['geral'] = $_POST['rating'];
$opiniao['geral'] = $_POST['opiniao'];
$rating['teoria'] = $_POST['ratingTeoria'];
$opiniao['teoria'] = $_POST['opiniaoTeoria'];
$rating['carga'] = $_POST['ratingCarga'];
$opiniao['carga'] = $_POST['opiniaoCarga'];
$rating['instrutores'] = $_POST['ratingIns'];
$opiniao['instrutores'] = $_POST['opiniaoIns'];
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
        <p class="text-center">5. A apostila expõe o treinamento de forma clara? Por quê?</p>
        <center>
        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="ratingSim" value="Sim" checked>
          <label class="form-check-label" for="radio-179">Sim</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="rating" type="radio" id="ratingNao" value="Não">
          <label class="form-check-label" for="radio-279">Nao</label>
        </div>
  
          <!-- Valores que serão repassados para a próxima tela -->
          <input class="form-check-input" name="rating" type="hidden" id="ratingGeral" value="<?php echo $rating['geral']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="opiniaoGeral" value="<?php echo $opiniao['geral']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="ratingTeoria" value="<?php echo $rating['teoria']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="opiniaoTeoria" value="<?php echo $opiniao['teoria']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="ratingCarga" value="<?php echo $rating['carga']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="opiniaoCarga" value="<?php echo $opiniao['carga']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="ratingIns" value="<?php echo $rating['instrutores']; ?>">
          <input class="form-check-input" name="rating" type="hidden" id="opiniaoIns" value="<?php echo $opiniao['instrutores']; ?>">
        </div>
        <div class="form-check mb-4">
        <textarea class="form-control" id="txtTreinamento" name="opiniao" placeholder="Descreva sua opinião..."  required></textarea>
        <button type="button" class="sau-btn" style="margin-top:20px" id="btnCarga">Enviar</button>


        <script>
            // Dados coletados que serão repassados na próxima Survey
            $('#btnCarga').on('click', function(){
                if(ratingSim.checked){
                    let ratingInfo = {
                        ratingGeral : $("#ratingGeral").val(),
                        opiniaoGeral : $("#opiniaoGeral").val(),
                        ratingTeoria : $("#ratingTeoria").val(),
                        opiniaoTeoria : $("#opiniaoTeoria").val(),
                        ratingCarga : $("#ratingCarga").val(),
                        opiniaoCarga : $("#opiniaoCarga").val(),
                        ratingIns : $("#ratingIns").val(),
                        opiniaoIns : $("#opiniaoIns").val(),
                        ratingApostila : $("#ratingSim").val(),
                        opiniaoApostila : $("#txtTreinamento").val()
                    }
                    $('#conteudo').load('../view/dynamic/informacoes.php',{rating:ratingInfo.ratingGeral, opiniao:ratingInfo.opiniaoGeral, ratingTeoria:ratingInfo.ratingTeoria, opiniaoTeoria:ratingInfo.opiniaoTeoria, ratingCarga:ratingInfo.ratingCarga, opiniaoCarga:ratingInfo.opiniaoCarga, ratingIns:ratingInfo.ratingIns, opiniaoIns:ratingInfo.opiniaoIns, ratingApostila:ratingInfo.ratingApostila, opiniaoApostila:ratingInfo.opiniaoApostila});
                    //$('#conteudo').load('../view/dynamic/informacoes.php?rating='+ratingInfo.ratingGeral+'&opiniao='+ratingInfo.opiniaoGeral+'&ratingTeoria='+ratingInfo.ratingTeoria+'&opiniaoTeoria='+ratingInfo.opiniaoTeoria+'&ratingCarga='+ratingInfo.ratingCarga+'&opiniaoCarga='+ratingInfo.opiniaoCarga+'&ratingIns='+ratingInfo.ratingIns+'&opiniaoIns='+ratingInfo.opiniaoIns+'&ratingApostila='+ratingInfo.ratingApostila+'&opiniaoApostila='+ratingInfo.opiniaoApostila);
                }else if(ratingNao.checked){
                    let ratingInfo = {
                        ratingGeral : $("#ratingGeral").val(),
                        opiniaoGeral : $("#opiniaoGeral").val(),
                        ratingTeoria : $("#ratingTeoria").val(),
                        opiniaoTeoria : $("#opiniaoTeoria").val(),
                        ratingCarga : $("#ratingCarga").val(),
                        opiniaoCarga : $("#opiniaoCarga").val(),
                        ratingIns : $("#ratingIns").val(),
                        opiniaoIns : $("#opiniaoIns").val(),
                        ratingApostila : $("#ratingSim").val(),
                        opiniaoApostila : $("#txtTreinamento").val()
                    }
                    
                    $('#conteudo').load('../view/dynamic/informacoes.php',{rating:ratingInfo.ratingGeral, opiniao:ratingInfo.opiniaoGeral, ratingTeoria:ratingInfo.ratingTeoria, opiniaoTeoria:ratingInfo.opiniaoTeoria, ratingCarga:ratingInfo.ratingCarga, opiniaoCarga:ratingInfo.opiniaoCarga, ratingIns:ratingInfo.ratingIns, opiniaoIns:ratingInfo.opiniaoIns, ratingApostila:ratingInfo.ratingApostila, opiniaoApostila:ratingInfo.opiniaoApostila});
                    //$('#conteudo').load('../view/dynamic/informacoes.php?rating='+ratingInfo.ratingGeral+'&opiniao='+ratingInfo.opiniaoGeral+'&ratingTeoria='+ratingInfo.ratingTeoria+'&opiniaoTeoria='+ratingInfo.opiniaoTeoria+'&ratingCarga='+ratingInfo.ratingCarga+'&opiniaoCarga='+ratingInfo.opiniaoCarga+'&ratingIns='+ratingInfo.ratingIns+'&opiniaoIns='+ratingInfo.opiniaoIns+'&ratingApostila='+ratingInfo.ratingApostila+'&opiniaoApostila='+ratingInfo.opiniaoApostila);
                    
                }
            });
</script>

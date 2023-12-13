<body>

<!-- ======= Mobile nav toggle button ======= -->
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

<!-- ======= Header ======= -->
<header id="header">
<div class="d-flex flex-column">

    <?php include './dynamic/profile.php' ?>

    <nav class="nav-menu">
        <?php include './dynamic/menu.php'?>
    </nav><!-- .nav-menu -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

</div>
</header><!-- End Header -->

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

    <div class="d-flex justify-content-between align-items-center" style="margin-top:0px">
        <h2>Inventário de Hardware - GMG</h2>
        <ol>
        <li><a href="home.php">Home</a></li>
        <li>Inventário de Hardware - GMG</li>
        </ol>
    </div>
    </div>
</section>
<!-- End Breadcrumbs -->


    <!-- Tabela Inventario Basic -->
    <div class="container" style="margin-top:20px;">
    <button type="submit" class="sau-btn" id="btnaddGMG" data-toggle="modal" data-target="#modalHWAddInvDellPC">Adicionar Dispositivo</button>
    <button type="submit" class="sau-btn" id="btnimportGMG" data-toggle="modal" data-target="#modalHWAddInvDellPCImport">Importar XML</button>
    <button type="submit" class="sau-btn" id="btnHWAddInvDellPDF" href="javascript:void(0)">Exportar PDF</button>
    </div>
  <section class="inner-page">
    <div class="container" id="divTable" style="margin-top:-50px">
    <table class="table" id="tblGMGBasic" style="text-align:center">
                    <thead class="thead-dark">
                        <th scope="col">Patrimônio</th>
                        <th scope="col">Localização</th>
                        <th scope="col">Motor</th>
                        <th scope="col">Gerador</th>
                        <th scope="col">Potencia</th>
                        <th scope="col">Outras Infos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td> </td>
                        </tr>
                    </tbody>
                    </table>  
                </div>
              </section>




 <!-- Modal Botões Inventário - ADD - IMPORT - EXPORT -->

 <div class="modal fade" id="modalHWAddInvDellPC" tabindex="-1" aria-labelledby="modalHWAddInvDellPC" aria-hidden="true">
            <div class='modal-dialog modal-lg' role='document'>
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHWAddInvDellPC">Adicionar GMG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <li class="list-group-item"><p class="font-italic">Informações Gerais</p><div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Patrimonio</span>
                        <input type='text' class='form-edit' style='width:14%' id='txtPat' required>
                        <span class='input-group-text' style='margin-left:20px'>Localização</span>
                        <input type='text' class='form-edit' style='width:14%' id='txtLocal'required>
                        <span class='input-group-text' style='margin-left:20px'>Nome</span>
                        <input type='text' class='form-edit' style='width:20%' id='txtNome'required>
                        
                        </li><li class="list-group-item"><p class="font-italic">Informações do Equipamento</p><div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Fabricante</span>
                        <input type='text' class='form-edit' style='width:15%' id='txtFab' required>
                        <span class='input-group-text' style='margin-left:20px;'>Service Tag</span>
                        <input type='text' class='form-edit' style='width:15%' id='txtST' required>
                        <span class='input-group-text' style='margin-left:20px;'>Aquisição</span>
                         <input type='text' class='form-edit' id='txtAqu' required>
                        </li>
                        
                        <li class="list-group-item"><p class="font-italic">Especificações Técnicas</p>
                        <div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>Corrente</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtCorrente' required>
                         <span class='input-group-text' style='margin-left:20px'>Potencia</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtPotencia' required>
                         <span class='input-group-text' style='margin-left:20px'>Peso</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtPeso' required>
                         </li>
                         
                         <li class="list-group-item"><p class="font-italic">Especificações Mecânicas</p><div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>Motor</span>
                         <input type='text' class='form-edit' style='width:20%' id='txtMotor' required>
                         <span class='input-group-text' style='margin-left:20px'>Gerador</span>
                         <input type='text' class='form-edit' style='width:20%' id='txtGerador' required>
                         <span class='input-group-text' style='margin-left:20px'>Comando</span>
                         <input type='text' class='form-edit' style='width:20%' id='txtComando' required>
                         </li>

                         <li class="list-group-item"><span class="badge badge-danger" id="HWaddDellPC"></span></li>

    
                </li>
                <div class="modal-footer">
                    <button type="button" class="sau-btn" id="addDell">Salvar</button>
                    <button type="button" class="sau-btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                
                </div>
                </div>
                </div>
                </div>

                </div>
            </div>
            </div>
            
            <!-- MODAL IMPORT CSV PARA O BANCO DE DADOS -->

            <?php include './dynamic/import_xml_view.php'; ?>
            
            <!-- INICIA DA MODAL SALVAR, EXCLUIR, FECHAR -->
            <?php 
            for($i=0;$i<count($sauInv->resDec);$i++){ 
                echo "<div class='modal fade' id='viewDesktopDell".$sauInv->resDec[$i]->patrimonio."'tabindex='-1' role='dialog' aria-labelledby='classInfo' aria-hidden='true' style='margin-left: 110px'>".PHP_EOL;
                echo "<div class='modal-dialog modal-lg' role='document'>".PHP_EOL;
                echo "<div class='modal-content'>".PHP_EOL;
                echo '<div class="modal-header">'.PHP_EOL;
                echo '<h5 class="modal-title" id="viewDesktopDellTitle">Inventário Hardware - GMG</h5>'.PHP_EOL;
                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'.PHP_EOL;
                echo '<span aria-hidden="true">&times;</span>'.PHP_EOL;
                echo '</button>'.PHP_EOL;
                echo '</div>'.PHP_EOL;
                echo '<div class="container">'.PHP_EOL;                       
                echo '<div class="modal-body">'.PHP_EOL;
                echo '<div class="container>';
                echo '<ul class="list-group">'.PHP_EOL;  
                // Dados Que preenchem a Modal
                
                // Patrimonio - Localização - Nome
                echo '<li class="list-group-item"><p class="font-italic">Informações Gerais</p>'.PHP_EOL;
                echo "<div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Patrimonio</span>
                        ".PHP_EOL;
                echo "<input type='text' class='form-edit' style='width:14%' id='txtPat".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->patrimonio."' required>".PHP_EOL;
                echo "<span class='input-group-text' style='margin-left:20px'>Localização</span>";
                echo "<input type='text' class='form-edit' style='width:14%' id='txtLocal".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->localizacao."' required>".PHP_EOL;
                echo "<span class='input-group-text' style='margin-left:20px'>Nome</span>";
                echo "<input type='text' class='form-edit' style='width:20%' id='txtNome".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->nome."' required>".PHP_EOL;
                echo "</li>";

                //Fabricante - Service Tag - Aquisição
                echo '<li class="list-group-item"><p class="font-italic">Informações do Equipamento</p>'.PHP_EOL;
                echo "<div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Fabricante</span>
                        ".PHP_EOL;
                echo "<input type='text' class='form-edit' style='width:15%' id='txtFab".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->fabricante."' required>".PHP_EOL;
                echo " <span class='input-group-text' style='margin-left:20px;'>Service Tag</span>".PHP_EOL;
                echo "<input type='text' class='form-edit' id='txtST".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->servicetag."' required>".PHP_EOL;
                echo "<span class='input-group-text' style='margin-left:20px;'>Aquisição</span>";
                echo "<input type='text' class='form-edit' style='width:20%' id='txtAqu".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->aquisicao."'value='".$sauInv->resDec[$i]->aquisicao."' required>".PHP_EOL;

                echo "</li>".PHP_EOL;


                 //Corrente - Potencia - Peso
                 echo '<li class="list-group-item"><p class="font-italic">Especificações Técnicas</p>'.PHP_EOL;
                 echo "<div class='input-group'>
                         <div class='input-group-prepend'>";
                 echo "<span class='input-group-text'>Corrente</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtCorrente".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->correntenominal."'value='".$sauInv->resDec[$i]->correntenominal."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Potencia</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtPotencia".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->potencia."'value='".$sauInv->resDec[$i]->potencia."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Peso</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtPeso".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->peso."'value='".$sauInv->resDec[$i]->peso."' required>".PHP_EOL;
                 echo "</li>".PHP_EOL;


                 //Aquisição - Idade
                 echo '<li class="list-group-item"><p class="font-italic">Especificações Mecânicas</p>'.PHP_EOL;
                 echo "<div class='input-group'>
                         <div class='input-group-prepend'>".PHP_EOL;
                 echo "<span class='input-group-text'>Motor</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtMotor".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->motor."'value='".$sauInv->resDec[$i]->motor."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Gerador</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtGerador".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->gerador."'value='".$sauInv->resDec[$i]->gerador."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Comando</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtComando".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->comando."'value='".$sauInv->resDec[$i]->comando."' required>".PHP_EOL;
                 echo '<li class="list-group-item">';
                 echo '<span class="badge badge-danger" id="HWsalvaResul'.$sauInv->resDec[$i]->patrimonio.'"></span>'.PHP_EOL;
                 echo "</li>".PHP_EOL;

                 echo "</li>".PHP_EOL;


                // Fim dos dados que preenchem a Modal
                echo '</div>'.PHP_EOL;
                echo '</div>'.PHP_EOL;
                echo '</div>'.PHP_EOL;
                echo '<div class="modal-footer">'.PHP_EOL;
                
                echo "<input class='sau-btn' id='btnSalvaHW".$sauInv->resDec[$i]->patrimonio."' type='submit' value ='Salvar'>".PHP_EOL;
                echo "<input class='sau-btn-dark' id='btnExcluiHW".$sauInv->resDec[$i]->patrimonio."' type='submit' value ='Excluir'>".PHP_EOL;
                echo '<button type="button" class="sau-btn-secondary" data-dismiss="modal" id="btnFecharHW">Fechar</button>
                </div>
                </div>
                </div>
                </div>'.PHP_EOL;


            }
            ?>
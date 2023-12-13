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
        <h2>Inventário de Hardware - Link Voz</h2>
        <ol>
        <li><a href="home.php">Home</a></li>
        <li>Inventário de Hardware - Link Voz</li>
        </ol>
    </div>
    </div>
</section>
<!-- End Breadcrumbs -->


    <!-- Tabela Inventario Basic -->
    <div class="container" style="margin-top:20px;">
    <button type="submit" class="sau-btn" id="btnaddGMG" data-toggle="modal" data-target="#modalHWAddInvDellPC">Adicionar Link de Voz</button>
    <button type="submit" class="sau-btn" id="btnimportGMG" data-toggle="modal" data-target="#modalHWAddInvDellPCImport">Importar XML</button>
    <button type="submit" class="sau-btn" id="btnHWAddInvDellPDF" href="javascript:void(0)">Exportar PDF</button>
    </div>
  <section class="inner-page">
    <div class="container" id="divTable" style="margin-top:-50px">
    <table class="table" id="tblVozBasic" style="text-align:center">
                    <thead class="thead-dark">
                        <th scope="col">Patrimônio</th>
                        <th scope="col">Localização</th>
                        <th scope="col">Operadora</th>
                        <th scope="col">Piloto</th>
                        <th scope="col">DDR</th>
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
                    <h5 class="modal-title" id="modalHWAddInvDellPC">Adicionar Link de Voz</h5>
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
                        <span class='input-group-text'>Operadora</span>
                        <input type='text' class='form-edit' style='width:20%' id='txtOperadora' required>
                        <span class='input-group-text' style='margin-left:20px;'>Tipo</span>
                        <input type='text' class='form-edit' style='width:20%' id='txtTipo' required>
                        </li>
                        
                        <li class="list-group-item"><p class="font-italic">Especificações Técnicas</p>
                        <div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>Circuito</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtCircuito' required>
                         <span class='input-group-text' style='margin-left:20px'>Piloto</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtPiloto' required>
                         <span class='input-group-text' style='margin-left:20px'>DDR</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtDDR' required>
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
                echo '<h5 class="modal-title" id="viewDesktopDellTitle">Inventário Hardware - Link de Voz</h5>'.PHP_EOL;
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

                // Operadora - Tipo
                echo '<li class="list-group-item"><p class="font-italic">Informações do Equipamento</p>'.PHP_EOL;
                echo "<div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Operadora</span>
                        ".PHP_EOL;
                echo "<input type='text' class='form-edit' style='width:20%' id='txtOperadora".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->operadora."' required>".PHP_EOL;
                echo " <span class='input-group-text' style='margin-left:20px;'>Tipo</span>".PHP_EOL;
                echo "<input type='text' class='form-edit' id='txtTipo".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->tipo."' required>".PHP_EOL;
                echo "</li>".PHP_EOL;


                 //Corrente - Potencia - Peso
                 echo '<li class="list-group-item"><p class="font-italic">Especificações Técnicas</p>'.PHP_EOL;
                 echo "<div class='input-group'>
                         <div class='input-group-prepend'>";
                 echo "<span class='input-group-text'>Circuito</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtCircuito".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->circuito."'value='".$sauInv->resDec[$i]->circuito."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Piloto</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtPiloto".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->piloto."'value='".$sauInv->resDec[$i]->piloto."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>DDR</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtDDR".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->ddr."'value='".$sauInv->resDec[$i]->ddr."' required>".PHP_EOL;
                 echo "</li>".PHP_EOL;
                 echo '<li class="list-group-item"><span class="badge badge-danger" id="HWsalvaResul'.$sauInv->resDec[$i]->patrimonio.'"></span></li>'.PHP_EOL;


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
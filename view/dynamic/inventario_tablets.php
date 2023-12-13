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
        <h2>Inventário de Hardware - Tablets</h2>
        <ol>
        <li><a href="home.php">Home</a></li>
        <li>Inventário de Hardware - Tablets</li>
        </ol>
    </div>

    </div>
</section>

<!-- End Breadcrumbs -->

    
    <!-- Tabela Inventario -->
    <div class="container" style="margin-top:20px;">
    <button type="submit" class="sau-btn" id="btnHWAddInvDellPC" data-toggle="modal" data-target="#modalHWAddInvDellPC">Adicionar Computador</button>
    <button type="submit" class="sau-btn" id="btnHWAddInvDellImport" data-toggle="modal" data-target="#modalHWAddInvDellPCImport">Importar XML</button>
    <button type="submit" class="sau-btn" id="btnHWAddInvDellPDF" href="javascript:void(0)">Exportar PDF</button>
    </div>
  <section class="inner-page">
    <div class="container" id="divTable" style="margin-top:-50px">
    <table class="table" id="tblTabletsBasic" style="text-align:center">
                    <thead class="thead-dark">
                        <th scope="col">Patrimônio</th>
                        <th scope="col">Localização</th>
                        <th scope="col">Service Tag</th>
                        <th scope="col">IMEI</th>
                        <th scope="col">Sistema Operacional</th>
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
                    <h5 class="modal-title" id="modalHWAddInvDellPC">Adicionar Dispositivo</h5>
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
                        <span class='input-group-text' style='margin-left:20px'>Usuário</span>
                        <input type='text' class='form-edit' style='width:20%' id='txtUsuario'required>
                        </li><li class="list-group-item"><p class="font-italic">Informações do Equipamento</p><div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Fabricante</span>
                        <input type='text' class='form-edit' style='width:15%' id='txtFab' required>
                        <span class='input-group-text' style='margin-left:20px'>Modelo</span>
                        <input type='text' class='form-edit' style='width:40%' id='txtMod' required>
                        <span class='input-group-text' style='margin-left:20px'>Service Tag</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtST' required>
                        </li>
                        <li class="list-group-item"><p class="font-italic">Hardware e Logística</p>
                        <div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>IMEI</span>
                         <input type='text' class='form-edit' id='txtIMEI' required>
                         <span class='input-group-text' style='margin-left:20px'>Saída</span>
                        <input type='text' class='form-edit' style='width:40%' id='txtSaida' required>
                        <span class='input-group-text' style='margin-left:20px'>Entrada</span>
                        <input type='text' class='form-edit' style='width:40%' id='txtEntrada' required>
                         </li>
                         <li class="list-group-item">
                         <p class="font-italic">Especificações do equipamento</p>
                         <div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>Processador</span>
                         <input type='text' class='form-edit' style='width:30%' id='txtProc' required>
                         <span class='input-group-text' style='margin-left:20px'>Memória</span>
                         <input type='text' class='form-edit' style='width:10%' id='txtMB' required>
                         <span class='input-group-text' style='margin-left:20px'>Disco</span>
                         <input type='text' class='form-edit' style='width:10%' id='txtHD' required>
                         <span class='input-group-text' style='margin-left:20px'>Tela</span>
                         <input type='text' class='form-edit' style='width:10%' id='txtTela' required>
                         </li>
                         <li class="list-group-item"><p class="font-italic">Sistema Operacional e demais informações</p><div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>S.O</span>
                         <input type='text' class='form-edit' style='width:40%' id='txtSO' required>
                         <span class='input-group-text' style='margin-left:20px'>SIMCard</span>
                         <input type='text' class='form-edit' style='width:40%' id='txtSimcard' required>
                         <span class='input-group-text' style='margin-left:20px'>Aquisição</span>
                         <input type='text' class='form-edit' style='width:40%' id='txtAqu' required>
                         </li>
    
                         <li class="list-group-item"><span class="badge badge-danger" id="HWaddDellPC"></span>
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

            
            <?php include './dynamic/import_xml_view.php' ?>


            <!-- INICIA DA MODAL SALVAR, EXCLUIR, FECHAR -->
            <?php 
            for($i=0;$i<count($sauInv->resDec);$i++){ 
                echo "<div class='modal fade' id='viewDesktopDell".$sauInv->resDec[$i]->patrimonio."'tabindex='-1' role='dialog' aria-labelledby='classInfo' aria-hidden='true' style='margin-left: 110px'>".PHP_EOL;
                echo "<div class='modal-dialog modal-lg' role='document'>".PHP_EOL;
                echo "<div class='modal-content'>".PHP_EOL;
                echo '<div class="modal-header">'.PHP_EOL;
                echo '<h5 class="modal-title" id="viewDesktopDellTitle">Inventário Hardware - Tablets</h5>'.PHP_EOL;
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
                echo "<span class='input-group-text' style='margin-left:20px'>Usuário</span>";
                echo "<input type='text' class='form-edit' style='width:20%' id='txtUsuario".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->usuario."' required>".PHP_EOL;
                echo "</li>";

                //Fabicante - Modelo 
                echo '<li class="list-group-item"><p class="font-italic">Informações do Equipamento</p>'.PHP_EOL;
                echo "<div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Fabricante</span>
                        ".PHP_EOL;
                echo "<input type='text' class='form-edit' style='width:15%' id='txtFab".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->fabricante."' required>".PHP_EOL;
                echo "<span class='input-group-text' style='margin-left:20px'>Modelo</span>";
                echo "<input type='text' class='form-edit' style='width:40%' id='txtMod".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->modelo."' required>".PHP_EOL;
                echo "<span class='input-group-text' style='margin-left:20px'>Service Tag</span>".PHP_EOL;
                echo "<input type='text' class='form-edit' style='width:30%' id='txtST".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->servicetag."' required>".PHP_EOL;
                echo "</li>".PHP_EOL;


                 //IMEI - Service Tag
                 echo '<li class="list-group-item"><p class="font-italic">Hardware e Logística</p>'.PHP_EOL;
                 echo "<div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>IMEI</span>
                         ".PHP_EOL;
                 echo "<input type='text' class='form-edit' id='txtIMEI".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->imei."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Saida</span>";
                 echo "<input type='text' class='form-edit' style='width:40%' id='txtSaida".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->saida."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Entrada</span>";
                 echo "<input type='text' class='form-edit' style='width:40%' id='txtEntrada".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->entrada."' required>".PHP_EOL;
                 echo "</li>".PHP_EOL;

                 //Processador - Memória, Disco , Tela
                 echo '<li class="list-group-item"><p class="font-italic">Especificações do equipamento</p>'.PHP_EOL;
                 echo "<div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>Processador</span>
                         ".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:30%' id='txtProc".$sauInv->resDec[$i]->patrimonio."'". "value='".$sauInv->resDec[$i]->processador."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Memória</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:10%' id='txtMB".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->memoria."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Disco</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:10%' id='txtHD".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->disco."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Tela</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:10%' id='txtTela".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->tela."' required>".PHP_EOL;
                 echo "</li>".PHP_EOL;

                 //Sistema Operacional - Simcard - Aquisição
                 echo '<li class="list-group-item"><p class="font-italic">Sistema Operacional e demais informações</p>'.PHP_EOL;
                 echo "<div class='input-group'>
                         <div class='input-group-prepend'>
                         <span class='input-group-text'>S.O</span>
                         ".PHP_EOL;
                         echo "<input type='text' class='form-edit' style='width:40%' id='txtSO".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->sistemaoperacional."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>SIMCard</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:40%' id='txtSimcard".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->simcard."' required>".PHP_EOL;
                 echo "<span class='input-group-text' style='margin-left:20px'>Aquisição</span>".PHP_EOL;
                 echo "<input type='text' class='form-edit' style='width:40%' id='txtAqu".$sauInv->resDec[$i]->patrimonio."'value='".$sauInv->resDec[$i]->aquisicao."' required>".PHP_EOL;
                 echo "</li>".PHP_EOL;

                 echo '<li class="list-group-item">';
                 echo '<span class="badge badge-danger" id="HWsalvaResul'.$sauInv->resDec[$i]->patrimonio.'"></span>'.PHP_EOL;
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
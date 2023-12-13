<?php

// Conexão PDO com o DB
require_once '../controller/PDOClass.php';
// HTML Head
include './dynamic/head.php';

// Verifica se o Usuário tem permissão de Administrador
include '../controller/adminAuth.php';
$admin = new permissaoUsuario;
$admin->verPermissao();

?>



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

        <div class="d-flex justify-content-between align-items-center">
          <h2>Inventário TI</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Inventário</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container" style="margin-top:-50px; margin-left:auto; margin-right:auto;">
        <select class="form-select btn btn-dark" aria-label="Selecione a Localidade">
        <option selected>Selecione a Localidade</option>
        <?php

        // Futuramente realizar uma Requisição AJAX para coletar os dados
        // Essa requisição atual é pra demonstrar o funcionamento do Projeto
        $fileLocalidade = file_get_contents('http://docs.spacecom.com.br/beta/sau/controller/inventarioLocalizacao.php');
        $fileDecode = json_decode($fileLocalidade);
         

        for($i=0;$i<count($fileDecode);$i++){

            echo '<option value='.$fileDecode[$i]->localizacao.'>'.$fileDecode[$i]->localizacao.'</option>';


        }
       

        ?>
        </select>

        <select class="form-select btn btn-dark" aria-label="Selecione a Localidade">
        <option selected>Selecione o Inventário</option>
        <option value="1">Desktops Dell</option>
        <option value="2">Desktops</option>
        <option value="3">Notebooks Dell</option>
        <option value="4">Notebooks</option>
        <option value="5">Rede</option>
        <option value="6">Nobreaks</option>
        <option value="7">Tablets</option>
        </select>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './dynamic/footer.php'?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

 <?php include './dynamic/scripts.php'?>

</body>

</html>
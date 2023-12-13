<?php

/* Verifica se o usuário tem permissão administradora */
include '../controller/dir_inc.php';
include DIR_INC.'/controller/adminAuth.php';
$admin = new permissaoUsuario;
$admin->verPermissao();

// Head da View //
include './dynamic/head.php';

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
          <h2>Atividades Registradas</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Atividades</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

     <?php include './dynamic/atividades_tbl.php'?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './dynamic/footer.php'?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

 <?php include './dynamic/scripts.php'?>

</body>

</html>
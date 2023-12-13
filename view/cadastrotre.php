<!DOCTYPE html>
<html lang="en">

<?php 
include './dynamic/head.php';
include '../controller/treAuth.php';
$permissao = new treAuth;

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
          <h2>Cadastro de Usuário</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Cadastro</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
        <?php


                /* 
                Caso tenha permissão, retorna o Include da página,
                Caso não tenha permissão, retorna a mensagem de erro que foi setada!
                */
                if($permissao->verPermissao() === true){

                    include './dynamic/cadastrar_tre.php';

                } else {

                    echo $permissao->verPermissao();

                }

                ?>
        </p>
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

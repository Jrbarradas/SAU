
<?php 
include './dynamic/head.php';
include '../controller/toolsAuth.php';
$usuario = new toolsAuth;
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
          <h2>SAU</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>SAU</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
            <?php
            /*
             View Home dinamica, de acordo com a permissão do Usuário 
             Caso seja treinamento, abre a view de Provas, caso contrário,
             abre a view Home 'Normal'
            */

            $dir = '../provas_json/';
            $chaveDB = $_SESSION['usuario_logado'];
            $file = $dir.$chaveDB.'.json';
            if($usuario->arrJson->permissao == 4){
            if(file_exists($file)){
            include './dynamic/provafinalizada.php';
            }else {
            include './dynamic/provas.php';
            }
            }else if($usuario->arrJson->permissao == 3){
            include './dynamic/provas_realizadas.php';
            }else {
            include './dynamic/home-sau.php';
            }

        ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './dynamic/footer.php'?>
  <?php include './dynamic/scripts.php'?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

</html>
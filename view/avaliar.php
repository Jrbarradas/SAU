<!DOCTYPE html>
<html lang="en">

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
          <h2>Avaliação - Treinamento</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Survey</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- Verifica se o Usuário tem Permissão para acessar a View -->
        <?php

        if($usuario->arrJson->permissao == 4){
        }else{
            echo "<center>";
            echo "<br>ERRO : Usuário não autorizado!<br>";
            echo "Você não tem permissão para acessar esse conteudo!<br>";
            echo "IP : ".$_SERVER['REMOTE_ADDR'].'<br>';
            echo "PORT : ".$_SERVER['REMOTE_PORT'].'<br>';
            echo "</center>";
            die;
        }

        /* Verifica se o usuário já realizou a Survey, caso já tenha realizado, a view será alterada para a de conclusão da Survey*/

        $dir = '../ava_json/';
        $chaveDB = $_SESSION['usuario_logado'];
        $file = $dir.$chaveDB.'.json';
        
        if(file_exists($file)){

          include '../view/dynamic/survey.php';

        } else {

          include '../view/dynamic/avaliar.php';
        }
        
    ?>
                  


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './dynamic/footer.php'?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

 <?php include './dynamic/scripts.php'?>

</body>

</html>
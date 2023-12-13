<!DOCTYPE html>
<html lang="en">
<?php 
include './dynamic/head.php';
include '../controller/treAuth.php';
$permissao = new treAuth;

if($permissao->verPermissao() === true){
 // Permissão OK, tem acesso
} else {
  echo $permissao->verPermissao();
}
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
          <h2>Surveys - Treinamento</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Surveys</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
      <style>
    #cont{
        margin-top:-40px;
        margin-left:-40px;
        margin-right:-40px;
    }
    </style>

    <div id="cont">
    <table class="table" id="tableAvaliacoes">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Usuário</th>
        <th scope="col">Status</th>
        <th scope="col">Data</th>
        <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tbody>
    </table>
    </tbody>
    </table>
    </div>

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
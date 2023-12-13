<!DOCTYPE html>
<html lang="en">

<?php 
include './dynamic/head.php';
// Verifica se o Usuário tem permissão Administrador
// Caso não tenha, não exibe a página, nem via URL;
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

        <div class="d-flex justify-content-between align-items-center" style="margin-top:0px">
          <h2>Usuários Cadastrados</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Usuários</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    <section class="inner-page">
    <div class="container" style="margin-top:-50px;">
    <button type="submit" class="sau-btn" id="btnCadUsuario" data-toggle="modal" data-target="#cadUserModal">Cadastrar Usuário</button>
    <button type="submit" class="sau-btn" id="btnUsuariosPDF" href="javascript:void(0)">Exportar PDF</button>
    </div>
      <div class="container" style="margin-top:0px">
        <p>
          <?php include './dynamic/editar_users.php' ?>
        </p>
      </div>
    </section>

    <!-- Modal  Edita Usuário-->
    <div class="modal fade" id="visualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="visualizarUsuarioLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="visualizarUsuarioLabel">Informações do Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="postResul">

          </div>
          <div class="modal-footer">
            <button type="button" id="salvaUsuario" class="sau-btn">Salvar</button>
            <button type="button" class="sau-btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" id="excluiUsuario" class="sau-btn-dark">Excluir</button>
          </div>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './dynamic/footer.php'?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

 <?php include './dynamic/scripts.php'?>



</body>


</html>
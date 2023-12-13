<?php 
include './dynamic/head.php';
include '../controller/toolsAuth.php';
// Faz a requisição para atualizar o STATUS da Tarefa antes da DataTable ser gerada!
$usuarioSession = $_SESSION['usuario_logado'];
// Trocar para AJAX 
$atualizaTarefas = shell_exec("curl http://sau.spacecom.com.br/sau/view/scripts/atualizaTask.php?user=$usuarioSession");
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
          <h2>Tarefas Abertas</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Tarefas</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container" id="tblTabertas" style="margin-top:-50px">
        <p>
          <?php include './dynamic/task_users.php' ?>
        </p>
      </div>
    </section>

    <!-- Modal Tasks -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
          <div class="container" id="conteudoTask">
          ...
          </div>
          <div class="container" id="comentarioTask">
          <textarea name="comentario" class="form-control" id="comentario" autocomplete="off" autofocus required></textarea>
          </div>
          <div class="modal-footer">
            <div class="container" id="uploadImagem">
            <input style="margin-left:450px" type="file" id="file" name="fileUpload" />
            </div>
            <span style="margin-left:-50px" class="badge badge-danger" id="returnUpload"></span>
            <span class="badge badge-danger" id="returnRedmine"></span>
            <span class="badge badge-danger" id="returnPDF"></span>
            <button type="button" id="btnOS" class="sau-btn-green">Ordem de Serviço</button>
            <button type="button" id="btnComentario" class="sau-btn">Enviar</button>
            <button type="button" class="sau-btn-secondary">Salvar</button>
            <button type="button" class="sau-btn-dark" data-dismiss="modal" aria-label="Close">Fechar</button>
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


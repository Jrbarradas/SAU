<?php 
include './dynamic/head.php';
// Verifica se o Usuário tem permissão Administrador
// Caso não tenha, não exibe a página, nem via URL;
include '../controller/toolsAuth.php';

  class verificaPermissao extends toolsAuth{
      // Chamando constructor da classe toolsAuth
      public function __constructor(){
        parent::__constructor();
      }
      // Verifica Permissão do Usuário, caso não tenha acesso exibe a error_page
      public function _verificaPermissao(){ 
        $this->__constructor();
        if($this->arrJson->permissao == 2 || $this->arrJson->permissao == 5){
          return true;
        }else{
          include 'error_page.php';
          die;
        }
      }
  }

  $sauCentral = new verificaPermissao;
  $sauCentral->_verificaPermissao();



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
          <h2>Desktop Viewer</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Desktop Viewer</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container" style="margin-top:-50px">
        <p>
        <table class="table" id="tableCentral" style="text-align:center">
         <thead class="thead-dark">
        <tr>
        <th scope="col">TOKEN</th>
        <th scope="col">PA</th>
        <th scope="col">Nome</th>
        <th scope="col">Observação</th>
        <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        </tbody>
        </table>
        </tbody>
        </table>
        </p>
        </div>
    </section>

    <!-- Modal Desktop Viewer -->
    <div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="centralModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document" style="margin-left:330px; margin-top: -2px;">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Desktop Viewer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <div class="modal-body">
          <div class="container" id="conteudoCentral">
          <!--include './central_view.php' -->
          </div>
          </div>
          <div class="modal-footer">
            <span class="badge badge-danger" id="returnDownload"></span>
            <a href="__blank" id="downloadSAU" style="text-decoration:none; color:#fff;" class="sau-btn" download>Salvar Print</a>
            <button type="button" class="sau-btn-secondary" data-dismiss="modal" aria-label="Close">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Editar Informações-->
<div class="modal fade" id="DVModal" tabindex="-1" role="dialog" aria-labelledby="DVModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DVModalLabel">Editar Informações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container" id="conteudoEditarCentral">
          <!--include './central_editar.php' -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="sau-btn" id="btnCentralEditar">Salvar</button>
        <button type="button" class="sau-btn-dark" id="btnCentralExcluir">Excluir</button>
        <button type="button" class="sau-btn-secondary" data-dismiss="modal">Fechar</button>
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
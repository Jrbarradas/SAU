<!-- Modal Editar Perfil -->
<div class="modal fade" id="editarPerfil" tabindex="-1" role="dialog" aria-labelledby="editarPerfilLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarPerfilLabel">Editar Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- INICIA FORM EDITAR PERFIL -->
        <form class="form-horizontal center-block" id="formEdita">
      <div class="form-group" >
        <label class="control-label col-sm-2" for="txtNome">Nome:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtNomeEdita" value="<?php $usuario->mostraNome();?>" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="txtEmail">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="txtEmailEdita" value="<?php $usuario->mostraEmail();?>" name="txtEmail" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="txtPass">Senha:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="txtPassEdita" name="txtPass" required>
        </div>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
        </div>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <span class ="badge badge-danger" id=editarResul></span>
        </div>
        <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
        </div>
      </div>
      </form>
      <!-- FIM FORM EDITAR PERFIL -->
      </div>
      <div class="modal-footer">
        <button type="button" class="sau-btn" id="btnDados">Salvar</button>
        <button type="button" class="sau-btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- FIM Model Editar Perfil -->


<!-- Footer -->
<footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Spacecomm Monitoramento S/A</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
      </div>
    </div>
  </footer>


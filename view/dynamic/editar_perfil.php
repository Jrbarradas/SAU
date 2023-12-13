<?php

// View do Editar Perfil

$usuario = new toolsAuth;
$usuario->__constructor();


?>

<form class="form-horizontal center-block" id="formEdita">
    <div class="form-group" style="margin-top:-60px">
      <label class="control-label col-sm-2" for="txtNome">Nome:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="txtNome" placeholder="<?php $usuario->mostraNome();?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="txtEmail">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="txtEmail" placeholder="<?php $usuario->mostraEmail();?>" name="txtEmail" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="txtPass">Senha:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="txtPass" name="txtPass" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="sau-btn" id="btnDados">Alterar Dados</button>
        <span class ="badge badge-danger" id=editarResul></span>
        <br>
        <br>
        </br>
      </div>
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      </div>
    </div>
    </form>

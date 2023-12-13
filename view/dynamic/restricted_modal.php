<?php

include '../../controller/toolsAuth.php';
$permissaoUser = new toolsAuth;
$permissaoUser->__constructor();
if($permissaoUser->arrJson->permissao == 2){
  // Busca Inventário 
  include 'modal_busca_inv.php';
}
?>


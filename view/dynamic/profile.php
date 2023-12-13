<?php

$usuario = new toolsAuth;
$usuario->__constructor();

?>
<div class="profile">
        
        <img src="assets/img/avataaars.svg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="home.php"><?php $usuario->mostraNome(); ?></a></h1>
</div>
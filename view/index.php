<html>

<?php
session_start();
/*
 Basicamente verifica se o usuário já realizou o login e tem uma SESSION setada.
 Caso haja uma session setada, redireciona para a view Home, caso não, exibe o form de login.
 É necessário uma classe independente da AuthSession, para não causar um looping de SESSIONS
 */
class sessionLogin{

    public function existeSession(){
        if(isset($_SESSION['usuario_logado'])){
            $this->session = $_SESSION['usuario_logado'];
            $this->dirFile = '../db_json/'.$this->session.'.json';
            switch(file_exists($this->dirFile)){
                case true:
                echo "<script>window.location.replace('./home.php');</script>";
                break;
    
            }

        } 

    }

}

$login = new sessionLogin;
$login->existeSession();

include './dynamic/head.php';

?>

<body>

    <!-- CSS LOGIN -->
    <link href="assets/css/ztrax.css" rel="stylesheet">
    <link href="assets/css/emp.css" rel="stylesheet">

	<style type="text/css">
		body {
			background-color: #485461;
			background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
		}
	</style>

	<!-- FIM CSS LOGIN -->


<div id='content' class='outer' style="height: 10em; align-items: center; margin-top:auto; margin-left:auto; margin-right:auto;">
			<div class="middle">
				 <div class="inner form-horizontal center-block">
					<div class="container center-block"  style="width: 260px;">

						<div style="text-align: center">
							<img alt="Logotipo" src="./assets/images/sau.png" class="img-fluid" alt="Responsive image"/>
							<br/><br/>
						</div>

						<div class="form-group loginForm" style="margin-top:-30px;">
							<input  type="text" placeholder="Usuário" id="usuario" name="usuario" class="ztrax-input" autocomplete='off' required/>
						</div>

						<div class="form-group loginForm">
							<input type="password" placeholder="Senha" id="senha" name="senha" class="ztrax-input"  autocomplete='off' required/>
						</div>

						<div class="form-group">
							<button  id="btnLogar" type="submit" class="btn btn-danger center-block" style="width: 120px;">Entrar</button>
						</div>

						
						<div class="form-group" style='height: 30px; text-align: center;'>
							<div id='msgError' class='text-danger'></div>
                            <span class="badge badge-danger" id="msgLogin"></span>
						</div>

					</div>
				</div>
			</div>

		</div>
        </body>
		<?php 
		include './dynamic/scripts.php';
		?>
</html>
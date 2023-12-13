<!doctype html>


<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
  crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="Boot\bootstrap-4.1.2-dist\css/personalizado.css">
  <link rel="shortcut icon" href="..\Fotos/favicon.ico" />
  


  <title>Componentes, Problema ocorre apos procedimentos e não apresenta LED</title>
</head>

<body>
  <!-- Barra de Menu -->
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" onclick="paginaInicial()" href="#">Página Inicial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="Sobre()" href="#">Sobre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="Sair()" href="#">Sair</a>
      </li>
    </ul>
  </div>
</nav>


<h1 class="display-3">
  <center>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Componentes</h1>
        <p class="lead">Procedimentos Realizados:</p>
      </div>
    </div>
  </center>
</h1>

<!--Texto Agrupado -->

<div style="margin-top: 60px " class="list-group">
  <button type="button" class="list-group-item">Feito teste da peça com defeito em outro computador, problema persiste.</button>
  <button type="button" class="list-group-item">Feito a troca de pilha ou carregador, problema persiste.</button>
  <button type="button" class="list-group-item">Verificado Componente não apresenta LED.</button>
</div>
<center>

  <div style="margin-top: 100px" class="form-group">
    <label for="comment">
      <h6>
        Escreva no campo abaixo todas as observações, informando se houve danos físicos, derramamento líquido, ou procedimentos não
        realizados.
      </h6>
    </label>
    <textarea class="form-control" rows="5" id="comment">
Procedimentos Realizados (Protocolo 020):
- Feito teste da peça com defeito em outro computador;
- Verificado problema persiste;
- Feito a troca de pilha ou carregador, problema persiste;
- Verificado todas as funções da peça estão com defeito;
- Verificado Componente não apresenta LED;        
    </textarea>
  </div>

</center>

<!-- BOTÃO COPY-->
<div style="margin-top: -10px">
  <button style="margin-left: 05px" onclick="copiarTexto()" class="btn btn-default" data-toggle="btnCopy" data-popout="true">Copy</button>



  <script>

    //campo para copiar
    function copiarTexto() {

      var campoTexto = document.getElementById("comment").select();

      document.execCommand("Copy");
      //alert("Texto Copiado: " + textoCopiado.value);  
    }


    function abrirRedmine() {
      window.open('http://redmine.spacecom.com.br/projects/protocolos/issues/new');
    }
  </script>
  <div>

    <center>
      <div style="margin-top: 40px">
        <button onclick="abrirRedmine()" class="btn btn-default" data-toggle="confirmation" data-popout="true"> Abrir Redmine </button>
        <button onclick="voltar()" class="btn btn-default" data-toggle="btnNao" data-popout="true">Voltar</button>
        <button onclick="SairBotao()" class="btn btn-default" data-toggle="confirmation" data-popout="true"> Sair </button>
        <script> function SairBotao() { window.open('../login.html'); window.close();} </script>
        <script>   function voltar() { javascript: window.history.go(-1) }   </script>
      </div>
    </center>

    <div style="margin-top: 50px">
      <button style="margin-left: 20px" type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top"
      title="Tooltip on top">
      Procotolo 020
    </button>
  </div>

  <div style="margin-top: 75px">


  </div>

  <script>
    function paginaInicial() {
      window.open('../index.html');
      window.close();
    }

    function Sair() {
      window.open('../login.html');
      window.close()
    }

    function Sobre() {
      window.open('../Sobre.html');
    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
  crossorigin="anonymous"></script>
</body>

</html>
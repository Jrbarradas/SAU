<?php

include './dynamic/head.php';
include '../controller/treAuth.php';

    class avaliacaoEntregue extends treAuth{

        private $id;
        private $dir_ava;
        private $format_ava;
        private $file_ava;
        private $file_arr;
        public $file_json;
        public $rating;
        public $opiniao;

            public function __constructor(){
                $this->id = filter_input(INPUT_GET,'id');
                $this->dir_ava = '../ava_json/';
                $this->format_ava = '.json';
                $this->file_ava = $this->dir_ava.$this->id.$this->format_ava;
            }

            public function exibeAvaliacao(){

                if($this->id <> null){
                    if(file_exists($this->file_ava)){
                        // Realiza a abertura do "DB", joga em uma array e depois converte em JSON
                        $this->file_arr = file_get_contents($this->file_ava);
                        $this->file_json = json_decode($this->file_arr);
                        // Armazena os ratings
                        $this->rating[0] = base64_decode($this->file_json->ratingGeral);
                        $this->rating[1] = base64_decode($this->file_json->ratingTeoria);
                        $this->rating[2] = base64_decode($this->file_json->ratingCarga);
                        $this->rating[3] = base64_decode($this->file_json->ratingIns);
                        $this->rating[4] = base64_decode($this->file_json->ratingApostila);
                        $this->rating[5] = base64_decode($this->file_json->ratingInfo);
                        // Armazena as opiniões
                        $this->opiniao[0] = base64_decode($this->file_json->opiniaoGeral);
                        $this->opiniao[1] = base64_decode($this->file_json->opiniaoTeoria);
                        $this->opiniao[2] = base64_decode($this->file_json->opiniaoCarga);
                        $this->opiniao[3] = base64_decode($this->file_json->opiniaoIns);
                        $this->opiniao[4] = base64_decode($this->file_json->opiniaoApostila);
                        $this->opiniao[5] = base64_decode($this->file_json->opiniaoInfo);

                        /*
                        for($i=0;$i<count($this->rating);$i++){

                            echo "Rating : ". strip_tags($this->rating[$i]).'<br>';
                            echo "Opinião : ". strip_tags($this->opiniao[$i]).'<br>';

                        }
                        */


                    }else{
                        echo "<script>alert(\"$this->id : A avaliação não foi encontrada\")</script>";
                        echo "<script>
                        setTimeout(function(){
                            location.href = \"avaliacoes.php\";
                      
                         }, 1000);
                        </script>";
                    }

                } else {
                    echo "<script>alert(\"$this->id : A avaliação não foi encontrada\")</script>";
                    echo "<script>
                        setTimeout(function(){
                            location.href = \"avaliacoes.php\";
                      
                         }, 1000);
                        </script>";
                }
            }

    }


    $ava_db = new avaliacaoEntregue;
    // Verifica a permissão do Usuário
    if($ava_db->verPermissao() === true){
        $ava_db->__constructor();
        $ava_db->exibeAvaliacao();
    } else {
        echo $ava_db->verPermissao();
        die;
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
          <h2>Surveys Treinamento</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Surveys Treinamento</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>

<div class="subject" style="margin-top:-50px">

                        <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Estado</th>
                            <th scope="col">Data de Entrega</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Protocolo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Finalizada</td>
                            <td><?php echo $ava_db->file_json->data;?></td>
                            <td><?php echo $ava_db->file_json->usuario;?></td>
                            <td><?php echo $ava_db->file_json->acao;?></td>
                            </tr>
                        </tbody>
                        </table>
                                    <table class="table">
                                            <?php
                                            // Enunciado das questões já formatado
                                            $arrQuestions[0] = "1. De forma geral, como você avalia o treinamento? Por quê?";
                                            $arrQuestions[1] = "2. Qual sua opinião sobre a forma como as aulas foram conduzidas entre teoria e prática? Por que?";
                                            $arrQuestions[2] = "3. Você sentiu que a carga horária foi suficiente para o aprendizado? ";
                                            $arrQuestions[3] = "4. Os instrutores têm conhecimento do assunto? Por quê?";
                                            $arrQuestions[4] = "5. A apostila expõe o treinamento de forma clara? Por quê?";
                                            $arrQuestions[5] = "6. Ainda sem a prática do dia-a-dia, você considera que as informações do treinamento foram suficientes para início das atividades? Por quê?                                            ";
                                            $arrQuestions[6]= null;

                                            // Exibe as questões da prova e as respostas do aluno
                                            for($i=0;$i<count($ava_db->rating);$i++){

                                                echo "<thead class='thead-light'>
                                                <tr>";

                                                echo"<th scope='col' style='text-align:center'>";
                                                echo $arrQuestions[$i];
                                                echo"</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>";
                                                echo"<td class='bg-light'>";
                                                echo "Rating: ". $ava_db->rating[$i]."<br>";
                                                echo "Opinião: ". $ava_db->opiniao[$i];
                                                echo"</td>";
                                                echo"<tr>";
                                            }
                                            ?>
                        
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
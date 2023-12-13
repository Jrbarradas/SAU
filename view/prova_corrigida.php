<?php

include './dynamic/head.php';
include '../controller/treAuth.php';


        class provaCorrigida extends treAuth{
               
                // Dados antes da correção
                public $status;
                public $data;
                public $usuario;
                public $resposta;
                public $conJson;
                public $arq;
                private $dirAntes;
                private $fileAntes;
                // Dados após correção
                public $provaId;
                private $dirId;
                private $formatId;
                private $fileProva;
                public $depJson;
                public $depArq;

                // Coleta o ID da prova 
                // Seta os dados para verificação se a prova foi corrigida
                public function __constructor(){
                    // Depois da correção
                    $this->provaId = filter_input(INPUT_GET,'id');
                    $this->dirId = '../provas_json/corrigidas_json/';
                    $this->formatId = '.json';
                    $this->fileProva = $this->dirId.$this->provaId.$this->formatId;
                }

                // Verifica se o ID é válido, caso não seja, retorna erro
                private function verID(){
                    if($this->provaId <> null){
                        // Verifica se a prova já foi corrigida, caso não tenha sido, retorna erro
                        if(file_exists($this->fileProva)){
                        return true;
                        }else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }

                public function exibeProva(){
                    if($this->verID() === true){    

                         // Antes da correção
                        $this->dirAntes = '../provas_json/';
                        $this->fileAntes = $this->dirAntes.$this->provaId.$this->formatId;
                        $this->arq = file_get_contents($this->fileAntes);
                        $this->conJson = json_decode($this->arq);
                        // Coleta de Dados da Prova
                        $this->status = $this->conJson->status;
                        $this->data = $this->conJson->data;
                        $this->usuario = $this->conJson->usuario;
                        // Coleta das respostas da Prova
                        $this->resposta[0] = base64_decode($this->conJson->questao_1);
                        $this->resposta[1] = base64_decode($this->conJson->questao_2);
                        $this->resposta[2] = base64_decode($this->conJson->questao_3);
                        $this->resposta[3] = base64_decode($this->conJson->questao_4);
                        $this->resposta[4] = base64_decode($this->conJson->questao_5);
                        $this->resposta[5] = base64_decode($this->conJson->questao_6);
                        $this->resposta[6] = base64_decode($this->conJson->questao_7);
                        // Coleta do comentario feito na correção
                        $this->depArq = file_get_contents($this->fileProva);
                        $this->depJson = json_decode($this->depArq);
                        
                        
                    } else {
                        echo "ERRO : A prova informada não existe!";
                        echo "<script>window.location.href='./home.php'</script>";
                    }
                }




        }
        


        // Verifica a Permissão
        // Caso esteja OK, seta os atributos pelo Constructor
        // E após isso, exibe a prova
        $provaCorrigida = new provaCorrigida;
        if($provaCorrigida->verPermissao() === true){
            $provaCorrigida->__constructor();
            $provaCorrigida->exibeProva();
        } else {
            echo $provaCorrigida->verPermissao();
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
          <h2>Provas Corrigidas</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Provas Corrigidas</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
        
                <!--
                $this->id = $this->conJson->acao;
                $this->usuario = $this->conJson->usuario;
                $this->data = $this->conJson->data;
                $this->status = $this->conJson->status;
                -->          
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
                            <td><?php echo $provaCorrigida->status;?></td>
                            <td><?php echo $provaCorrigida->data;?></td>
                            <td><?php echo $provaCorrigida->usuario;?></td>
                            <td><?php echo $provaCorrigida->provaId;?></td>
                            </tr>
                        </tbody>
                        </table>
                                    <table class="table">
                                            <?php
                                            // Enunciado das questões já formatado
                                            $arrQuestions[0] = "
                                            I. Perfil de monitorados – Ferramenta que permite agrupar monitorados que compartilham uma característica.
                                            <br>II. Não é obrigatório selecionar o estabelecimento no cadastro do monitorado.
                                            <br>III. O ideal é cadastrar as áreas individuais antes da instalação e ativação do equipamento no monitorado.
                                            <br>Assinale a alternativa correta
                                            <br>A - Nenhuma está correta
                                            <br>B - Somente I está correta
                                            <br>C - Todas estão corretas
                                            <br>D - I e 3 estão Corretas
                                            ";
                                            $arrQuestions[1] = "
                                            A localização é obtida através do ______ a cada minuto e transmitida para os servidores do SAC24 pela rede _________.______
só serão finalizadas quando o equipamento recuperar a comunicação.
                                            <br>Assinale a alternativa que preenche as lacunas:
                                            <br>A - Chamadas de contato, GPRS e GPS
                                            <br>B - GPS, GPRS e Áreas individuais
                                            <br>C - GPS, GPRS e chamadas de contato
                                            <br>D - GPRS, GPS e chamadas de contato
                                            ";
                                            $arrQuestions[2] = "
                                            Em relação ao estoque assinale a opção incorreta:
                                            <br>A - Só é possível ativar o monitorado caso o equipamento esteja no mesmo estabelecimento
                                            <br>B - Para realizar a ativação do monitorado o status do equipamento tem que estar classificado como “estoque”.
                                            <br>C - Podemos alterar o status de todos os equipamentos relacionados no inventário.
                                            <br>D - É impossível alterar o status de qualquer equipamento que esteja ativo.
                                            ";
                                            $arrQuestions[3] = "
                                            Ocorreu um assalto em uma padaria nas proximidades da Praça do Japão, bairro do Batel, e precisamos verificar quais monitorados estavam presentes neste local no momento em que ocorreu o crime. <br>Qual ferramenta do sistema sac24 nos permite fazer a verificação?
                                            ";
                                            $arrQuestions[4] = "
                                            Explique a diferença entre o sinal de GPS e GPRS.
                                            ";
                                            $arrQuestions[5] = "
                                            Descreva o procedimento de instalação da TZPR.
                                            ";
                                            $arrQuestions[6]=
                                            "
                                            Como podemos verificar as operadoras dos simcards dos dispositivos.
                                            ";

                                            // Exibe as questões da prova e as respostas do aluno
                                            for($i=0;$i<count($provaCorrigida->resposta);$i++){

                                                echo "<thead class='thead-light'>
                                                <tr>";

                                                echo"<th scope='col' style='text-align:center'>";
                                                echo "Questão : ". ($i+1). "<br>". $arrQuestions[$i];
                                                echo"</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>";
                                                echo"<td class='bg-light'>";
                                                echo "Resposta do Aluno: ". $provaCorrigida->resposta[$i];
                                                echo"</td>";
                                                echo"<tr>";
                                            }
                                            ?>
                                            <!--
                                            <thead class="thead-dark">
                                                <tr>
                                                <th scope="col" style="text-align:center">Descriçao</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>X</td>
                                            <tr>

                                            </tbody>
                                            </table>
                                            -->
                                            
                                            <table class="table" style="margin-top:-10px;">
                                            <thead class="thead-dark">
                                                <tr>
                                                <th scope="col" style="text-align:center">Comentários</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td class="bg-light">
                                                   
                                                 <?php echo $provaCorrigida->depJson->comentario;?>
                                             
                                            </td>
                                            </tbody>
                                            </table>
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
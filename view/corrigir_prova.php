<?php 
include './dynamic/head.php';
include '../controller/treAuth.php';
 

// Classe responsável pela exibição da prova realizada...
  class provaRealizada extends treAuth{ 
    /* 
    É passado o ID da prova, diretório onde está armazenada e o formato
    Estas informações são setadas no constructor da classe 
    */
    public $id;
    private $dir;
    private $format;
    private $prova;
    private $convertFile;
    private $convertJson;
    // Variáveis Públicas, serão usadas para consulta direta
    public $usuario;
    public $data;
    public $resposta;
    public $status;
    

        // Set dos atributos informados acima
        public function __constructor(){
            $this->id = filter_input(INPUT_GET,'id');
            $this->dir = '../provas_json/';  
            $this->format = '.json';
            $this->prova = $this->dir.$this->id.$this->format;
        }

        // Verifica se a prova Existe 
        private function verProva(){
            if(file_exists($this->prova)){
                return true;
            }else{
                return false;
            }
        }

        //Exibe os dados da prova
        public function exibeProva(){
            if($this->verProva() === true){
                //Abre a prova numa Array e depois converte em um JSON
                $this->convertFile = file_get_contents($this->prova);
                $this->convertJson = json_decode($this->convertFile);
                //Set dos dados gerais da prova
                $this->id = $this->convertJson->acao;
                $this->usuario = $this->convertJson->usuario;
                $this->data = $this->convertJson->data;
                $this->status = $this->convertJson->status;
                //Set das respostas informadas
                $this->resposta[0] = base64_decode($this->convertJson->questao_1);
                $this->resposta[1] = base64_decode($this->convertJson->questao_2);
                $this->resposta[2] = base64_decode($this->convertJson->questao_3);
                $this->resposta[3] = base64_decode($this->convertJson->questao_4);
                $this->resposta[4] = base64_decode($this->convertJson->questao_5);
                $this->resposta[5] = base64_decode($this->convertJson->questao_6);
                $this->resposta[6] = base64_decode($this->convertJson->questao_7);
                

            } else {
                echo "Erro, a prova informada não existe ou não foi localizada!";
                echo "<script>window.location.href='./home.php'</script>";
            }
        }

}

        // Verifica a Permissão
        // Caso esteja OK, seta os atributos pelo Constructor
        // E após isso, exibe a prova
        $provaInformada = new provaRealizada;
        if($provaInformada->verPermissao() === true){
            $provaInformada->__constructor();
            $provaInformada->exibeProva();
        } else {
            echo $provaInformada->verPermissao();
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
          <h2>Provas Realizadas</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Provas Realizadas</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
        
                <!--
                $this->id = $this->convertJson->acao;
                $this->usuario = $this->convertJson->usuario;
                $this->data = $this->convertJson->data;
                $this->status = $this->convertJson->status;
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
                            <td><?php echo $provaInformada->status;?></td>
                            <td><?php echo $provaInformada->data;?></td>
                            <td><?php echo $provaInformada->usuario;?></td>
                            <td><?php echo $provaInformada->id;?></td>
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
                                            for($i=0;$i<count($provaInformada->resposta);$i++){

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
                                                echo "Resposta do Aluno: ". $provaInformada->resposta[$i];
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
                                            
                                            <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                <th scope="col" style="text-align:center">Comentários</th>
                                                </tr>
                                                <div id="conteudo">                    
                                                </div>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                            <textarea name="provaComentario" class="form-control" id="provaComentario" autocomplete="off" autofocus required></textarea>
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $provaInformada->id ?>" autocomplete="on">
                                            <center><button type="submit" class="sau-btn" id="btnCorrigir" style="margin-top:10px;">Corrigir</button></center>
                            </div>
                            </div>
                        </section>
                        

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './dynamic/footer.php'?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

 <?php include './dynamic/scripts.php'?>

 <script>
                            $('#btnCorrigir').on('click', function(){
                            let dadosCorrecao = {
                                id : $("#id").val(),
                                provaComentario: $("#provaComentario").val()
                            }
                            $('#conteudo').load('../controller/correcaoClass.php',{id:dadosCorrecao.id,provaComentario:dadosCorrecao.provaComentario});
                            });
                            </script>

</body>

</html>
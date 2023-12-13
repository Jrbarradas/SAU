<?php

class viewUser{
  
  // Variáveis Utilizadas na consulta
  static private $usuario;
  static private $urlJSON;
  protected $decodeJSON;
  public $url;
  
  /*
  Set das Variáveis
  usuario = armazena value id do botão
  urlJSON =  armazena a URL com os usuários cadastrados
  url = armazena a URL final já com o id do usuário ao qual foi clicado no botão
  */
  protected function __constructor(){
    self::$usuario = filter_input(INPUT_GET,'usuario');
    self::$urlJSON = file_get_contents("http://sau.spacecom.com.br/sau/controller/centralUsuarios.php");
  }
  // Realiza o procedimento de decode do JSON
  // Também altera a URL de acordo com o usuário selecionado
  public function exibeDados(){
    $this->__constructor();
    // Verifica se foi repassado um usuário
    if(self::$usuario <> null){
      // Caso tenha sido, realiza o decode do JSON
      $this->decodeJSON = json_decode(self::$urlJSON);
      // Varre a array atraves do for,
      // Caso seja encontrado o ID informado, ele altera a variável URL
      // Caso não seja encontrado ele continua o loop até encontrar ou chegar ao fim do loop
      for($i=0;$i<count($this->decodeJSON);$i++){
        if($this->decodeJSON[$i]->id == self::$usuario){
          // --- FUTURAMENTE ALTERAR PARA O OWNCLOUD AWS --- //
          $this->url = "http://docs.spacecom.com.br/index.php/apps/files_sharing/ajax/publicpreview.php?x=1680&y=600&a=true&file=".$this->decodeJSON[$i]->hostname.".jpg&t=".$this->decodeJSON[$i]->token."&scalingup=0";
          echo "<input type='hidden' id='txtuserIDView' value='".$this->decodeJSON[$i]->id."'>";
          break;
        }else{
          continue;
        }
      }
    }else{
      echo "ERRO : Não foi possível localizar o usuário!";
    }
  }
}

// Chamada da Classe
$desktop = new viewUser;
$desktop->exibeDados();

?>
    <div class="container">
    <!-- Aqui é onde a Imagem será inserida -->
    <img id="imgCentral" src="<?php echo $desktop->url?>">
    </div>

<script type="text/javascript">
    // Realiza a atualização da imagem a cada X segundos
    function updateImage() {
        let url = '<?php echo $desktop->url ?>';
                 $("#imgCentral").attr('src', url + Math.random() + '.jpg');
    }
    setInterval(function() {
        updateImage();
    }, 1000);
</script>


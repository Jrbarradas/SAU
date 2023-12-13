<!-- BUSCA INVENTÁRIO -->
<div class="modal fade center-block" id="invSeleciona" tabindex="-1" role="dialog" aria-labelledby="invSeleciona" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="invSeleciona">Inventário - TI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body justify-content-center align-items-center">
        
    <section class="inner-page">
      <div class="container align-self-center text-center" style="margin-top:-50px; margin-left:auto; margin-right:auto;">
        <select class="select center-block" aria-label="Selecione a Localidade" id="localidade">
        <option selected>Selecione a Localidade</option>
        <?php

        // Futuramente realizar uma Requisição AJAX para coletar os dados
        // Essa requisição atual é pra demonstrar o funcionamento do Projeto
        $fileLocalidade = file_get_contents('http://sau.spacecom.com.br/sau/controller/inventarioLocalizacao.php');
        $fileDecode = json_decode($fileLocalidade);
         

        for($i=0;$i<count($fileDecode);$i++){

            echo '<option id=estado'.$fileDecode[$i]->localizacao. "". ' value='.$fileDecode[$i]->localizacao.'>'.$fileDecode[$i]->localizacao.'</option>';


        }
       

        ?>
        </select>
        <select class="select center-block" aria-label="Selecione o Inventário" id="tipoInventario">
        <!--Dynamic Content - DB-->
        </select>
        <button type="button" id = "btnBuscaInv" class="sau-btn">Buscar</button>
      </div>
    </section>
      </div>
    </div>
  </div>
</div>
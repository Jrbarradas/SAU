<section class="inner-page" style="margin-top:-60px">
      <div class="container">
        <p>
        <div style="margin-top: 10px">
    <div class="list-group">
        <button type="button" class="list-group-item">Escolha uma opção que mais se adéqua ao seu problema atual.</button>
        <button type="button" class="list-group-item">Leia atentamente os procedimentos.</button>
        <button type="button" class="list-group-item">Caso haja dificuldades para realizar os procedimentos, entre em
            contato
        com setor de T.I.</button>
    </div>
</div>
</div>

<!-- Botão "Confirmar" -->
<div style="margin-top:10px">
    <center>
    <button type="button" class="sau-btn" id="sauConfirma" data-toggle="modal" data-target="#opcoesModal">Exibir Opções</button>
    </center>
</div>
    </p>
   </div>
    </section>

<!-- Modal Opções -->
<div class="modal fade bd-example-modal-lg" id="opcoesModal" tabindex="-1" role="dialog" aria-labelledby="opcoesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="opcoesModalLabel">O que está acontecendo?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body justify-content-center align-items-center">
        <div class="container align-self-center text-center" id = "conteudo" style="margin-top:auto; margin-left:auto; margin-right:auto;">
        <select id="SAUopcaoselecionada" class="select center-block" aria-label=".form-select-lg example">
        <option value="0" selected>Selecione uma opção</option>
        <option value="1">[NO POWER] - Computador não liga</option>
        <option value="2">[INTERNET] - Rede</option>
        <option value="3">[HARDWARE] - Componentes do computador não funcionam</option>
        <option value="4">[DESEMPENHO] - Lentidão</option>
        <option value="5">[SOFTWARE] - Autorização SINS</option>
        <option value="6">[SOFTWARE] - Pacote Office</option>
        <option value="7">[PERIFÉRICOS] - Impressora</option>
        <option value="8">[NO BOOT] - Problemas na inicialização do Windows</option>
         </select>
        </div>
        <div class="container align-self-center text-center" style="margin-top:10px; margin-lefto:auto; margin-right:auto;">
        <button type="button" class="sau-btn" id="sauConfirmaOpcao">Iniciar Procedimentos</button>
        </div>
      </div>
    </div>
  </div>
</div>
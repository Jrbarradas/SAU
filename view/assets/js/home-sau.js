/* 
Responsável por verificar se o SELECT da Home SAU foi selecionado
Caso sim, coleta o valor e armazena na variável {selecionada}
Depois e realizado um switch para verificar qual opcao foi selecionada e mudar o conteudo da modal de acordo com 
a opcao selecionada!
*/

$(document).ready(function(){
$("#SAUopcaoselecionada").change(function(){

  $("#sauConfirmaOpcao").click(function(){
      let selecionada = $("#SAUopcaoselecionada").val();
      
      switch(selecionada){
          // NO POWER
          case "1":
          $("#conteudo").load("../view/procedimentos/nopower/nopowerinicial.php");
          $("#opcoesModalLabel").html("NO POWER");
          $("#sauConfirmaOpcao").hide();
          break;
          // REDE
          case "2":
          $("#conteudo").load("../view/procedimentos/rede/redeinicial.php");
          $("#opcoesModalLabel").html("REDE");
          $("#sauConfirmaOpcao").hide();
          break;
          // COMPONENTES
          case "3":
          $("#conteudo").load("../view/procedimentos/componentes/componentes_inicial.php");
          $("#opcoesModalLabel").html("COMPONENTES");
          $("#sauConfirmaOpcao").hide();
          break;
          // LENTIDAO
          case "4":
          $("#conteudo").load("../view/procedimentos/lentidao/lentidao_inicial.php");
          $("#opcoesModalLabel").html("LENTIDÃO");
          $("#sauConfirmaOpcao").hide();
          break;
          // SINS
          case "5":
          $("#conteudo").load("../view/procedimentos/sins/sins_inicial.php");
          $("#opcoesModalLabel").html("AUTORIZAÇÃO SINS");
          $("#sauConfirmaOpcao").hide();
          break;
          // OFFICE
          case "6":
          $("#conteudo").load("../view/procedimentos/office/office_inicial.php");
          $("#opcoesModalLabel").html("PACOTE OFFICE");
          $("#sauConfirmaOpcao").hide();
          break;
          // IMPRESSORA
          case "7":
          $("#conteudo").load("../view/procedimentos/impressora/impressao_inicial.php");
          $("#opcoesModalLabel").html("IMPRESSORA");
          $("#sauConfirmaOpcao").hide();
          break;
          // NO BOOT
          case "8":
          $("#conteudo").load("../view/procedimentos/noboot/noboot_inicial.php");
          $("#opcoesModalLabel").html("NO BOOT");
          $("#sauConfirmaOpcao").hide();
          break;
      
        }


   });

 });

});

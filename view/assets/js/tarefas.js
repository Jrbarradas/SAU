
// Reseta a Modal quando ela estiver Hidden
$("#taskModal").on("hidden.bs.modal",function(){
  window.location.reload();
});

$(document).on('click','.taskView', function(){
    // Pega o valor do Button clickado acessando o OBJ
    const idValue = {
    id : this.value
    }
    // Repassa o value via POST para a "API" que retorna as informações do usuário
    $.post('./task_view.php?id='+idValue.id,idValue,function(retornoTask){
     $("#conteudoTask").html(retornoTask);
    });

    setInterval(function(){
      $.post('./task_view.php?id='+idValue.id,idValue,function(retornoTaskRefresh){
      $("#conteudoTask").html(retornoTaskRefresh);
      });
    },5000)

});

// Upload de Imagens
$("#file").on('change',function(){
 var fData = new FormData();
 var files = $('#file')[0].files[0];
 fData.append('file',files);
 let id = $("#id").val();
  $.ajax({
    url : './scripts/anexarTarefa.php?id='+id,
    type : 'post',
    data : fData,id,
    contentType : false,
    processData : false,
    success : function(upload){
      $("#returnUpload").html(upload);
      setTimeout(function(){
        $("#returnUpload").html("");
        $("#file").val();
      },2000);
    }
  });
});


// Adicionar Comentário
$("#btnComentario").click(function(){

    let redmine = {
      id : $("#id").val(),
      comentario : $("#comentario").val(),
    }

    /* Requisição para o Script que conversa com a API Redmine */
    $.post('./scripts/comentario_tarefa.php',redmine,function(returnComentario){
      /*Esconde o retorno após 5 Segundos*/
      $("#returnRedmine").html(returnComentario);
          setTimeout(function(){
            $("#comentario").val("");
            $("#returnRedmine").html("");
          },2000);
    });

});

// Timer Botão Ordem de Serviço
 // Exibe ou esconde o botão Ordem de Serviço de acordo com o Status da tarefa
 setInterval(function(){
  if($("#status").text() === "Fechado"){
    $("#btnOS").show();
  }else{
    $("#btnOS").hide();
  }
},1000);


// PDF - Ordem de Serviço
// Transforma canvas em imagem e exporta PDF
$("#btnOS").click(function(){
  function geraPDF() {
  let id = $("#id").val();
  var HTML_Width = $("#conteudoTask").width();
  var HTML_Height = $("#conteudoTask").height();
  var top_left_margin = 15;
  var PDF_Width = HTML_Width + (top_left_margin * 2);
  var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
  var canvas_image_width = HTML_Width;
  var canvas_image_height = HTML_Height;
  var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
  html2canvas($("#conteudoTask")[0]).then(function (canvas) {
  var imgData = canvas.toDataURL("image/jpeg", 1.0);
  var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
  pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
  for (var i = 1; i <= totalPDFPages; i++) { 
  pdf.addPage(PDF_Width, PDF_Height);
  pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
  }
 pdf.save("SAU-OS"+id+".pdf");
 $("#returnPDF").html("Ordem de Serviço Gerada...");
 setTimeout(function(){
 $("#returnPDF").html("");
 },2000);
 });
 }geraPDF();
});
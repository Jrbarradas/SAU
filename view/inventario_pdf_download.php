<?php
ob_start();
 // HTML Head
 include './dynamic/head.php';
 // Bibliote
 use Dompdf\Dompdf;
 require_once 'dompdf/autoload.inc.php';

 // Criando a instância DOMPDF

 $documentTemplate = "Isso é um PDF, bla bla bla";
 $invPDF = new DOMPDF();
 $invPDF->load_html($documentTemplate);
 $invPDF->set_paper("A4", "portrail");

 // Renderizar o HTMl dentro do PDF
 $invPDF->render();

 // Exibir o PDF
 $invPDF->stream(
     "inventario_estado_tal",
     array(
         "Attachment"=>false // Para realizar o download automático = true
     )
 );
 



 

?>
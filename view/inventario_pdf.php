<?php

             // HTML Head
             include './dynamic/head.php';


                class exportPDF {

                    public $localPDF;
                    public $opPDF;
                    public $apiToken;
                    public $apiGet;
                   

                            // Set das variáveis recebidas via POST através do AJAX
                            // Essas variáveis serão utilizadas para realizar a requisição na API...
                            // Localidade do inventário, tipo de inventário e Token da API
                            public function __constructor(){
                            $this->localPDF = strip_tags(stripslashes(filter_input(INPUT_GET,'localPDF')));
                            $this->opPDF = strip_tags(stripslashes(filter_input(INPUT_GET,'opPDF')));
                            $this->apiToken = "dGlAc3BhY2Vjb20uY29tLmJy";
                            $this->apiGet = filter_input(INPUT_GET,'token');
                        }
                        
     
                    
                     
                    
                }


                $invPDF = new exportPDF;
                $invPDF->__constructor();


                    // Verifica se o usuário tem permissão para acessar a API
                if($invPDF->apiGet == "dGlAc3BhY2Vjb20uY29tLmJy"){
                   $invPDF->apiGet = true;
                }else{
                    // Verifica se o Usuário tem permissão de Administrador
                     include '../controller/adminAuth.php';
                     $admin = new permissaoUsuario;
                     $admin->verPermissao();
                }




                



      ?>

                
                <body>
                
                    <?php

                        // Tela dinâmica de acordo com a operação solicitada
                        switch($invPDF->opPDF){

                            // Tabela - Desktops Dell
                            case "dell":
                                include "./dynamic/inventario_pdf_computadores.php";
                                break;
                                // Tabela - Desktops
                                case "variados":
                                    include "./dynamic/inventario_pdf_computadores.php";
                                    break;
                                    // Tabela - Notebooks Dell
                                    case "notedell":
                                        include "./dynamic/inventario_pdf_computadores.php";
                                        break;
                                        // Tabela - Notebooks
                                        case "notebooks":
                                            include "./dynamic/inventario_pdf_computadores.php";
                                            break;
                                            // Tabela - Rede
                                            case "rede":
                                                include "./dynamic/inventario_pdf_rede.php";
                                                break;
                                                // Tabela - Nobreaks
                                                case "nobreaks":
                                                    include "./dynamic/inventario_pdf_nobreaks.php";
                                                    break;
                                                    // Tabela - GMG
                                                    case "gmg":
                                                        include "./dynamic/inventario_pdf_gmg.php";
                                                        break;
                                                        // Tabela - Link de Voz
                                                        case "voz":
                                                            include "./dynamic/inventario_pdf_linkvoz.php";
                                                            break;
                                                            // Tabela - Link de Dados
                                                            case "dados":
                                                                include "./dynamic/inventario_pdf_linkdados.php";
                                                                break;
                                                                // Tabela - Servidores
                                                                case "servidores":
                                                                    include "./dynamic/inventario_pdf_servidores.php";
                                                                    break;
                                                                    // Tabela - Impressoras
                                                                    case "impressoras":
                                                                        include "./dynamic/inventario_pdf_impressoras.php";
                                                                        break;
                                                                        // Tabela - CFTV
                                                                        case "cftv":
                                                                            include "./dynamic/inventario_pdf_cftv.php";
                                                                            break;
                                                                            // Tabela - Ares
                                                                            case "ares":
                                                                                include "./dynamic/inventario_pdf_ares.php";
                                                                                break;
                                                                                // Tabela - Projetores
                                                                                case "projetores":
                                                                                    include "./dynamic/inventario_pdf_projetores.php";
                                                                                    break;
                                                                                    // Tabela - HD Externo
                                                                                    case "hds":
                                                                                        include "./dynamic/inventario_pdf_hds.php";
                                                                                        break;
                                                                                        // Tabela - Porteiro Eletrônico
                                                                                        case "peletronico":
                                                                                            include "./dynamic/inventario_pdf_porteiro.php";
                                                                                            break;
                                                                                            // Tabela - Tablets
                                                                                            case "tablets":
                                                                                                include "./dynamic/inventario_pdf_tablets.php";
                                                                                                break;
                                                                                                // Tabela - Smartphones
                                                                                                case "smartphones":
                                                                                                    include "./dynamic/inventario_pdf_smartphones.php";
                                                                                                    break;
                                                                                                    // Tabela - PIN's
                                                                                                    case "pin":
                                                                                                        include "./dynamic/inventario_pdf_pin.php";
                                                                                                        break;
                                                                                                        // Tabela - Usuários Cadastrados
                                                                                                        case "users":
                                                                                                            include "./dynamic/inventario_pdf_usuarios.php";
                                                                                                            break;
                                                                                                            // Tabela - Softwares
                                                                                                            case "softwares":
                                                                                                                include "./dynamic/inventario_pdf_softwares.php";
                                                                                                                break;

                                                                                                                default:
                                                                                                                include './error_page.php';
                                                                                                                break;
                                                                                                                


                            
                        }
                        
                    ?>
                            <!-- Manter Apenas os Scripts Necessários -->
                            <script src="assets/vendor/jquery/jquery.min.js"></script>
                            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
                            <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
                            <!-- Assim é evitado bug's no JS onde um script sobrepoem outro -->

            </body>
            </html>

                
    <script>
        $(document).ready(function() {

             var tableHWPDF = $("#tblinvHWPDF").DataTable({
                 "ajax":{
                        "method":"POST",
                         "url":"http://sau.spacecom.com.br/sau/controller/inventarioHardware.php?token=<?php echo $invPDF->apiToken?>&localizacao=<?php echo  $invPDF->localPDF?>&op=<?php echo $invPDF->opPDF?>",
                           "dataSrc":"[]"
                              },
                              "lengthMenu": [[-1], ["All"]],
                              "searching": false,
                              "showing":false,
                              "columns":[
                               <?php
                                    // Data - PC'S Geral
                                    switch($invPDF->opPDF){
                                        // Verifica se a requisição do PDF é para PC's, se for, insere o data dos PC's
                                        case "dell":
                                        case "variados":
                                        case "notedell":
                                        case "notebooks":
                                        $dataPC =         '{"data":"patrimonio"},
                                                         {"data":"localizacao"},
                                                          {"data":"fabricante"},
                                                          {"data":"modelo"},
                                                          {"data":"processador"},
                                                          {"data":"memoria"},
                                                          {"data":"disco"},
                                                          {"data":"aquisicao"},
                                                          {"data":"vigencia"},
                                                          {"data":"sistemaoperacional"},
                                                          {"data":"office"},';
                                        echo $dataPC;
                                        break;
                                        // Caso seja Rede \/
                                        case "rede":
                                            $dataRede = '{"data":"patrimonio"},
                                                  {"data":"localizacao"},
                                                  {"data":"fabricante"},
                                                  {"data":"modelo"},
                                                  {"data":"tipo"},
                                                  {"data":"ipwan"},
                                                  {"data":"iplan"},
                                                  {"data":"dhcp"},
                                                  {"data":"mascara"},
                                                  {"data":"servicetag"},
                                                  {"data":"aquisicao"},';
                                                  echo $dataRede;
                                                  break;
                                        // Caso seja Nobreak \/
                                        case "nobreaks":
                                            $dataNB =  '{"data":"patrimonio"},
                                                   {"data":"localizacao"},
                                                  {"data":"fabricante"},
                                                  {"data":"modelo"},
                                                  {"data":"peso"},
                                                  {"data":"trocadebaterias"},
                                                  {"data":"bateriasinternas"},
                                                  {"data":"bateriasexternas"},
                                                  {"data":"capacidade"},
                                                  {"data":"tensao"},
                                                  {"data":"aquisicao"},';
                                                  echo $dataNB;
                                        break;
                                        // Caso seja GMG\/
                                        case "gmg":
                                            $dataGMG = '{"data":"patrimonio"},
                                                   {"data":"localizacao"},
                                                  {"data":"fabricante"},
                                                  {"data":"motor"},
                                                  {"data":"gerador"},
                                                  {"data":"potencia"},
                                                  {"data":"correntenominal"},
                                                  {"data":"peso"},
                                                  {"data":"comando"},
                                                  {"data":"idade"},
                                                  {"data":"aquisicao"},';
                                                  echo $dataGMG;
                                        break;
                                        // Link de Voz
                                        case "voz":
                                            $dataVoz = '{"data":"patrimonio"},
                                           {"data":"localizacao"},
                                           {"data":"nome"},
                                           {"data":"operadora"},
                                           {"data":"tipo"},
                                           {"data":"circuito"},
                                           {"data":"piloto"},
                                           {"data":"ddr"},';
                                           echo $dataVoz;
                                           break;
                                        // Link de Dados
                                        case "dados":
                                            $dataDados = '{"data":"patrimonio"},
                                            {"data":"localizacao"},
                                            {"data":"nome"},
                                            {"data":"operadora"},
                                            {"data":"tipo"},
                                            {"data":"capacidade"},
                                            {"data":"circuito"},
                                            {"data":"mensalidade"},
                                            {"data":"ipwan"},
                                            {"data":"gateway"},
                                            {"data":"redelan"},';
                                            echo $dataDados;
                                            break;
                                            // Servidores
                                            case "servidores":
                                                $dataServidores = '{"data":"patrimonio"},
                                                         {"data":"localizacao"},
                                                          {"data":"fabricante"},
                                                          {"data":"modelo"},
                                                          {"data":"processador"},
                                                          {"data":"memoria"},
                                                          {"data":"disco"},
                                                          {"data":"peso"},
                                                          {"data":"consumo"},
                                                          {"data":"sistemaoperacional"},
                                                          {"data":"ip"},';
                                                echo $dataServidores;
                                                break;
                                                // Impressoras
                                                case "impressoras":
                                                    $dataImpressoras = '{"data":"localizacao"},
                                                          {"data":"nome"},
                                                          {"data":"fabricante"},
                                                          {"data":"modelo"},
                                                          {"data":"servicetag"},
                                                          {"data":"tipo"},
                                                          {"data":"aquisicao"},
                                                          {"data":"idade"},
                                                          {"data":"iplan"},
                                                          {"data":"patrimonio"},';
                                                          echo $dataImpressoras;
                                                          break;
                                                          // CFTV
                                                          case "cftv":
                                                            $dataCFTV = '{"data":"localizacao"},
                                                            {"data":"fabricante"},
                                                            {"data":"modelo"},
                                                            {"data":"servicetag"},
                                                            {"data":"tipo"},
                                                            {"data":"aquisicao"},
                                                            {"data":"idade"},
                                                            {"data":"patrimonio"},';
                                                            echo $dataCFTV;
                                                            break;
                                                            // Ares
                                                            case "ares":
                                                                $dataAres = '{"data":"localizacao"},
                                                                {"data":"nome"},
                                                                {"data":"fabricante"},
                                                                {"data":"modelo"},
                                                                {"data":"potencia"},
                                                                {"data":"aquisicao"},
                                                                {"data":"idade"},
                                                                {"data":"patrimonio"},';
                                                                echo $dataAres;
                                                                break;
                                                                // Projetores
                                                                case "projetores":
                                                                    $dataProjetores = '{"data":"localizacao"},
                                                                    {"data":"fabricante"},
                                                                    {"data":"modelo"},
                                                                    {"data":"servicetag"},
                                                                    {"data":"aquisicao"},
                                                                    {"data":"idade"},
                                                                    {"data":"patrimonio"},';
                                                                    echo $dataProjetores;
                                                                    break;
                                                                    // HD Externo
                                                                    case "hds":
                                                                     $dataHD = '{"data":"localizacao"},
                                                                        {"data":"fabricante"},
                                                                        {"data":"modelo"},
                                                                        {"data":"servicetag"},
                                                                        {"data":"disco"},
                                                                        {"data":"aquisicao"},
                                                                        {"data":"patrimonio"},';
                                                                        echo $dataHD;
                                                                        break;
                                                                        // Porteiro Eletrônico
                                                                        case "peletronico":
                                                                            $dataHD = '{"data":"localizacao"},
                                                                               {"data":"fabricante"},
                                                                               {"data":"modelo"},
                                                                               {"data":"servicetag"},
                                                                               {"data":"tela"},
                                                                               {"data":"aquisicao"},
                                                                               {"data":"patrimonio"},';
                                                                               echo $dataHD;
                                                                               break;
                                                                               // Tablets
                                                                               case "tablets":
                                                                                $dataTablets ='{"data":"patrimonio"},
                                                                                {"data":"localizacao"},
                                                                                 {"data":"fabricante"},
                                                                                 {"data":"imei"},
                                                                                 {"data":"entrada"},
                                                                                 {"data":"saida"},
                                                                                 {"data":"modelo"},
                                                                                 {"data":"processador"},
                                                                                 {"data":"memoria"},
                                                                                 {"data":"disco"},
                                                                                 {"data":"tela"},';
                                                                                  echo $dataTablets;
                                                                                break;
                                                                                // Smartphones
                                                                                    case "smartphones":
                                                                                    $dataSmartphones ='{"data":"patrimonio"},
                                                                                    {"data":"localizacao"},
                                                                                    {"data":"fabricante"},
                                                                                    {"data":"imei"},
                                                                                    {"data":"entrada"},
                                                                                    {"data":"saida"},
                                                                                    {"data":"modelo"},
                                                                                    {"data":"processador"},
                                                                                    {"data":"memoria"},
                                                                                    {"data":"disco"},
                                                                                    {"data":"tela"},';
                                                                                    echo $dataSmartphones;
                                                                                    break;
                                                                                    // PIN's
                                                                                     case "pin":
                                                                                        $dataPin = '{"data":"localizacao"},
                                                                                        {"data":"nome"},
                                                                                        {"data":"pin"},
                                                                                        {"data":"uuid"},
                                                                                        {"data":"servicetag"},
                                                                                        {"data":"patrimonio"},';
                                                                                        echo $dataPin;
                                                                                        break;
                                                                                        // Softwares
                                                                                        case "softwares":
                                                                                            $dataSoft = '{"data":"patrimonio"},
                                                                                            {"data":"localizacao"},
                                                                                            {"data":"usuario"},
                                                                                            {"data":"versao"},
                                                                                            {"data":"chave"},
                                                                                            {"data":"duracao"},
                                                                                            {"data":"observacao"}';
                                                                                            echo $dataSoft;
                                                                                            break;
                                                          

                                    }
                                   



                                ?>
                                           
                                           
                                 ]

                                            
                                        });
                                        
                                        
                                });

            // Gera o PDF através de uma imagem da tabela
            // Somenta após a tabela ter carregado...
            $("#tblinvHWPDF").ready(function(){

                                function CreatePDFfromHTML() {
                                var HTML_Width = $(".html-content").width();
                                var HTML_Height = $(".html-content").height();
                                var top_left_margin = 15;
                                var PDF_Width = HTML_Width + (top_left_margin * 2);
                                var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
                                var canvas_image_width = HTML_Width;
                                var canvas_image_height = HTML_Height;

                                var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

                                html2canvas($(".html-content")[0]).then(function (canvas) {
                                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                                    var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                                    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                                    for (var i = 1; i <= totalPDFPages; i++) { 
                                        pdf.addPage(PDF_Width, PDF_Height);
                                        pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                                    }
                                    pdf.save("inventario_<?php echo $invPDF->localPDF?>_<?php echo $invPDF->opPDF ?>.pdf");
                                    $(".html-content").hide();
                                });
                            }
                            
                           // Gera o PDF
                           setInterval(function(){
                               CreatePDFfromHTML();
                               }, 2000);

                               // Retorna para a página do inventário onde foi solicitado o PDF 
                               setInterval(function(){
                                window.history.back();
                               }, 2600);
                               




            });



        </script>


   
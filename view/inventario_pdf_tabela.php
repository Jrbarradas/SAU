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
                            $this->localPDF = strip_tags(filter_input(INPUT_GET,'localPDF'));
                            $this->opPDF = strip_tags(filter_input(INPUT_GET,'opPDF'));
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
                
                <div class="container html-content" id="divTable" style="position:auto; margin-left:12px;">
                <table class="table" id="tblinvHWPDF" style="text-align:center">
                                <thead class="thead-dark">
                                    <th scope="col">Patrimônio</th>
                                    <th scope="col">Localização</th>
                                    <th scope="col">Fabricante</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Processador</th>
                                    <th scope="col">Memória</th>
                                    <th scope="col">Disco</th>
                                    <th scope="col">Aquisição</th>
                                    <th scope="col">Vigência</th>
                                    <th scope="col">Sistema Operacional</th>
                                    <th scope="col">Office</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td> </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    </tr>
                                </tbody>
                                </table>  
                            </div>

                            
                            <?php include './dynamic/scripts.php'; ?>

            </body>
            </html>

                
    <script>
        $(document).ready(function() {

             var tableHWPDF = $("#tblinvHWPDF").DataTable({
                 "ajax":{
                        "method":"POST",
                         "url":"http://docs.spacecom.com.br/beta/sau/controller/inventarioHardware.php?token=<?php echo $invPDF->apiToken?>&localizacao=<?php echo  $invPDF->localPDF?>&op=<?php echo $invPDF->opPDF?>",
                           "dataSrc":"[]"
                              },
                              "lengthMenu": [[-1], ["All"]],
                              "searching": false,
                              "showing":false,
                              "columns":[
                               {"data":"patrimonio"},
                                 {"data":"localizacao"},
                                     {"data":"fabricante"},
                                       {"data":"modelo"},
                                       {"data":"processador"},
                                       {"data":"memoria"},
                                       {"data":"disco"},
                                       {"data":"aquisicao"},
                                       {"data":"vigencia"},
                                       {"data":"sistemaoperacional"},
                                       {"data":"office"},
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

                           setInterval(function(){CreatePDFfromHTML()}, 6000);


            });



        </script>


   
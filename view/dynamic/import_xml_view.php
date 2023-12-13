            <div class="modal fade" id="modalHWAddInvDellPCImport" tabindex="-1" aria-labelledby="modalHWAddInvDellPCImport" aria-hidden="true">
            <div class='modal-dialog modal-lg' role='document'>
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHWAddInvDellPCImport">Importar - XML</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body justify-content-center align-items-center">
                
                <form class ="container align-self-center text-center" method="POST" action="../controller/import_xml.php?op=<?php echo $sauInv->operacao ?>" enctype="multipart/form-data">
                    <input type="file" class = "sau-btn-secondary" name="arquivo" required> <input type="submit" class="sau-btn" value="Enviar">
                </form>

                
                </div>
                </div>
               </div>
               </div>
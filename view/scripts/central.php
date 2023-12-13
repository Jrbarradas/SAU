<?php

$url = "http://docs.spacecom.com.br/index.php/apps/files_sharing/ajax/publicpreview.php?x=800&y=600&a=true&file=GIOVANI.jpg&t=ta3VYoirHyBI4YX&scalingup=0";

?>

<div class="container" id="imgCentral">
    <!-- Aqui é onde a Imagem será inserida -->
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">
    // Realiza a atualização da imagem a cada X segundos
    function updateImage() {
        let url = '<?php echo $url ?>';
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                $("#imgCentral").html('<img src="'+url+Math.random()+'">');
                console.log('Update IMG - //00//');
            }
        }
        req.open('GET', 'http://docs.spacecom.com.br/beta/sau/view/index.php', true);
        req.send();
    }
    setInterval(function() {
        updateImage();
    }, 3000);
</script>
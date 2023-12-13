// Faz com que a SESSION não expire por inatividade
$(document).ready(function(){
    setInterval(function(){ 
     $.post('./home.php');
      console.log('SESSION RENEW');
    }, 60000);
  });
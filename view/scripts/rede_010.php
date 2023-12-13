<?php
   
   
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://redmine.spacecom.com.br/issues.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"issue\": {\"project_id\": \"436\", \"subject\":\"[SAU] - REDE 010\", \"priority_id\": 2, \"tracker_id\": 3, \"status_id\": 2, \"description\":\"Verificado encaixe do cabo no Modem ou na entrada de rede do computador, verificado cabo conectado corretamente, identificada rede no sistema está como conectada, feito procedimento de limpeza de cache no histórico, verificado problema ocorre em todos os sites!\" } }");
    curl_setopt($ch, CURLOPT_USERPWD, 'zabbix' . ':' . 'kangoo.2010');
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    echo $result;
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } 
    curl_close($ch);


    ?>
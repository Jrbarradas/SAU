<?php
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://redmine.spacecom.com.br/issues.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"issue\": {\"project_id\": \"436\", \"subject\":\"[SAU] - REDE 006\", \"priority_id\": 2, \"tracker_id\": 3, \"status_id\": 2, \"description\":\"Verificado encaixe do cabo no Modem ou na entrada de rede do computador, feito reinicialização do modem (Ligar e desligar após 15 segundos), verificado Leds no Modem acesos normalmente, identificada rede no sistema está como conectada, feito Procedimento de limpeza de cache no Histórico, verificado Problema Ocorre em Todos os sites!\" } }");
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
<?php
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://redmine.spacecom.com.br/issues.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"issue\": {\"project_id\": \"436\", \"subject\":\"[SAU] - IMPRESSORA 042\", \"priority_id\": 2, \"tracker_id\": 3, \"status_id\": 2, \"description\":\"Verificado problema relacionada a parte física, queda de energia durante a impressão, verificado papel preso na impressora após queda de energia, ligado impressora novamente, problema não solucionado!\" } }");
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
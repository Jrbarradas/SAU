<?php
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://redmine.spacecom.com.br/issues.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"issue\": {\"project_id\": \"436\", \"subject\":\"[SAU] - NO BOOT 049\", \"priority_id\": 2, \"tracker_id\": 3, \"status_id\": 2, \"description\":\"Problema de NO BOOT, possível problema no Hardware, No Device Bootable Found ou Hard Disk Not Found (Possível problema no HD), sem técnico no local!\" } }");
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
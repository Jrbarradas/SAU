   <?php
   
   
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://redmine.spacecom.com.br/issues.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"issue\": {\"project_id\": \"436\", \"subject\":\"[SAU] - No Power 001\", \"priority_id\": 2, \"tracker_id\": 3, \"status_id\": 2, \"description\":\"Verificado Led e Beep, testado computador em outra tomada, efetuado a troca do cabo energia ou trocado carregador.\" } }");
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
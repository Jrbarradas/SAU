<?php

$txtSessao = filter_input(INPUT_POST, 'txtSessao');
$txtProtocolo = filter_input(INPUT_POST, 'txtProtocolo');
$arqJson = base64_decode($txtSessao).'.json';


if(trim($txtProtocolo) == "Protocolo 001"){

    /*
     Faz a requisição na API, se der tudo certo, cria a tarefa e salva o resultado e exibe o número da tarefa na tela 
     Será alterado para realizar diretamente neste arquivo, sem precisar requisitar outro script via shell_exec
    */

    $task = shell_exec("php script.php | tee ~ /var/www/html/owncloud/beta/sau/db_json/tarefas/$arqJson") or die ("Erro, requisicao da API invalida!");
    $arquivo = file_get_contents($arqJson);
    $arq = explode('{"issue":{"id":',$arquivo);
    $arqfilter = explode(',"project":{"id"',$arq[1]);
    $tarefafilter = $arqfilter[0];
    
    /* Deleta o LOG da tarefa */
    //$remLog = shell_exec("rm /var/www/html/owncloud/beta/sau/db_json/tarefas/$arqJson");
    
    /* 
    Dados que vão popular a tabela tarefas dentro da view 
    ID, Status e Prioridade, será adicionado um botão para visualizar a tarefa
    Onde será possível visualizar o Titulo, Descrição, Comentários, etc...
    */
   
    $shexec = shell_exec("curl -v -H 'Content-Type: application/json' -X GET -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/$tarefafilter.json");
    $resultado = $shexec;
    $res = json_decode($resultado);
    $tasks = array(["tarefa"=>$arqfilter[0],"status"=>$res->issue->status->name,"prioridade"=>$res->issue->priority->name,"responsavel"=>$res->issue->assigned_to->name]);
    $tasksJson = json_encode($tasks);

    /* 
    Salva o ID da Tarefa em um JSON, esse JSON será incorporado na aba Tarefas no SAU 
    Precisa ser alterado para popular o JSON ao invés de sobreescrever
    */
    $file = fopen("/var/www/html/owncloud/beta/sau/db_json/tarefas/$arqJson",'w+');
    fwrite($file,$tasksJson);
    fclose($file);
    
    echo "Tarefa Aberta : #". $res->issue->id;
    
    
    
} else {
    echo "Protocolo invalido!";
}



?>

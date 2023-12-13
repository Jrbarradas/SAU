<?php

  /*
  Ideia para 18/12/2020
  Adicionar um GET que recebe o SESSION decode do usuário,
  Esse valor será passado para o FILE, automatizando o processo de atualizar os status
  Toda vez que o usuário clicar na aba tarefas, será requisitado um curl para a URL deste script que faz a atualização dos status
  */

        // SCRIPT BASE PARA A ATUALIZAÇÃO DE STATUS NAS TAREFAS DO REDMINE
        
        //   Armazena a URL, tem de ser dinamica, passada por váriavel de alguma
        //  Realiza o JSON decode do arquivo de tarefas
        // Faz o count com o tamanho de tarefas no JSON
        $usuario = filter_input(INPUT_GET,'user');
        $arquivo = base64_decode($usuario);
        $file = "/var/www/html/owncloud/beta/sau/tarefas_json/tarefa$arquivo.json";

                if($usuario){

                    $content = file_get_contents($file);
                    $conDecode = json_decode($content);
                    $count = sizeof($conDecode);
                                // Armazena apenas os numeros das tarefas
                                for($i=0;$i<$count;$i++){
                                    $tarefas[$i] = $conDecode[$i]->tarefa;
                                }
                        
                        // Realiza a requisição via API, guarda numa variavel e realiza o  decode em outra variável
                        for($i=0;$i<$count;$i++){   
                            $exec = shell_exec("curl -v -H 'Content-Type: application/json' -X GET -u zabbix:kangoo.2010 http://redmine.spacecom.com.br/issues/".$tarefas[$i].".json");
                            // echo "<script>alert($exec);</script>";
                            $json[$i] = $exec;
                            $jsonencode[$i] = json_decode($json[$i]);
                        
                        }

                        // Realiza a modificação do status e prioridade da tarefa no arquivo JSON      
                        for($i=0;$i<$count;$i++){
                                    $conDecode[$i]->status = $jsonencode[$i]->issue->status->name;
                                    $conDecode[$i]->prioridade = $jsonencode[$i]->issue->priority->name;
                                    $teste = file_put_contents($file,json_encode($conDecode));        
                        }


                } else {

                    echo "ERRO, SESSION inválida!";
                }


?>
<?php

include './toolsAuth.php';


        class provasRealizadas {

            private $dir;
            private $cmd;
            private $provas;
            private $fileContent;
            private $dadosJson;
            private $dadosArr;

            /* 
            Realiza a coleta de todas as provas que já foram realizadas no sistema 
            Armazena na variável provas o resultado da busca
            */
            public function __constructor(){
                $this->dir = '../provas_json/';
                $this->provas = glob("$this->dir{*.json}", GLOB_BRACE);
            }


            /*
            Coleta as provas e os dados das Provas...
            Antes de retornar em JSON as chaves são descriptografadas, para serem exibidas na tabela 
            Obs: As chaves só são descritografadas visualmente, no DB ainda continuam criptografadas...
            */

            public function colDados(){

                //Descriptografia
                for($i=0;$i<count($this->provas);$i++){
                    $this->fileContent[$i] = file_get_contents(''.$this->provas[$i]);
                    $this->dadosJson[$i] = json_decode($this->fileContent[$i]);
                    $this->dadosJson[$i]->questao_1 = base64_decode($this->dadosJson[$i]->questao_1);
                    $this->dadosJson[$i]->questao_2 = base64_decode($this->dadosJson[$i]->questao_2);
                    $this->dadosJson[$i]->questao_3 = base64_decode($this->dadosJson[$i]->questao_3);
                    $this->dadosJson[$i]->questao_4 = base64_decode($this->dadosJson[$i]->questao_4);
                    $this->dadosJson[$i]->questao_5 = base64_decode($this->dadosJson[$i]->questao_5);
                    $this->dadosJson[$i]->questao_6 = base64_decode($this->dadosJson[$i]->questao_6);
                    $this->dadosJson[$i]->questao_7 = base64_decode($this->dadosJson[$i]->questao_7);
                    if($this->dadosJson[$i]->status == "Corrigida"){
                    $this->dadosJson[$i]->acao = "<a class='sau-btn' style='text-decoration:none; color:#fff;' href=../view/prova_corrigida.php?id=".$this->dadosJson[$i]->acao.">"."Visualizar </a>";
                    }else {
                        $this->dadosJson[$i]->acao = "<a class='sau-btn' style='text-decoration:none; color:#fff;' href=../view/corrigir_prova.php?id=".$this->dadosJson[$i]->acao.">"."Visualizar </a>";
                    }
                }

                //Encodando e exibindo JSON
                $this->jsonEncode = json_encode($this->dadosJson);
                
                // É realizado uma verificação, caso o JSON não possua dados, ele retorna dados setados por padrão
                // Caso possua, ele retorna os dados do JSON
                if(json_decode($this->jsonEncode) == null){
                   $this->dadosArr = array([
                       "usuario"=>"...",
                       "status"=>"...",
                       "data"=>"...",
                       "acao"=>"..."
                   ]
                   );

                   $this->jsonEncode = json_encode($this->dadosArr);
                   echo $this->jsonEncode;
                } else {
                    echo $this->jsonEncode;
                }
            

        }

    }



            $exibir = new provasRealizadas;
            $exibir->__constructor();
            $exibir->colDados();


?>
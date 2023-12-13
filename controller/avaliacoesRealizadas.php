<?php

        include './toolsAuth.php';

            class avaliacoesRealizadas {

                private $dir;
                private $cmd;
                private $avaliacao;
                private $fileContent;
                private $dadosJson;
                private $dadosArr;


                /* 
                Realiza a coleta de todas as avaliações que já foram realizadas no sistema 
                Armazena na variável provas o resultado da busca
                */
                public function __constructor(){
                    $this->dir = '../ava_json/';
                    $this->avaliacao = glob("$this->dir{*.json}", GLOB_BRACE);
                }

                /*
            Coleta as provas e os dados das Provas...
            Antes de retornar em JSON as chaves são descriptografadas, para serem exibidas na tabela 
            Obs: As chaves só são descritografadas visualmente, no DB ainda continuam criptografadas...
            */

            public function colDados(){

                //Descriptografia
                for($i=0;$i<count($this->avaliacao);$i++){
                    $this->fileContent[$i] = file_get_contents(''.$this->avaliacao[$i]);
                    $this->dadosJson[$i] = json_decode($this->fileContent[$i]);
                    $this->dadosJson[$i]->opiniaoApostila = base64_decode($this->dadosJson[$i]->opiniaoApostila);
                    $this->dadosJson[$i]->opiniaoCarga = base64_decode($this->dadosJson[$i]->opiniaoCarga);
                    $this->dadosJson[$i]->opiniaoGeral = base64_decode($this->dadosJson[$i]->opiniaoGeral);
                    $this->dadosJson[$i]->opiniaoInfo = base64_decode($this->dadosJson[$i]->opiniaoInfo);
                    $this->dadosJson[$i]->opiniaoIns = base64_decode($this->dadosJson[$i]->opiniaoIns);
                    $this->dadosJson[$i]->opiniaoTeoria = base64_decode($this->dadosJson[$i]->opiniaoTeoria);
                    $this->dadosJson[$i]->ratingApostila = base64_decode($this->dadosJson[$i]->ratingApostila);
                    $this->dadosJson[$i]->ratingCarga = base64_decode($this->dadosJson[$i]->ratingCarga);
                    $this->dadosJson[$i]->ratingGeral = base64_decode($this->dadosJson[$i]->ratingGeral);
                    $this->dadosJson[$i]->ratingInfo = base64_decode($this->dadosJson[$i]->ratingInfo);
                    $this->dadosJson[$i]->ratingTeoria = base64_decode($this->dadosJson[$i]->ratingTeoria);
                    $this->dadosJson[$i]->acao = "<a class='sau-btn' style='text-decoration:none; color:#fff;' href=../view/avaliacao.php?id=".$this->dadosJson[$i]->acao.">"."Visualizar </a>";
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


            $exibir = new avaliacoesRealizadas;
            $exibir->__constructor();
            $exibir->colDados();


?>
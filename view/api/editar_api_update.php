<?php

// Alterar para POO futuramente

// Variáveis que armazenam os dados passados via GET pelo AJAX
$id = filter_input(INPUT_GET,'id');
$operacao = filter_input(INPUT_GET,'operacao');
$nome = strip_tags(filter_input(INPUT_GET,'nome'));
$email = strip_tags(filter_input(INPUT_GET,'email'));
$senha = strip_tags(filter_input(INPUT_GET,'senha'));
$permissao = strip_tags(filter_input(INPUT_GET,'permissao'));
// Variáveis que armazenam diretório, arrays, ou JSON
$dirStorage = "../../db_json/".$id.".json";
$cadastro = null;
$arquivo = null;

// Verifica a Operação solicitada

switch($operacao){

    case "salvar":
        // Verifica se os dados não são nulos
        if($id<>null && $operacao<>null && $nome<>null &&$email<>null &&$senha<>null &&$permissao<>null){
            // Verifica se o cadastro do usuário realmente existe
            switch(file_exists($dirStorage)){
                case true:
                    // Transforma os dados recebidos via GET em uma array associativa
                    $cadastro = array(
                        "nome"=>$nome,
                        "email"=>$email,
                        "senha"=>$senha,
                        "permissao"=>$permissao,
                        "id"=>$id
                    );
                    // Verifica se a senha foi alterada, caso tenha sido codifica para base64
                    // Após isso, armazena os dados no Storage
                    if(base64_decode($senha,true)){
                        $arquivo = fopen($dirStorage,'w+') or exit('ERRO : Não foi possível abrir o arquivo!');
                        fwrite($arquivo,json_encode($cadastro));
                        echo "Dados alterados com sucesso!<br>".PHP_EOL;
                        echo "Atualizando...".PHP_EOL;
                        echo "<script>
                        setTimeout(function(){
                            document.location.reload(true);
                        }, 2500);
                        </script>";
                    }else{
                        // Caso a senha tenha sido alterada
                        $cadastro = array(
                            "nome"=>$nome,
                            "email"=>$email,
                            "senha"=>base64_encode($senha),
                            "permissao"=>$permissao,
                            "id"=>$id
                        );
                        $arquivo = fopen($dirStorage,'w+') or exit('ERRO : Não foi possível abrir o arquivo!');
                        fwrite($arquivo,json_encode($cadastro));
                        // Mensagem em caso de sucesso
                        // Também realiza um reload na página
                        echo "Dados alterados com sucesso!<br>".PHP_EOL;
                        echo "Atualizando...".PHP_EOL;
                        echo "<script>
                        setTimeout(function(){
                            document.location.reload(true);
                        }, 2500);
                        </script>";
                    }
                    break;
                    // Caso o usuário não seja encontrado no diretorio DB_JSON
                    case false:
                        echo "ERRO : Usuário não cadastrado!";
                        break;

            }
        // Se algum dado não estiver preenchido
        }else{
            echo "ERRO : Verifique se não há dados em branco!";
        }
        break;


        case "excluir":
            // Verifica se o ID do usuário foi repassado
            if($id<>null){
                // Seta a variável usuário que armazena o arquivo JSON do usuário
                $usuario = $dirStorage;
                // Verifica se o arquivo existe
                switch(file_exists($usuario)){
                    case true:
                        // Caso exista, a variável $deleteUser armazena o unlink do arquivo
                        $deleteUser = unlink($usuario);
                        // Caso o arquivo tenha sido deletado com sucesso
                        if($deleteUser){
                            echo "Usuário removido!";
                        // Em caso de algum erro \/
                        }else{
                            echo "ERRO : Não foi possível remover o usuário!";
                        }
                        break;
                        case false:
                            echo "ERRO : Usuário não encontrado!";
                        break;
                }
            }else{
                echo "ERRO : Usuário não encontrado!";
            }
        break;

}

?>
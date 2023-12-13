<?php

// Include da conexão com o DB
include '../controller/PDOClass.php';

class coletaInformacoes extends conPDO{

    // Variáveis utilizadas na classe
    static private $id;
    static private $url;
    static private $dados;

    // Variáveis utilizadas para Update nos dados
    public $hostname;
    protected $token;
    protected $pa;
    protected $observacao;
    static private $query;
    static private $execQuery;

    // Utilizada para verificar o tipo de ação requisitada
    public $operacao;

    // Set das variáveis estaticas 
    public function __constructor(){
        self::$id = filter_input(INPUT_GET,'id');
        self::$url = file_get_contents('http://sau.spacecom.com.br/sau/controller/centralUsuarios.php');
        self::$dados = json_decode(self::$url);
    }

    // Classe responsável por exibir os dados na Modal
    public function exibeDados(){
        // Chamada constructor
        $this->__constructor();
        // Faz um for count dos dados recebidos via JSON
        // É tratado com um if dentro do for, caso ele encontre dentro do JSON o ID informado via AJAX ele exibe os dados e da um Break,
        // Caso não encontre ele da um continue até encontrar ou encerrar o for...
        for($i=0;$i<count(self::$dados);$i++){
            if(self::$dados[$i]->id == self::$id){
                /* HTML Responsável por preencher a Modal */
                echo '<li class="list-group-item"><p class="font-italic" style="color:black;">Informações do Computador</p>'.PHP_EOL;
                echo "<div class='input-group'>
                        <div class='input-group-prepend'>
                        <span class='input-group-text'>Nome</span>
                        ".PHP_EOL;
                echo "<input type='text' class='form-edit nome' style='width:80%' id='txtNomeCentral' value='".self::$dados[$i]->hostname."' readonly>".PHP_EOL;
                echo "<span class='input-group-text' style='margin-left:20px'>Token</span>";
                echo "<input type='text' class='form-edit email' style='width:40%' id='txtTokenCentral' value='".self::$dados[$i]->token."' required>".PHP_EOL;
                echo "<span class='input-group-text' style='margin-left:20px'>PA</span>";
                echo "<input type='text' class='form-edit email' style='width:10%' id='txtPACentral' value='".self::$dados[$i]->pa."' required>".PHP_EOL;
                echo "</li>";

                echo '<li class="list-group-item"><p class="font-italic">Observações</p>'.PHP_EOL;
                echo "<div class='input-group'>
                <div class='input-group-prepend'>
                <span class='input-group-text'>Observação</span>
                ".PHP_EOL;
                echo "<textarea class='form-control' id='txtObsCentral' style='min-width: 100%'>".self::$dados[$i]->observacao."</textarea>";
                echo "</li>";
                echo '<li class="list-group-item">';
                echo "<span class='badge badge-danger' id='CentralUpdate'></span>";
                echo "<input type='hidden' id='txtuserID' value='".self::$dados[$i]->id."'>";
                echo "</li>";
                break;
            }else{
                continue;
            }
        }
    }

    // Responsável pelo Update dos Dados
    public function updateDados(){
        // Set das variáveis
        // Todas são passadas via AJAX/JQuery
        $this->hostname = strip_tags(addslashes(filter_input(INPUT_GET,'nome')));
        $this->pa = strip_tags(addslashes(filter_input(INPUT_GET,'pa')));
        $this->token = strip_tags(addslashes(filter_input(INPUT_GET,'token')));
        $this->observacao = strip_tags(addslashes(filter_input(INPUT_GET,'observacao')));
        // Token não pode ser NULL, caso seja não retorna imagem, por isso a verificação
        if($this->token <> null){
            // SET da Query
            self::$query = "UPDATE sau_central SET pa = '$this->pa', token = '$this->token', observacao = '$this->observacao' WHERE hostname = '$this->hostname'";
            self::$execQuery = $this->conectar->prepare(self::$query);
            // Verificação e Execução da Query
            if(self::$execQuery->execute()){
                // Limpa a conexão
                self::$query = null;
                self::$execQuery = null;
                // Exibe a mensagem de sucesso!
                echo "Salvo com sucesso!<br>".PHP_EOL;
                            echo "Aguarde a atualização...".PHP_EOL;
                            echo "<script>
                            setTimeout(function(){
                                document.location.reload(true);
                            }, 3000);
                            </script>";
            }else{
                echo "ERRO : Não foi possível modificar as informações! <br>".PHP_EOL;
                print_r(self::$execQuery->errorInfo());
                // Limpa a Conexão após exibir a mensagem de erro
                self::$query = null;
                self::$execQuery = null;
            }
        }else{
            echo "ERRO : O Token não pode ser NULL!<br>".PHP_EOL;
        }

    }

    // Responsável pelo Delete dos dados
    public function deleteDados(){
        // Set da Query
        $this->hostname = strip_tags(addslashes(filter_input(INPUT_GET,'nome')));
        self::$query = "DELETE FROM sau_central WHERE hostname = \"$this->hostname\"";
        self::$execQuery = $this->conectar->prepare(self::$query);
        // Verificação e Execução da Query
        if(self::$execQuery->execute()){
            // Limpa a conexão
            self::$query = null;
            self::$execQuery = null;
            // Exibe a mensagem de sucesso!
            echo "Deletado com sucesso!<br>".PHP_EOL;
                        echo "Aguarde a atualização...".PHP_EOL;
                        echo "<script>
                        setTimeout(function(){
                            document.location.reload(true);
                        }, 3000);
                        </script>";
        }else{
            echo "ERRO : Não foi possível deletar o usuário em específico!";
            print_r(self::$execQuery->errorInfo());
                // Limpa a Conexão após exibir a mensagem de erro
                self::$query = null;
                self::$execQuery = null;
        }
    }

    // Responsável pelo Download do Print
    public function printScreen(){
        // SET DA QUERY
        $this->__constructor();
        $id = self::$id;
        self::$query = "SELECT * FROM sau_central where id = $id";
        self::$execQuery = $this->conectar->prepare(self::$query);
        // Executa e verifica se deu tudo certo
        if(self::$execQuery->execute()){
            // Retorna o Link que será atribuido no HREF para download
            $resultado = self::$execQuery->fetchAll(PDO::FETCH_OBJ);
            // -- FUTURAMENTE ALTERAR PARA O OWNCLOUD AWS -- //
            echo "http://docs.spacecom.com.br/index.php/s/".$resultado[0]->token."/download";
            self::$query = null;
            self::$execQuery = null;
        }else{
            // Em caso de Errros \/
            echo "ERRO : Não foi possível realizar o Download!";
            print_r(self::$execQuery->errorInfo());
            self::$query = null;
            self::$execQuery = null;
        }
        
    }

}


$computador = new coletaInformacoes;
$computador->operacao = filter_input(INPUT_GET,'operacao');

// Executa a função de acordo com a operação solicitada
switch($computador->operacao){

    case "editar":
        $computador->exibeDados();
        break;

        case "salvar":
            $computador->updateDados();
            break;

            case "excluir":
                $computador->deleteDados();
                break;

                case "print":
                    $computador->printScreen();
                    break;

        default:
        echo "ERRO : Operação não informada!<br>".PHP_EOL;
        var_dump($computador->operacao);
        break;

}




?>
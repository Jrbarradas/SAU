
$(document).ready(function() {
    // Chamada primária das funções
    listar();
    tasks();
    provas();
    avaliacoes();
    exibeUsers();
    atividades();
    exibeCentral();

    // Timers - Atualização em tempo real das tabelas

    // Tarefas
    setInterval(function(){
        var taskAtt = $("#tableTask").DataTable();
        taskAtt.ajax.reload();
    },1000);

    // Usuários Cadastrados
    setTimeout(function(){
        var usersAtt = $("#tableUsers").DataTable();
        usersAtt.ajax.reload();
    },1000);

    // Provas Realizadas
    setTimeout(function(){
        provasAtt = $("#tableProvas").DataTable();
        provasAtt.ajax.reload();
    },1000);

    // Avaliações 
    setTimeout(function(){
        avaAtt = $("#tableAvaliacoes").DataTable();
        avaAtt.ajax.reload();
    },1000);

    // Logs [Atividades]
    setTimeout(function(){
        atiAtt = $("#tblAtividades").DataTable();
        atiAtt.ajax.reload();
    },1000);

    // Desktop Viewer [Central]
    setTimeout(function(){
        deskAtt = $("#tableCentral").DataTable();
        deskAtt.ajax.reload();
    },1000);
});
    
    // Requisição via AJAX na API Json que retorna a lista de usuários cadastrados
    
    // Tabela USUÁRIOS CADASTRADOS
    var listar = function(){
    var table = $("#tableUsers").DataTable({
       "ajax":{
           "method":"POST",
           "url":"../../../sau/controller/listUsers.php",
           "dataSrc":"[]"
       },
       "columns":[
           {"data":"permissao"},
           {"data":"nome"},   
           {"data":"email"},
           {"data":"id"},
    
       ]
    
    });
    }
    
    // Tabela USUÁRIOS CADASTRADOS - PDF
    var exibeUsers = function(){
        var tableUsers = $("#tableUsersPDF").DataTable({
            "ajax":{
                "method":"POST",
                "url":"../../../sau/controller/listUsers.php",
                "dataSrc":"[]"
                },"lengthMenu": [[-1], ["All"]],
                "searching": false,
                "showing":false,
                "columns":[
                {"data":"permissao"},
                {"data":"nome"},   
                {"data":"email"},
            ]
         });
    }
    
    // Tabela - TAREFAS 
    var tasks = function(){
        var tableTask = $("#tableTask").DataTable({
            "ajax":{
                "method":"POST",
                "url":"../../../sau/controller/listTask.php",
                "dataSrc":"[]"
            },
            "columns":[
                {"data":"tarefa"},
                {"data":"titulo"},
                {"data":"status"},
                {"data":"prioridade"},
                {"data":"responsavel"},
            ]
        
        });
    }
    
    // TABELA - PROVAS REALIZADAS
    var provas = function(){
    var tableProvas = $("#tableProvas").DataTable({
    
        "ajax":{
            "method":"POST",
            "url":"../../../sau/controller/provasRealizadas.php",
            "dataSrc":"[]"
        },
        "columns":[
            {"data":"usuario"},
            {"data":"status"},
            {"data":"data"},
            {"data":"acao"},
        ]
    
    });
    }
    
    // TABELA - AVALIAÇÕES REALIZADAS
    var avaliacoes = function(){
        var tableAvaliacoes = $("#tableAvaliacoes").DataTable({
            "ajax":{
                "method":"POST",
                "url":"../../../sau/controller/avaliacoesRealizadas.php",
                "dataSrc":"[]"
            },
            "columns":[
                {"data":"usuario"},
                {"data":"status"},
                {"data":"data"},
                {"data":"acao"},
            ]
        });
    }

    // TABELA - LOGS DO SERVIDOR [ATIVIDADES]
    var atividades = function(){
        var tblAtividades = $("#tblAtividades").DataTable({
            "ajax":{
                "method":"POST",
                "url":"http://sau.spacecom.com.br/sau/view/api/atividades_api_view.php",
                "dataSrc":"[]"
            },
            "columns":[
                {"data":"usuario"},
                {"data":"acao"},
                {"data":"data"},
                {"data":"hora"},
            ]
        });
        }

    // TABELA - DESKTOP VIEWER
    var exibeCentral = function(){
        var tableCentral = $("#tableCentral").DataTable({
            "ajax":{
                "method":"POST",
                "url":"http://sau.spacecom.com.br/sau/controller/centralUsuarios.php",
                "dataSrc":"[]"
                },
                "columns":[
                {"data":"token"},
                {"data":"pa"},
                {"data":"hostname"},
                {"data":"observacao"},   
                {"data":"acao"},
            ]
         });
    }

    
    
    
    
    
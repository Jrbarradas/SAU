let thisObj = {
    "issue": {
        "id": 127698,
        "project": {
            "id": 436,
            "name": "SAU"
        },
        "tracker": {
            "id": 3,
            "name": "Tarefa"
        },
        "status": {
            "id": 2,
            "name": "Em progresso"
        },
        "priority": {
            "id": 2,
            "name": "Normal"
        },
        "author": {
            "id": 416,
            "name": "Redmine API"
        },
        "subject": "[SAU] - No Power 001",
        "description": "Verificado Led e Beep, testado computador em outra tomada, efetuado a troca do cabo energia ou trocado carregador, verificada integridade do carregador, identificado danos físicos!",
        "start_date": "2020-12-17",
        "done_ratio": 0,
        "created_on": "2020-12-17T19:49:10Z",
        "updated_on": "2020-12-18T13:56:32Z",
        "journals": [
            {
                "id": 439022,
                "user": {
                    "id": 235,
                    "name": "Giovani Patrick"
                },
                "notes": "",
                "created_on": "2020-12-18T00:00:07Z",
                "details": [
                    {
                        "property": "attr",
                        "name": "priority_id",
                        "old_value": "2",
                        "new_value": "4"
                    }
                ]
            },
            {
                "id": 439023,
                "user": {
                    "id": 235,
                    "name": "Giovani Patrick"
                },
                "notes": "",
                "created_on": "2020-12-18T00:35:41Z",
                "details": [
                    {
                        "property": "attr",
                        "name": "priority_id",
                        "old_value": "4",
                        "new_value": "2"
                    }
                ]
            },
        ]
    }
}

let thisJournals = thisObj.issue.journals;

if (!thisJournals || thisJournals.length <= 0) {
    return;
}

thisJournals.forEach(journal => {
    console.log(journal.user.name)
})
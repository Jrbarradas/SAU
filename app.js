// Importando Express e atribuindo a uma variável
const express = require("express");
const app = express();


// Rota de Páginas



app.get("/sau/:nome/:sobrenome/:id", function(req,res){
    
  res.send("NOME : "+req.params.nome+" "+req.params.sobrenome+ "<br>"+"ID: "+req.params.id);

});





// Iniciando Servidor
app.listen(8080,function(){

    console.log("Servicdor iniciado : http://localhost:8080")
    
});

<table class="table" id="tableUsers" style="margin-top:20px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Permissão</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tbody>
</table>
  </tbody>
</table>

<style>

.select-cad{
  background-color: white;
}

</style>
<!-- Modal Editar Usuários - CADASTRO -->
<div class="modal fade" id="cadUserModal" tabindex="-1" role="dialog" aria-labelledby="cadUserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadUserModalLabel">Cadastrar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <li class="list-group-item">
                        <div>
                        <span class='input-group-text'>Nome</span>
                        <input type="text" class="form-control" id="cadNome" placeholder="Digite o Nome" required>
                        </div>
                        </li>
                        <li class="list-group-item">
                        <div>
                        <span class='input-group-text'>Email</span>
                        <input type="email" class="form-control" id="cadEmail" placeholder="Digite o E-mail" name="cadEmail" required>
                        </div>
                        </li>
                        <li class="list-group-item">
                        <div>
                        <span class='input-group-text'>Senha</span>
                        <input type="password" class="form-control" id="cadPass" name="cadPass" required>
                        </div>
                        </li>
                        <li class="list-group-item">
                        <div>
                        <span class='input-group-text'>Permissão</span>
                        <select class="select-cad form-select form-select-lg mb-3" aria-label=".form-select-lg" style="width:425px;" id="cadPermissao" required>
                        <option value="1">Usuário SAU</option>
                        <option value="2">Administrador SAU</option>
                        <option value="3">Instrutor Treinamento</option>
                        <option value="4">Usuário Treinamento</option>
                        <option value="5">Supervisor Central</option>
                        </select>
                        </div>
                        </li>
                        
      </div>
      <div class="modal-footer">
      <span class ="badge badge-danger" id=cadResul></span>
        <button type="button" class="sau-btn" id="btnCad">Salvar</button>
        <button type="button" class="sau-btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


</script>







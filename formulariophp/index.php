<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap link/script para auxílio do front-end -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="data.js"></script>
    <title>Teste</title>
</head>
<body onload="userList()">
    <style>
      body{
        background-color: #f2f2f2;
      }
      .icone{
        width: 30px;
        margin-left: 350px;
        display: flex;
        padding-top: 10px;
      }



    </style>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleRegister">CADASTRO DE USUÁRIO</h5>
        <h5 class="modal-title" id="titleEdit">EDITAR USUÁRIO</h5>
        <h5 class="modal-title" id="titleView">DETALHES DO USUÁRIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">
    <div id="alert"></div>
      <form class="was-validated"> 
    <!--Cadastro com os espaços 'nome', 'email', 'data de cadastro' e 'senha'
        O action do formulário irá salvar o usuário no banco de dados -->    
        <input type="hidden" name ="acao" value="cadastrar">   <!--Input hidden para fazer o switch case no arquivo 'salvar-usuario.php'  -->
          <div class ="container">
            
            <div class="row" hidden id="hiddenRowID">
              <div class="col-12">
                <label for="idUser" class="form-label">ID:</label>
                <input type="text" class="form-control mb-3" id="idUser" name="idUser">
              </div>
            </div>
            <div class="row">
              <div class="col-12 mb-3">  
                  <label for="name" class="form-label">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Insira seu nome" required>
              </div>
            </div>
            <div class="row">               
              <div class="col-12 mb-3">  
                  <label for="email" class="form-label">E-mail:</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder = "Insira seu e-mail"required>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mb-3">  
                  <label for="datetime" class="form-date">Data de cadastro </label>
                  <input type="date" id ="date" name="date" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mb-3" id="divPassword">  
                  <label for="password">Senha:</label>
                  <input type="password" id = "password" name="password" class="form-control mb-3" required>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                  <button type="button" class="btn btn-primary btn-block" onclick="userRegistered()">Salvar</button>
              </div>
              <div class="col-6"></div>
              <div class="col-3">
                  <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Fechar</button>
              </div>    
            </div>
          </div>
        </div>
    </div>
    </form>
  </div>
</div>


<div class="container">
  <div class="row">
      <h2 style="font-family: Arial, Helvetica, sans-serif; color:blue; display: flex; margin-left:475px; padding-top: 20px;">USUÁRIOS</h2>
      <img src="formulario-de-registro.png" title="Ícone" style="height:35px; margin-top: 20px; margin-left: 10px">
  </div>
  <div class="row">
      <div class="col-4">
            <button type="button" class="btn btn-primary mt-2 mb-2" onclick="cadastroUser()" title="Cadastrar">Cadastrar</button>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
          <!-- <input type="text"  id="name" name="name" placeholder="Pesquisar usuário" required/>
          <button type="button" class="btn btn-primary mt-2 mb-2" onclick="userFilter()">Pesquisar</button> -->
          <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Pesquisar usuário" aria-label="Recipient's username" aria-describedby="button-addon2" id="userSearch">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button" id="button-addon2" onclick="userFilter()" title="Pesquisar usuário"><span class="fa fa-search"></span></button>
            <button class="btn btn-outline-primary" type="button" id="button-addon2" onclick="userFilterClear()" title="Limpar filtro"><span class="fa fa-trash"></span></button>
          </div>
        </div>
        </div>
  </div>
  </div>
<div class="container">
    <div class="row">
      <div class="col-12">
        <div id="listaUser"></div>
      </div>
    </div>
</div>

</body> 
</html>
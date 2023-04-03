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
    <script src="funcexcluir.js"></script>
    <title>Teste</title>
</head>
<body onload="userList()">
    <style>
      body{
        background-color: #f2f2f2;
      
      }
      
      .titulo2{
        display: flex;
        margin-left:530px;
        padding-top: 20px;
      }
      
      .container{
        width: 630px;
        margin-left: 420px;
      }

      .containerbutton{
        margin-top: -50px;
        margin-left: 10px;
      }

      .card
      {
        padding: 10px;
        width: 400px;
        padding-bottom: 15px;
        margin-left: 65px;
        margin-top: 20px;
        border-radius: 10px;
      }
      .titulo1{
          margin-left: 600px;
          padding-top: 20px;
      }

      .containertable{
        margin-left: 400px;
        width: 630px;
      }

    </style>
<h2 class="titulo1" style="font-family: Arial, Helvetica, sans-serif; color:blue">CADASTRO:</h2>
  <div class="containerbutton":>
    <div name="button2">
      <button type="submit" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">Pesquisar usuário</button>
    </div>
  </div>
  <form>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pesquisar usuário pelo nome</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label class="mb-3 mt-3"> Digite o nome do usuário </label>
            <input type="text" class="form-control" id="userSearch">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="userFilter()">Pesquisar</button>  
          </div>
        </div>
      </div>
  </div>
</form>
<!--Cadastro com os espaços 'nome', 'email', 'data de cadastro' e 'senha'
  O action do formulário irá salvar o usuário no banco de dados -->
<form class="was-validated">        
<input type="hidden" name ="acao" value="cadastrar">   <!--Input hidden para fazer o switch case no arquivo 'salvar-usuario.php'  -->
    <div class ="container">
      <div class ="row">
        <div class="card">
          <div class="mb-3">  
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Insira seu nome" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder = "Insira seu e-mail"required>
          </div>
          <div class="mb-3">
            <label for="datetime" class="form-date">Data de cadastro </label>
            <input type="date" id ="date" name="date" class="form-control" required>
          </div>
            <label for="password">Senha:</label>
            <input type="password" id = "password" name="password" class="form-control mb-3" required>
            <button type="button" class="btn btn-primary" onclick="userRegistered()">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!--Listagem de usuários-->
<div class="titulo2">
  <h2 style="font-family: Arial, Helvetica, sans-serif; color:blue;">LISTA DE USUÁRIOS</h2>
</div>

<div id="alert"></div>
  <div class="containertable">
      <div class="row">
        <div id="listaUser"></div>
      </div>
  </div>
</body> 
</html>
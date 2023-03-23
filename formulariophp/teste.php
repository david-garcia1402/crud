<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Teste</title>
</head>
<body>
    <h2 class="titulo">CADASTRO:</h2>
    <style>
      body{
        background-color: #f2f2f2;
        padding-top: 100px;
      }

      .card
      {
        padding-bottom: 25px;
      }

      .titulo{
        display: flex;
        margin-left: 45%;
        text-shadow: 2px 2px #e5e5e5;

      }

      .login{
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 12px 12px 2px 1px rgba(0, 0, 255, .2);
        border-style: solid;
        border-width: 1px;
        border-radius: 8px;
      }
    </style>
<form action="cad.php" method="GET" class="was-validated">        
  <div class = "login">
    <div class ="container">
      <div class ="row">
        <div class="card">
          <div class="mb-3 mt-3">  
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Insira seu nome" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder = "Insira seu e-mail"required>
          </div>
          <div class="mb-3 mt-3">
            <label for="datetime" class="form-date">Data de cadastro </label>
            <input type="date" id ="date" name="date" class="form-control" required>
          </div>
            <label for="password">Senha:</label>
            <input type="password" id = "password" name="password" class="form-control" required>
            <button type="submit">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>
</form> 
</body>

</html>
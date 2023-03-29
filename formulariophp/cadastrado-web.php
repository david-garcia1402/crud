<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<style>

  body{
    background-color: #f2f2f2;
  }
  .container{
    padding-left: 100px;
    padding-top: 10px ;
  }
  .btn{
    display: flex;
    justify-content: start;
    
  }
</style>
  <div class="row">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">CADASTRADO COM SUCESSO!</h4> 
        </div>
    </div>

<form action="listar-usuario.php">
  <button type="submit" class="btn btn-success m-3">Listar usuários</button>
</form>

<form action="index.php">
    <button type="submit" class="btn btn-primary m-3">Cadastrar novo usuário</button>
</form>

</body>
</html>
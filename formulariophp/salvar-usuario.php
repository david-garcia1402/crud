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

<div class="container mt-3">
  <div class="alert alert-success">
    <strong>CADASTRADO COM SUCESSO!</strong></a>.
  </div>

  <?php 
  ?>

</body>
</html>

<?php
    include('config.php');
    switch($_REQUEST["acao"]){
        case "cadastrar":
        $nome = $_GET["name"];
        $email = $_GET["email"];
        $data_cadastro = $_GET["date"];
        $password_ = md5($_GET["password"]);
    
    $sql = "INSERT INTO usuarios (nome, email, data_cadastro, password)
            VALUES ('{$nome}', '{$email}', '{$data_cadastro}', '{$password_}')";
    
    $res = $conn->query($sql);
    }
?>
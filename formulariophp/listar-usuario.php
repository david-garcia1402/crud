<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="funcexcluir.js"></script>
  <title>Document</title>
</head>
<body style="margin-left:10px">
<div class="titulo">
  <h1 style="font-family: Arial, Helvetica, sans-serif; color:blue">LISTA DE USUÁRIOS</h1>
</div>
<style>
  body{
    background-color: #f2f2f2;
  }

  .titulo{
    display: flex;
    margin-left:490px;
    padding-top: 10px;
  }
  
  .container{
    width: 630px;
    margin-left: 470px;

  }
  .button1{
    margin-top:-50px;
  }

  .button2{
    margin-top: -100px;
  }

  .row{

    margin-left: -120px;
  }


</style>
<div class="button1">
  <div class="button">
    <form action="index.php">
      <button type="submit" class="btn btn-primary ">Cadastrar novo usuário</button>
    </form>
  </div>
  <div name="button2">
    <form action="pesquisar.php">
      <button type="submit" class="btn btn-primary mt-3">Pesquisar usuário</button>
    </form>
  </div>
  <div name="button3">
    <form action="excluir.php">
      <button type="submit" class="btn btn-danger mt-3">Excluir usuário</button>
    </form>
  </div>
</div>


<div class="container">
    <div class="row">
      <?php 
          require_once('config.php');
          $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios";  //página dedicada somente para listar os usuários
          $listres = $conn->query($listsql); 
          
          echo "<table class='table'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>E-mail</th>";
            echo "<th>Data</th>";
            echo "</tr>";
          while($row = mysqli_fetch_row($listres)){ 
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td><button type='button' class='btn btn-outline-danger btn-sm btn-block' onclick='userDelete(\"$row[0]\")'>Excluir</button></td>";
            echo "</tr>";
          }
          echo "</table>";
      ?>
      </div>
</div> 
</body>
</html> 
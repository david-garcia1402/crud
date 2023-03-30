<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>
<body>
  <h1 style="font-family: Arial, Helvetica, sans-serif; color:blue">LISTA DE USUÁRIOS</h1>
<style>
  body{
    background-color: #f2f2f2;
  }

  h1{
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 30px;
    padding-left: 45px;
  }
  
  .container{
    width: 700px;
    display: flex;
    margin-left: 470px;

  }
  .btn{
    display: flex;
    justify-content: start;
    position: absolute;
    top: 0;
    left: 0;
  }

</style>
<div class="button">
  <form action="index.php">
    <button type="submit" class="btn btn-primary m-2">Cadastrar novo usuário</button>
  </form>
  <form action="pesquisar.php">
    <button type="submit" class="btn btn-primary my-5 m-2">Pesquisar usuário</button>
  </form>
</div>

<div class="container">
    <div class="row">
      <?php 
          require_once('config.php');
          $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios";
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
            echo "</tr>";
          }
          echo "</table>";
      ?>
      </div>
</div> 
</body>
</html> 
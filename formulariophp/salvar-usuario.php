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
<form action="index.php">
<button type="submit" class="btn btn-primary m-3">Voltar</button>
</form>
 <div class="container"> 
  <div class="row">
        <?php
            require_once('config.php');
            switch($_REQUEST["acao"]){
                case "cadastrar":
                  $nome = $_GET["name"];
                  $email = $_GET["email"];
                  $data_cadastro = $_GET["date"];
                  $password_ = md5($_GET["password"]);
                  
                  $sql2 = "SELECT * FROM usuarios WHERE email = '$email'";
                  $checksql = mysqli_query($conn, $sql2);

                  if(mysqli_num_rows($checksql) == 0){
                    $sql = "INSERT INTO usuarios (nome, email, data_cadastro, password)
                    VALUES ('{$nome}', '{$email}', '{$data_cadastro}', '{$password_}')";
                    $res = $conn->query($sql);
                  }
                  else{
                    header("Location: email-used.php");
                  }
                  default:
                    $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios";
                    $listres = $conn->query($listsql); 
                    
                    echo '<table>';
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
                  
            }
        ?>
    </div>
 </div>
</body>
</html>

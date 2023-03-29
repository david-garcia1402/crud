
<?php
    include('config.php');
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
            header("Location: cadastrado-web.php");
          }
          else{
            header("Location: email-used.php");

          } 
    }
?>

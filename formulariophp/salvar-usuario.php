
<?php
    include('config.php'); //conexão com o banco de dados
    switch($_REQUEST["acao"]){   //request do input "acao" (vai dar request em "name", "email", "date" e "password")
        case "cadastrar":
          $nome = $_GET["name"];   //obtenção dos dados do através do $_get do index.php
          $email = $_GET["email"];
          $data_cadastro = $_GET["date"];
          $password_ = md5($_GET["password"]);
          
          $sql2 = "SELECT * FROM usuarios WHERE email = '$email'";  //query para validação para ver se já tem um email existente cadastrado
          $checksql = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($checksql) == 0){ //se o número de e-mail congruente for igual a 0 (ou seja, sem email igual)
            $sql = "INSERT INTO usuarios (nome, email, data_cadastro, password)  
            VALUES ('{$nome}', '{$email}', '{$data_cadastro}', '{$password_}')";  //vai inserir o usuário no banco de dados através desta query
            $res = $conn->query($sql);
            header("Location: cadastrado-web.php");  
          }
          else{
            header("Location: email-used.php"); //se já houver um e-mail igual registrado, vai ser mandado para o arquivo 'email-used.php' alertando que o e-mail já está sendo usado

          } 
    }
?>


<?php
    include('config.php'); //conexão com o banco de dados
    $idUser = $_GET["idUser"] ? $_GET["idUser"] : "";
    $nome = $_GET["name"] ? $_GET["name"] : "";  //obtenção dos dados do através do $_get do index.php
    $email = $_GET["email"] ? $_GET["email"] : "";
    $data_cadastro = $_GET["date"] ? $_GET["date"] : "";
    $password_ = md5($_GET["password"]) ? $_GET["password"] : "";

    if(empty($idUser)){  //request do input "acao" (vai dar request em "name", "email", "date" e "password")
        $sql2 = "SELECT * FROM usuarios WHERE email = '$email'";  //query para validação para ver se já tem um email existente cadastrado
        $checksql = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($checksql) == 0){ //se o número de e-mail congruente for igual a 0 (ou seja, sem email igual)
          $sql = "INSERT INTO usuarios (nome, email, data_cadastro, password)  
          VALUES ('{$nome}', '{$email}', '{$data_cadastro}', '{$password_}')";  //vai inserir o usuário no banco de dados através desta query
          $res = $conn->query($sql);
        }
        else{
          header('HTTP/1.0 400 Bad Request');

          $retorno['code']    = 400;
          $retorno['message'] = "E-mail já cadastrado.";
    
          echo json_encode($retorno, JSON_UNESCAPED_UNICODE);
        } 
    }else{
      $sql = "UPDATE usuarios SET 
        nome = '{$nome}', 
        email = '{$email}'
        WHERE id = '{$idUser}'";  
        $res = $conn->query($sql);
    }

?>

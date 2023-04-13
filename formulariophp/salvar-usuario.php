
<?php
    include('config.php'); //conexão com o banco de dados
    $idUser = $_GET["idUser"] ? $_GET["idUser"] : "";
    $email = $_GET["email"] ? $_GET["email"] : "";
    $data_cadastro = $_GET["date"] ? $_GET["date"] : "";
    $password_ = md5($_POST["password"]) ? $_POST["password"] : "";
    $hoje = date("Y/m/d");
        $checksql = mysqli_query($conn, $sql2);
    $hoje = date("Y-m-d");
    if($data_cadastro !== $hoje){
      header('HTTP/1.0 400 Bad Request');

          $sql = "INSERT INTO usuarios (nome, email, data_cadastro, password)  
          $res = $conn->query($sql);
        }
        else{
          header('HTTP/1.0 400 Bad Request');
      $retorno['code']    = 400;
      $retorno['message'] = "Insira a data correta.";

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

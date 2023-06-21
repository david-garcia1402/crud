<?php 
     include('config.php'); 


     $view = $_GET["view"]; 
     $viewsql = "SELECT id, nome, email, data_cadastro FROM usuarios WHERE id = '$view'"; //query para deletar o usuário do banco de dados através do ID
     $res = $conn->query($viewsql);

     $user_data = mysqli_fetch_assoc($res);
     echo json_encode($user_data);
    

?>
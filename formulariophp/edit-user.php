<?php 
     include('config.php'); 


     $edit = $_GET["edit"]; 
     $editsql = "SELECT id, nome, email, data_cadastro FROM usuarios WHERE id = '$edit'"; //query para deletar o usuário do banco de dados através do ID
     $res = $conn->query($editsql);

     $user_data = mysqli_fetch_assoc($res);
     echo json_encode($user_data);
    

?>
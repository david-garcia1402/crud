<?php 
     include('config.php'); 
     $excluir = $_GET["excluir"]; 
     $deletesql = "DELETE FROM usuarios WHERE id = '$excluir'"; //query para deletar o usuário do banco de dados através do ID
     $delres = $conn->query($deletesql);

     echo "$excluir"
?>
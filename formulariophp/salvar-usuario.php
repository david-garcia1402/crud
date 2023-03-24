<?php
    include('config.php');
    switch($_REQUEST["acao"]){
        case "cadastrar":
        $nome = $_GET["name"];
        $email = $_GET["email"];
        $data_cadastro = $_GET["date"];
        $password_ = $_GET["password"];
    
    $sql = 'INSERT INTO usuarios (nome, email, data_cadastro, password_)
            VALUES ($nome, $email, $data_cadastro, $password_)';
    
    $res = $conn->query($sql);
    }
?>
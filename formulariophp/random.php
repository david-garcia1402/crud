<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>
<body>
    <h1>INDEX</h1>
    <!-- 1 passo = criar banco de dados no php myadmin
         2 passo = tabelas (id int, nome varchar, email varchar, data_nasc date, senha varchar) 
         3 passo = criar o arquivo config para definir o banco de dados usado
         4 passo = $conn = new mysqli(host, user, pass, base); (dentro do arquivo config.php)
         5 passo = dar um "include("config.php")" dentro do index.php
         6 passo = colocar um switch($_REQUEST["acao"]) em salvar-usuario.php
                                        case 'cadastrar':
                                            $nome = $_GET["nome"]
                                            $email = $_GET["email"]
                                            $password = $_GET["password"]
                                            $data_cad = $_GET["data_cad"] 
                                                
                                            $sql = "INSERT INTO usuarios (nome, email, password, data_cad) VALUES 
                                                    ('{$nome}', '{$email}', '{$password}', '{$data_cad}'  )"
                                            
                                            $res = $conn->query($sql)    
    -->

</body>
</html>
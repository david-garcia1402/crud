<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color: #f2f2f2;">
<style>
    .card{
        width: 600px;
        margin-left: 250px;
    }
    .container{
        padding-top: 50px;
    }
    
    .form-label{
        margin-left: 180px;

    }

    


</style>
<form action="listar-usuario.php">
    <button type="submit" class="btn btn-primary m-3">Voltar</button>
</form>
<?php 
    include('config.php'); 
    $excluir = $_GET["excluir"]; 
    $deletesql = "DELETE FROM usuarios WHERE id = '$excluir'"; //query para deletar o usuário do banco de dados através do ID
    $delres = $conn->query($deletesql);

    if($delres == True){
        echo '<script>alert("Usuário excluído com sucesso!")</script>'; //caso for excluído com sucesso, irá mostrar este pop-alert que foi bem sucedido
    }else{
        echo  "<script>alert('ID não encontrado!)</script>"; //caso não for, pop-alert para mostrar que não encontrou o ID e após isso, será redirecionado para a lista de usuários
        header("Location: listar-usuario.php");
    }

?>

</form>
</body>
</html>
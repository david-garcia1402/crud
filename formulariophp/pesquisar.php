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
        width: 300px;
        margin-left: 380px;
    }
    .container{
        padding-top: 50px;
    }

</style>
<form action="procurar-user.php" method="GET" class="was-validated">
    <div class="container">
        <div class="row">
            <div class="card mb-3 mt-3">
                <label class="form-label mb-3"> Pesquisar usuário pelo <strong>Nome</strong> 
                    <input type="text" class="form-control" name="search">
                    <label class="mb-3 mt-3"></label>
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </label>
            </div>   
        </div>
        <?php 
            require_once('config.php');
            $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios";
            $listres = $conn->query($listsql); 
            
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>E-mail</th>";
            echo "<th>Data</th>";
            echo "</tr>";
            while($row = mysqli_fetch_row($listres)){ 
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
</form>
</body>
</html>

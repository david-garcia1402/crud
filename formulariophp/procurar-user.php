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
    <div class="container">
        <div class="row">
            <div class="card mb-3 mt-3">
                <label class="form-label"><strong>USUÁRIO ENCONTRADO:</strong></label>
                    <?php 
                        $pesquisa = $_GET["userSearch"];
                        require_once('config.php');  
                        $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios WHERE nome LIKE '%{$pesquisa}%'";  //query para pesquisar a pessoa através do $_get search
                        $listres = $conn->query($listsql); 
                        
                        echo "<table class='table'>"; //table que irá mostrar as informações da pessoa pesquisada
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
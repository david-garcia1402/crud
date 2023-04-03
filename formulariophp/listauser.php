<?php 
    require_once('config.php');

    $filtro = isset($_REQUEST['filtro']) ? $_REQUEST['filtro'] : '';
    $where = "";
    if(!empty($filtro)){
        $where = " WHERE nome LIKE '%{$filtro}%'";
    }

    $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios" . $where;  //página dedicada somente para listar os usuários
    $listres = $conn->query($listsql); 
    
    echo "<table class='table'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>E-mail</th>";
        echo "<th>Data</th>";
        echo "<th></th>";
        echo "</tr>";
    while($row = mysqli_fetch_row($listres)){ 
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td><button type='button' class='btn btn-outline-danger btn-sm btn-block' onclick='userDelete(\"$row[0]\")'>Excluir</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "</div>";
    $num_linhas = mysqli_num_rows($listres);
    if($num_linhas == 0){
        echo "<div class='container'>";
        echo"<div class='alert alert-info text-center'>";
        echo"<strong>Atenção!</strong> Não tem nenhum usuário listado neste momento.";
        echo "<div class='button mx-auto'>";
        echo "</div>";
    }
?>
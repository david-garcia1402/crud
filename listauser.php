<?php 
    require_once('config.php');

    $filtro = isset($_REQUEST['filtro']) ? $_REQUEST['filtro'] : '';
    $where = "";
    if(!empty($filtro)){
        $where = " WHERE nome LIKE '%{$filtro}%'";
    }

    $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios" . $where; 
    $listres = $conn->query($listsql); 
    
    echo "<table class='table'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>E-mail</th>";
        echo "<th>Data</th>";
        echo "<th></th>";
        // echo "<th></th>";
        // echo "<th></th>";
        echo "</tr>";
    while($row = mysqli_fetch_row($listres)){ 
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>";
        echo "<div>";
        echo "<button type='button' class='btn btn-outline-danger btn-sm' style='max-width:30px;' onclick='userDelete(\"$row[0]\")' title='Excluir usuário'><span class='fa fa-trash'></span></button>";
        echo "<button type='button' class='btn btn-outline-info btn-sm' style='max-width:30px; margin: 0px 5px 0px 5px' onclick='userView(\"$row[0]\")' title='Visualizar detalhes'><span class='fa fa-eye'></span></button>";
        echo "<button type='button' class='btn btn-outline-primary btn-sm' style='max-width:30px;' onclick='userEdit(\"$row[0]\")' title='Editar usuário'><span class='fa fa-edit'></span></button>";
        echo "</div>";
        echo "</td>";
        // echo "<div class='col-4'>";
        // echo "<td><button type='button' class='btn btn-outline-info btn-sm btn-block' style='max-width:30px;' title='Visualizar detalhes'><span class='fa fa-eye'></span></button></td>";
        // echo "</div>";
        // echo "<div class='col-4'>";
        // echo "<td><button type='button' class='btn btn-outline-primary btn-sm btn-block' data-toggle='modal' data-target='#editModal' style='max-width:30px; onclick='userEdit(\"$row[0]\")' 'title='Editar usuário'><span class='fa fa-edit'></span></button></td>";
        // echo "</div>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "</div>";
    $num_linhas = mysqli_num_rows($listres);
    if($num_linhas == 0){
        echo"<div class='alert alert-info'>";
        echo"<strong>Atenção!</strong> Não tem nenhum usuário listado neste momento.";
        echo "<div class='button mx-auto'>";
        echo "</div>";
    }
?>
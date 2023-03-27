<?php 
    require_once('config.php');
    $listsql = "SELECT id, nome, email, data_cadastro FROM usuarios";
    $listres = $conn->query($listsql); 
    
    echo '<table>';
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
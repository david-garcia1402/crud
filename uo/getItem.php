<?php

$idCategory = intval($_GET['idCategory']);
require_once('conf.php');

// Create connection
$conn = mysqli_connect($conf['dbHost'], $conf['dbUser'], $conf['dbPass'], $conf['dbDatabase']);

// Check connection
if ($conn) {
  $sql  = "SELECT item.Id,
                  item.Description
             FROM item
            WHERE item.Category = '{$idCategory}'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $selectItem  = "<select class='form-control' id='cbItem' name='cbItem'>";
    $selectItem .=   "<option value='0'>-- Choose --</option>";

    while($row = mysqli_fetch_assoc($result)) {
      $selectItem .= "<option value='{$row["Id"]}'>{$row["Description"]}</option>";
    }

    $selectItem .= "</select>";

    echo $selectItem;
  }

  mysqli_close($conn);
}

?>
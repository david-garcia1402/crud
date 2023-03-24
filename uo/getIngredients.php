<?php

$idItem   = intval($_GET['idItem']);
$quantity = intval($_GET['quantity']);

if (empty($quantity) or ($quantity < 1)) {
  $quantity = 1;
}

require_once('conf.php');

// Create connection
$conn = mysqli_connect($conf['dbHost'], $conf['dbUser'], $conf['dbPass'], $conf['dbDatabase']);

// Check connection
if ($conn) {
  $sql  = " SELECT ingredient.ID, ";
  $sql .=        " item_ingredients.QUANTITY * {$quantity} AS QUANTITY, ";
  $sql .=        " ingredient.DESCRIPTION, ";
  $sql .=        " ingredient.PRICE, ";
  $sql .=        " 0  as TOTAL, ";
  $sql .=        " 0  as IDTYPE, ";
  $sql .=        " '' as TYPE ";
  $sql .=   " FROM item, ingredient, item_ingredients ";
  $sql .=  " WHERE item_ingredients.IDITEM       = item.ID ";
  $sql .=    " AND item_ingredients.IDINGREDIENT = ingredient.ID ";
  $sql .=    " AND item.ID                       = '{$idItem}' ";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
      $selectItem[] = $row;
    }

    echo json_encode($selectItem);
  }

  mysqli_close($conn);
}

?>
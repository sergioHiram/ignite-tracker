<?php

require("../db.php");

$IdGroup = $_POST['IdGroup'];

$sql = "UPDATE G SET S = 2 WHERE IdG = '{$IdGroup}'";
$result = query($sql);
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}



?>

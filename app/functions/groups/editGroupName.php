<?php

require("../db.php");

$IdGroup = $_POST['IdGroup'];
$groupNameEdit = clean($_POST['groupNameEdit']);

$sql = "UPDATE G SET N_G = '{$groupNameEdit}' WHERE IdG = '{$IdGroup}'";
$result = query($sql);
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}



?>

<?php

require("../db.php");

$UserId = $_POST['UserId'];
$IdGroup = $_POST['IdGroup'];

$sql = "UPDATE IU SET Gr = '{$IdGroup}' WHERE Id = '{$UserId}'";
$result = query($sql); 
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}

?>

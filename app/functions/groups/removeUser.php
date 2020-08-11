<?php

require("../db.php");

$UserId = $_POST['UserId'];
$IdGroup = $_POST['IdGroup'];

$sql = "UPDATE IU SET Gr = 0 WHERE Id = '{$UserId}'";
$result = query($sql);
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}

?>

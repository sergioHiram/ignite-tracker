<?php

require("../db.php");

$UserId = $_POST['UserId'];

$sql = "UPDATE IU SET S = 0 WHERE Id = '{$UserId}'";
$result = query($sql); 
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}

?>

<?php

require("../db.php");

$UserId = $_POST['UserId'];

$sql = "DELETE FROM IU
WHERE Id = '{$UserId}'";
$result = query($sql);
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
} 

?>

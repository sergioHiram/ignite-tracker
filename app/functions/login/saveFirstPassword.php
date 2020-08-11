<?php
require("../db.php");

$UserId = clean($_POST['UserId']);
$Password = clean($_POST['Password']);

$Password_C = f_c($Password,'e');

$sql = "UPDATE IU
SET P='{$Password_C}'
WHERE Id = '{$UserId}'";
$result = query($sql);
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}

?>

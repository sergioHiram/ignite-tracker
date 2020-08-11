<?php
require("../db.php");

$UserId = clean($_POST['UserId']);
$Password = clean($_POST['Password']);

$Password_C = f_c($Password,'e');

$sql = "SELECT * FROM IU WHERE Id = '{$UserId}' AND P = '{$Password_C}'";
$result = query($sql);
$count = row_count($result);

if ($count == 1) {

  $UserId_C = f_c($UserId,'e');
  session_start();
  $_SESSION['Id'] = $UserId_C;
  $sql = "UPDATE IU SET LL = '{$Registered_Date}' WHERE Id = '{$UserId}'";
  $result = query($sql);
  $confirm = confirm($result);
  if ($confirm == true) {
    echo "success";
  }else {
    echo $confirm;
  }

}else {
  echo "fail";
}





?>

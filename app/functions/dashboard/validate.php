<?php

require("../db.php");
session_start();

if (!isset($_SESSION['Id'])) {
  echo "fail";
}else {
  $UserId = f_c($_SESSION['Id'],'d');
  $sql = "SELECT * FROM IU WHERE Id = '{$UserId}'";
  $result = query($sql);
  $count = row_count($result);
  if ($result == 1) {
    echo "success";
  }else {
    echo "fail";
  }

}



?>

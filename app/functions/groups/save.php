<?php

require("../db.php");
session_start();

$groupName = clean($_POST['groupName']);
$CreatedBy = $_SESSION['Id'];

$sql = "INSERT INTO G (N_G, AB_G, CD_G) VALUES('$groupName', '$CreatedBy', '$Registered_Date')";
$result = query($sql);
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}



?>

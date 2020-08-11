<?php

require("../db.php");
session_start();

$Name = f_c($_POST['Name'],'e');
$Email = f_c($_POST['Email'],'e');
$Gender = $_POST['Gender'];
$Role = clean($_POST['Role']);
$Password = f_c('Temp','e');
$AddedBy = $_SESSION['Id'];

$sql = "INSERT INTO IU (N, M, P, R, G, AB) VALUES('$Name', '$Email', '$Password', '$Role', '$Gender', '$AddedBy')";
$result = query($sql);
$confirm = confirm($result);
if ($confirm == true) {
  echo "success";
}else {
  echo $confirm;
}

?>

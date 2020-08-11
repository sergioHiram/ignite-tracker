<?php
session_start();
require("../db.php");

$UserId = f_c($_SESSION['Id'],'d');

$sql = "SELECT * FROM IU WHERE Id = '{$UserId}'";
$result = query($sql);
$row = fetch_array($result);
$Name = f_c($row['N'],'d');

echo $Name;



?>

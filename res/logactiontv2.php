<?php
include_once('helper.php');
$database_connection = db_connect();

$log = $_POST['tv2'];

$SQL = "INSERT INTO tv2 (tv2col1) VALUES ('{$log}');";
print($SQL);
mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error($database_connection));
mysqli_close($database_connection);
unset($database_connection, $SQL, $_POST, $log);

?>
<?php
include_once('helper.php');
$database_connection = db_connect();
$SQL = "SELECT * FROM video WHERE activan='1';";
$query = mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
$obj = mysqli_fetch_all($query, MYSQLI_NUM);
print($obj[0][1]);
mysqli_close($database_connection);
unset($database_connection, $SQL, $obj);

?>
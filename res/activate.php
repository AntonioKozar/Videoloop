<?php
session_start();
if(!isset($_SESSION['user']) or $_SESSION['user'] == "")
{

    header('Location: ../index.php');
}
include_once('helper.php');
$database_connection = db_connect();
$activate = $_POST['Activate'];
$SQL = "UPDATE video SET activan=0;";
mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
$SQL = "UPDATE video SET activan=1 WHERE idvideo='{$activate}';";
mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
$log = "File activated id: " . $activate . '. User: ' . $_SESSION['user'];
$SQL = "INSERT INTO log (logcol) VALUES ('{$log}');";
mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
mysqli_close($database_connection);
unset($database_connection, $SQL, $activate);
header('Location: ../Administrator/index.php');
?>

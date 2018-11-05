<?php
session_start();
if(!isset($_SESSION['user']) or $_SESSION['user'] == "")
{
    header('Location: ../index.php');
}
include_once('helper.php');
$database_connection = db_connect();
$delete = $_POST['Delete'];


$SQL = "SELECT * FROM video WHERE idvideo='{$delete}';";
$query = mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
$obj = mysqli_fetch_all($query, MYSQLI_NUM);
unlink($_SERVER['DOCUMENT_ROOT'] . '/videoloop/TV2/' . $obj[0][1]);
$SQL = "DELETE FROM video where idvideo='{$delete}';";
mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
$log = "File deleted id: " . $delete . ". File name: " . $obj[0][1] . '. User: ' . $_SESSION['user'];
$SQL = "INSERT INTO log (logcol) VALUES ('{$log}');";
mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
mysqli_close($database_connection);
unset($database_connection, $SQL, $activate);

header('Location: ../Administrator/index.php');

?>
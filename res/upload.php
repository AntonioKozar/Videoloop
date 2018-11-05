<?php
session_start();
if(!isset($_SESSION['user']) or $_SESSION['user'] == "")
{
    header('Location: ../index.php');
}
include_once('helper.php');
$database_connection = db_connect();

if($_FILES['video']['size'] != 0)
{
    //$files = glob($_SERVER['DOCUMENT_ROOT'] . '/videoloop/TV2/*')
    $name = $_FILES['video']['name'];
    $SQL = "INSERT INTO video (title, activan) VALUES ('{$name}', '0');";
    mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
    move_uploaded_file($_FILES['video']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/videoloop/TV2/' . $_FILES['video']['name']);
    $log = "File uploaded " . $_FILES['video']['name'] . '. User: ' . $_SESSION['user'];
    $SQL = "INSERT INTO log (logcol) VALUES ('{$log}');";
    mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
    mysqli_close($database_connection);
    unset($database_connection, $SQL, $log, $_FILES);
}

?>
<script>
    alert("Finish!");
</script>
<?php

header('Location: ../Administrator/index.php');

?>
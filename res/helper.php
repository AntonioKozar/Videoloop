<?php
function db_connect()
{
    $username = "root";
    $password = "";
    $host = "localhost";
    $database = "videoloop";
    $db_connection = mysqli_connect($host, $username, $password, $database) or die("Error : " . mysqli_error());
    mysqli_set_charset($db_connection, 'utf8');
    unset($username, $password, $host, $database);
    return $db_connection;
}
function UserVerification($pin)
{
    switch($pin)
    {
        case "0001":
            session_start();
            $_SESSION['user']="User 1";
            $name = true;
            log_message("Logiran korisnik User 1.");
            break;
        case "0002":
            session_start();
            $_SESSION['user']="User 2";
            $name = true;
            log_message("Logiran korisnik User 2.");
            break;
        default :
            $name = false;
            log_message("Pokušaj spajanja neuspješan, uneseni pin: " . $pin . ".");
            break;
    }
    unset($pin);
    return $name;
}
function log_message($message)
{
    $database_connection = db_connect();
    $SQL = "INSERT INTO log (logcol) VALUES ('{$message}');";
    mysqli_query($database_connection,$SQL) or die ("Error : " . mysqli_error());

    mysqli_close($database_connection);
    unset($SQL, $message, $database_connection);
}
?>
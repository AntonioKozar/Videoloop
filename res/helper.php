<?php
function db_connect()
{
    $username = "root";
    $password = "nqld.66R";
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
        case "0811":
            session_start();
            $_SESSION['user']="Antonio Kožar";
            $name = true;
            log_message("Logiran korisnik Antonio Kožar.");
            break;
        case "6854":
            session_start();
            $_SESSION['user']="Oto Wilhelm";
            $name = true;
            log_message("Logiran korisnik Oto Wilhelm.");
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
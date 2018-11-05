<?php
session_start();
if(!isset($_SESSION['user']) or $_SESSION['user'] == "")
{
header('Location: ../index.php');
}
include_once('../res/helper.php');
$database_connection = db_connect();
$SQL = "SELECT * FROM video;";
$query = mysqli_query($database_connection, $SQL) or die("Error : " . mysqli_error());
$obj = mysqli_fetch_all($query, MYSQLI_NUM);
//print_r($obj);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta charset="utf-8" />
</head>
<body>
    
        <table border="1" style="padding:5px">
            <tr>
                <th>Redni broj</th>
                <th>Naziv</th>
                <th>Datum</th>
                <th>Aktivan</th>
                <th>Obriši</th>
            </tr>
            <thead>

            </thead>
            <tbody>
                <?php 
                foreach($obj as $row)
                {
                ?>
                <tr>
                    <td>
                        <?php print($row[0]); ?>
                    </td>
                    <td>
                        <?php print($row[1]); ?>
                    </td>
                    <td>
                        <?php print($row[2]); ?>
                    </td>
                    <td><?php if($row[3] == 0){ ?>
                        <form action="../res/activate.php" method="post">
                            <button type="submit" value="<?php print($row[0]); ?>" name="Activate">Activate</button>
                            <?php } else { ?>
                            <button disabled="disabled" type="submit" value="<?php print($row[0]); ?>" name="Activate">Activate</button>
                            <?php } ?>
                        </form>
                    </td>
                    <td><?php if($row[3] == 0){ ?>
                        <form action="../res/delete.php" method="post">
                            <button type="submit" value="<?php print($row[0]); ?>" name="Delete">Delete</button>
                            <?php } else { ?>
                            <button disabled="disabled" type="submit" value="<?php print($row[0]); ?>" name="Delete">Delete</button>
                            <?php } ?>
                        </form>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    
    <form action="../res/upload.php" method="post" enctype="multipart/form-data">
        Upload video: <input type="file" name="video"/><input type="submit" />
    </form>
</body>
</html>

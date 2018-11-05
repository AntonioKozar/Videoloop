<?php
include_once('res/helper.php');
print("Dobrodošli na videoloop početnu stranu");
if(isset($_POST['pin']))
{
    if(UserVerification($_POST['pin']))
    {
        unset($_POST);
        header('Location: Administrator/index.php');
    }
    else
    {
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>
    <form method="post" autocomplete="off">
        <input type="password" placeholder="PIN" name="pin"/>
        <input type="submit" />
    </form>
</body>
</html>

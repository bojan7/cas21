<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="rute.php" method="post">

    <label>Unesite Ime</label><br>
    <input type="text" name="username" placeholder="Username">
    <br>
    <br>
    <label>Unesite Password</label><br>
    <input type="password" name="password" placeholder="Password">
    <br>
    <br>
    <input type="submit" name="akcija" value="Log in">
    </form>


    <?php
$msg=isset($msg)?$msg:"";
echo $msg;
    ?>
</body>
</html>
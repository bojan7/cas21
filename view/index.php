<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
var_dump($_SESSION['ulogovan']);
    ?>
    <h1>Dobro dosli</h1>

    <a href="rute.php?akcija=prikazunosavozila">Unos vozila</a>
    <br><br>
    <a href="">Unos vozaca</a>
    <br><br>
    <a href="rute.php?akcija=zaduzenje">Zaduzenje vozila</a>
    <br><br>
    <a href="rute.php?akcija=prikazvozila">Prikaz vozila</a>
    <br><br>
    <a href="rute.php?akcija=prikaz_vozaca">Prikaz vozaca</a>
</body>
</html>
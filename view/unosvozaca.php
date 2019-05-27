<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unos vozaca</title>
</head>

<body>
    <?php

    require_once('../model/DAO.php');

    $dao = new DAO();

    $svavozila = $dao->prikazVozila();

    $errors = isset($errors) ? $errors : array();

    $msg = isset($msg) ? $msg : "";
    echo "<h3 style='color:green; font-size:12px;'>$msg</h3>";

    ?>
    <h1>Unos Vozaca</h1>

    <form action="rute.php" method="GET">

        <label>Ime</label><br>

        <input type="text" name="ime" placeholder="Unesite ime">
        <span style="color:red;"><?php if (array_key_exists('ime', $errors)) echo $errors['ime']; ?></span>
        <br><br>

        <label>Prezime</label><br>
        <input type="text" name="prezime" placeholder="Unesite prezime">
        <span style="color:red;"><?php if (array_key_exists('prezime', $errors)) echo $errors['prezime']; ?></span>
        <br><br>

        <label>Godiste</label><br>
        <input type="text" name="godiste" placeholder="Unesite godiste">
        <span style="color:red;"><?php if (array_key_exists('godiste', $errors)) echo $errors['godiste']; ?></span>
        <br><br>

        <label>Izaberite vozilo</label><br>

        <select multiple name="vozila[]">
            <option value=""></option>

            <?php
            foreach ($svavozila as $vozilo) {
                echo "<option value='$vozilo[idvozila]'>
                $vozilo[imeproizvodjaca] - $vozilo[kategorija]</option>";
            }
            ?>

            <select>
                <span style="color:red;"><?php if (array_key_exists('vozilo', $errors)) echo $errors['vozilo']; ?></span>
                <br><br>

                <input type="submit" name="akcija" value="Unos Vozaca">

    </form>

</body>
</html>
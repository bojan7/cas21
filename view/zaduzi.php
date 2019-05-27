<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <a href="index.php">Nazad</a>
  <?php
  session_start();
  ///var_dump($_SESSION['ulogovan']);
  //zastita da korisnika preusmerimo na login ako pokusa da pristupi strani direktno a nije se ulogova prethodno
  if (isset($_SESSION['ulogovan'])) {
    ?>
    <?php
    require_once '../model/DAO.php';

    $dao = new DAO();

    $vozaci = $dao->prikazVozaca();
    $vozila = $dao->prikazVozila();

    ?>

    <form action="rute.php" method="get">

      <h3>Klijenti</h3>
      <select name="klijent">
        <option value="">Izaberite klijenta</option>
        <?php
        foreach ($vozaci as $v) {
          echo "  <option value='$v[idvozaca]'>$v[ime]  $v[prezime] </option>";
        }
        ?>
      </select>

      <h3>Vozila</h3>
      <select name="vozilo">
        <option value="">Izaberite vozilo</option>
        <?php
        foreach ($vozila as $v) {
          echo "<option value='$v[idvozila]'>$v[imeproizvodjaca]  $v[model] </option>";
        }
        ?>
      </select>

      <br><br>
      <input type="submit" name="akcija" value="Dodeli">

    </form>

    <?php
    $msg = isset($msg) ? $msg : "";
    echo "<span style='color:green; font-size:26px;'>$msg</span>";
    ?>
  <?php
} else {
  header("Location:login.php");
}
?>

</body>

</html>
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
 if(isset($_SESSION['ulogovan'])){
?>
    
    <table border="3">
      <tr>
      <th>Ime proizvodjaca</th>
      <th>Model</th>
      <th>Kategorija</th>
      <th>Godiste</th>
      <th>Cena</th>
      <th colspan="2">Akcija</th>
      </tr>

      <?php
  foreach($svavozila as $vozilo){
      echo "<tr>";
      echo "<td>$vozilo[imeproizvodjaca]</td>";
      echo "<td>$vozilo[model]</td>";
      echo "<td>$vozilo[kategorija]</td>";
      echo "<td>$vozilo[godiste]</td>";
      echo "<td>$vozilo[cena]</td>";
      echo "<td><a href='#'>Obrisi</a></td>";
      echo "<td><a href='rute.php?akcija=prikazizmenevozila&idvozila=$vozilo[idvozila]'>Izmeni</a></td>";
      echo "</tr>";
  }

      ?>


    </table>

    <?php
 }else{
     header("Location:login.php");
 }
    ?>
</body>
</html>
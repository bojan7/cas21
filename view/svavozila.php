<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
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
</body>
</html>
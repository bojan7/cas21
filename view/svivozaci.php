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
      <th>Ime</th>
      <th>Prezime</th>
      <th>Godiste</th>
      <th colspan="2">Akcija</th>
      </tr>

      <?php
  foreach($svivozaci as $vozac){
      echo "<tr>";
      echo "<td>$vozac[ime]</td>";
      echo "<td>$vozac[prezime]</td>";
      echo "<td>$vozac[godiste]</td>";
      echo "<td><a href='rute.php?akcija=obrisivozaca&idvoz=$vozac[idvozaca]'>Obrisi</a></td>";
      echo "<td><a href='#'>Izmeni</a></td>";
      echo "</tr>";
  }
    if(isset($msg)){
       echo $msg;
    }
      ?>


    </table>
</body>
</html>
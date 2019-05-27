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
    <?php
 }else{
     header("Location:login.php");
 }
    ?>
</body>
</html>
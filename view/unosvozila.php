<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unos vozila</title>
</head>
<body>
<h2>Unos vozila</h2>

<?php
require_once '../model/DAO.php';
$dao = new DAO();

$sviproizvodjaci=$dao->prikazSvihProizvodjaca();
//var_dump($sviproizvodjaci);

$svekategorije=$dao->prikazSvihKategorija();
//var_dump($svekategorije);

//kupljenje niza sa greskama ukoliko je kontroler pronaso jednu ili vise gresaka doslo je do formiranja niza errors
$errors=isset($errors)?$errors:array();

// provera da li postoji $msg ako postoji tj ako je kontroler kreirao promenljivu $msg uzimamo je i ispisujemo.
$msg=isset($msg)?$msg:"";
echo "<h3 style='color:green;'>$msg</h3>";
?>

<form action="rute.php" method="get">
<label>Izaberite proizvodjaca</label><br>

<select name="proizvodjacivozila">
<option value=""></option>
<?php
foreach ($sviproizvodjaci as $proizvodjac){
echo "<option value='$proizvodjac[imeproizvodjaca]'>$proizvodjac[imeproizvodjaca]</option>";

}

?>
<select>
<span style="color:red;"><?php if(array_key_exists('proizvodjac', $errors)) echo $errors['proizvodjac'];?></span>


<br><br>
<input type="text" name="modelvozila" placeholder=" Unesite model vozila">
<span style="color:red;"><?php  if(array_key_exists('model', $errors)) echo $errors['model'];?></span>
<br><br>
<label>Izaberite kategoriju</label><br>

<select name="kategorijavozila">
<option value=""></option>
<?php
foreach ($svekategorije as $kat){
echo "<option value='$kat[kategorija]'>$kat[kategorija]</option>";

}
?>
<select>
<span style="color:red;"><?php  if(array_key_exists('kategorija', $errors)) echo $errors['kategorija'];?></span>

<br><br>
<input type="text" name="godistevozila" placeholder=" Unesite godiste vozila">
<span style="color:red;"><?php  if(array_key_exists('godiste', $errors)) echo $errors['godiste'];?></span>
<br><br>
<input type="text" name="cenavozila" placeholder=" Unesite cenu vozila">
<span style="color:red;"><?php  if(array_key_exists('cena', $errors)) echo $errors['cena'];?></span>
<br><br>
<input type="submit" name="akcija" value="Unesite vozilo">

</form>
    
</body>
</html>
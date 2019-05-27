<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Izmena vozila</title>
</head>
<body>
<a href="index.php">Nazad</a>
<?php
session_start();
///var_dump($_SESSION['ulogovan']);
//zastita da korisnika preusmerimo na login ako pokusa da pristupi strani direktno a nije se ulogova prethodno
 if(isset($_SESSION['ulogovan'])){
?>
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

//var_dump($vozilo);
?>
    
<form action="rute.php" method="get">
<label>Izaberite proizvodjaca</label><br>

<?php foreach($vozilo as $v){  ?>

<select name="proizvodjacivozila">
<option value=""></option>
<?php
foreach ($sviproizvodjaci as $proizvodjac){
?>

<option value="<?php echo $proizvodjac['imeproizvodjaca']?>"
<?php if($proizvodjac['imeproizvodjaca']==$v['imeproizvodjaca']) echo 'selected';?>>
<?php echo $proizvodjac['imeproizvodjaca']; ?></option>

<?php
}
?>
<select>
<span style="color:red;"><?php if(array_key_exists('proizvodjac', $errors)) echo $errors['proizvodjac'];?></span>

<br><br>
<input type="text" name="modelvozila"  value="<?php echo $v['model'];?>">
<span style="color:red;"><?php  if(array_key_exists('model', $errors)) echo $errors['model'];?></span>
<br><br>
<label>Izaberite kategoriju</label><br>

<select name="kategorijavozila">
<option value=""></option>
<?php
foreach ($svekategorije as $kat){
?>

<option value="<?php echo $kat['kategorija']?>"
<?php if($kat['kategorija']==$v['kategorija']) echo 'selected';?>>
<?php echo $kat['kategorija']; ?></option>

<?php
}
?>
<select>
<span style="color:red;"><?php  if(array_key_exists('kategorija', $errors)) echo $errors['kategorija'];?></span>
<br><br>
<input type="text" name="godistevozila"  value=<?php echo $v['godiste'];?>>
<span style="color:red;"><?php  if(array_key_exists('godiste', $errors)) echo $errors['godiste'];?></span>
<br><br>
<input type="text" name="cenavozila"  value=<?php echo $v['cena'];?>>
<span style="color:red;"><?php  if(array_key_exists('cena', $errors)) echo $errors['cena'];?></span>
<br><br>

<?php } ?>

<input type="hidden" name="idvozila" value=<?php echo $v['idvozila'];?>>

<input type="submit" name="akcija" value="Izmenite vozilo">

</form>

<?php
 }else{
     header("Location:login.php");
 }
    ?>



</body>
</html>
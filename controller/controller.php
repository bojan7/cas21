<?php
require_once '../model/DAO.php';
class Controller{

public function prikazUnosaVozila(){

    include 'unosvozila.php';
}


public function unosVozila(){

   // var_dump("stigao");

   // KUPLJENJE PODATAKA 
   $proizvodjac=isset($_GET['proizvodjacivozila'])?$_GET['proizvodjacivozila']:"";
   $model=isset($_GET['modelvozila'])?$_GET['modelvozila']:"";
   $kategorija=isset($_GET['kategorijavozila'])?$_GET['kategorijavozila']:"";
   $godiste=isset($_GET['godistevozila'])?$_GET['godistevozila']:"";
   $cena=isset($_GET['cenavozila'])?$_GET['cenavozila']:"";

   //PROVERA PODATAKA TJ VALIDACIJA
  $errors=array();

  if(empty($proizvodjac)){
      $errors['proizvodjac']="Morate izabrati proizvodjaca vozila";
  }

  if(empty($model)){
    $errors['model']="Morate uneti model vozila";
 }

 if(empty($kategorija)){
    $errors['kategorija']="Morate izabrati kategoriju kojoj vozilo pripada";
}
if(empty($godiste)){
    $errors['godiste']="Morate uneti godiste auta";
}else{
    // ovde ce doci ako je nesto popunjeno
    // ovde radimo detaljniju proveru KAKO JE POPUNJENO 
    // I NACIN
 /* if($godiste>=1950 and $godiste<=2019){

  }else{
    $errors['godiste']="Godiste mora biti izmedju 1950 i 2019";
    var_dump($errors);
  }*/

// II NACIN
if(is_numeric($godiste)){
  if($godiste<1950 || $godiste>2019){
    $errors['godiste']="Godiste mora biti izmedju 1950 i 2019";
  }
}else{
    $errors['godiste']="Godiste mora biti numericka vrednost";
}

}

if(empty($cena)){
    $errors['cena']="Morate uneti cenu vozila";
}else{
    // ovde ce doci ako je nesto popunjeno
    // ovde radimo detaljniju proveru KAKO JE POPUNJENO 
}

var_dump($errors);

if(count($errors)==0){
// ovde ce biti dalji rad ka bazi jer ako udje u ovaj if znaci da prethodno nije nastala nijedna greska
$dao=new DAO();

$dao->unosVozila($proizvodjac,$model,$kategorija,$godiste,$cena);
$msg="Uspesan unos.";
include 'unosvozila.php';

}else{

$msg="Molimo Vas popunite sva polja korektno.";
include 'unosvozila.php';
}

}


public function prikazVozila(){
  $dao=new DAO();
  $svavozila=$dao->prikazVozila();
  include 'svavozila.php';
}



public function prikazVozaca(){
  $dao=new DAO();
  $svivozaci=$dao->prikazVozaca();
  include 'svivozaci.php';
}




public function zaduzenjeVozila(){

  include 'zaduzi.php';

}

public function zaduzi(){

  $idvozaca=isset($_GET['klijent'])?$_GET['klijent']:"";
  $idvozila=isset($_GET['vozilo'])?$_GET['vozilo']:"";


$errors=array();

if(empty($idvozaca)){
  $errors['idvozaca']="Morate izabrati klijenta";
}else{
// detaljnija provera da li u bazi postoji taj id koji je stigao 
}

if(empty($idvozila)){
  $errors['idvozila']="Morate izabrati vozilo"; 
}

if(count($errors)==0){

  $dao = new DAO();
  $dao->zaduzenje($idvozila,$idvozaca);
  $msg="Uspesna dodela vozila";
  include 'zaduzi.php';


}else{
  include 'zaduzi.php';
}
}

public function obrisiVozaca(){
$idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";

if(!empty($idvoz)){

  $dao=new DAO();
  $dao->obrisiVozaca($idvoz);
  $msg="Klijent obrisan";
  //izvlacenje vozaca iz baze ponovo nakon brisanja kako bi na strani prikazali ostale vozace
  $svivozaci=$dao->prikazVozaca();
  include 'svivozaci.php';
}

}


public function prikazIzmeneVozila(){

  $idvozila=isset($_GET['idvozila'])?$_GET['idvozila']:"";

  if(!empty($idvozila)){
    $dao=new DAO();
    $vozilo=$dao->prikazVozilaPoIdu($idvozila);
    //var_dump($vozilo);
    include 'izmenavozila.php';
 
  }

}


public function izmenaVozila(){

    
   // var_dump("stigao");

   // KUPLJENJE PODATAKA 
   $proizvodjac=isset($_GET['proizvodjacivozila'])?$_GET['proizvodjacivozila']:"";
   $model=isset($_GET['modelvozila'])?$_GET['modelvozila']:"";
   $kategorija=isset($_GET['kategorijavozila'])?$_GET['kategorijavozila']:"";
   $godiste=isset($_GET['godistevozila'])?$_GET['godistevozila']:"";
   $cena=isset($_GET['cenavozila'])?$_GET['cenavozila']:"";

  $idvozila=isset($_GET['idvozila'])?$_GET['idvozila']:"";

  var_dump($idvozila);

   //PROVERA PODATAKA TJ VALIDACIJA
  $errors=array();

  if(empty($proizvodjac)){
      $errors['proizvodjac']="Morate izabrati proizvodjaca vozila";
  }

  if(empty($model)){
    $errors['model']="Morate uneti model vozila";
 }

 if(empty($kategorija)){
    $errors['kategorija']="Morate izabrati kategoriju kojoj vozilo pripada";
}
if(empty($godiste)){
    $errors['godiste']="Morate uneti godiste auta";
}else{

if(is_numeric($godiste)){
  if($godiste<1950 || $godiste>2019){
    $errors['godiste']="Godiste mora biti izmedju 1950 i 2019";
  }
}else{
    $errors['godiste']="Godiste mora biti numericka vrednost";
}

}

if(empty($cena)){
    $errors['cena']="Morate uneti cenu vozila";
}else{
 
}

if(count($errors)==0){

 // var_dump("Nema gresaka");
$dao=new DAO();

$dao->updateVozila($proizvodjac,$model,$kategorija,$godiste,$cena,$idvozila);
$msg="Uspesna izmena vozila";
$vozilo=$dao->prikazVozilaPoIdu($idvozila);
include 'izmenavozila.php';

//var_dump("Uspesna izmena");
}else{
 // var_dump("Imamo neku gresku");
}  
}


public function login(){

$username=isset($_POST['username'])?$_POST['username']:"";
$password=isset($_POST['password'])?$_POST['password']:"";

if(!empty($username)&&!empty($password)){

$dao=new DAO();
$korisnik= $dao->login($username,$password);

//obavezna prover da li je metoda pronalsa u bazi korisnika sa tim podacima
// ako je korisnik stigao startujemo sesiju i smetamo korisnika u sesiju
if($korisnik){
session_start();
$_SESSION['ulogovan']=$korisnik;
include 'index.php';

}else{
  $msg="Greska u unosu usernama ili passworda.";
  include 'login.php';
}

}else{

  $msg="Molimo Vas unesite username i password";
  include 'login.php';
}



}






}

?>
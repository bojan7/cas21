<?php
require_once('../controller/controller.php');

// fajl sa rutama mora biti povezan sa kontrolerom
// u ovom fajlu proveravamo sve zahtebe korisnika i za svaki zahtev upucujemo na odredjenu metodu u kontroleru

$controller=new Controller();

$akcija=isset($_GET['akcija'])?$_GET['akcija']:"";

$akcija2=isset($_POST['akcija'])?$_POST['akcija']:"";




switch($akcija){

case "prikazunosavozila":
// preko objekta controller pozivamo metodu iz klase kontroler na izvrsenje
$controller->prikazUnosaVozila();
break;

case "Unesite vozilo":
$controller->unosVozila();
break;


case "prikazvozila":
$controller->prikazVozila();
break;

//prikazvozaca

case "prikaz_vozaca":
$controller->prikazVozaca();
break;

case "zaduzenje":
$controller->zaduzenjeVozila();
break;

case "Dodeli":
$controller->zaduzi();
break;

case "obrisivozaca":
$controller->obrisiVozaca();
break;

case "prikazizmenevozila":
$controller->prikazIzmeneVozila();
break;

case "Izmenite vozilo":
$controller->izmenaVozila();
break;
}



switch($akcija2){

    case "Log in":
    $controller->login();
    break;

}

?>
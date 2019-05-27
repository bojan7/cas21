<?php
require_once('../config/db.php');

class DAO{

    private $db;

  private $PRIKAZPROIZVODJACA="SELECT * FROM proizvodjaci";
  private $PRIKAZKATEGORIJA="SELECT * FROM kategorije";
  private $UNOSVOZILA="INSERT INTO vozila (imeproizvodjaca,model,kategorija,godiste,cena) VALUES(?,?,?,?,?)";
  private $PRIKAZVOZILA="SELECT * FROM vozila";
  private $PRIKAZVOZACA="SELECT * FROM vozaci";
  private $UNOSVOZACA = "INSERT INTO vozaci (ime, prezime, godiste) VALUES (?,?,?)";

  private $ZADUZENJE="INSERT INTO vozilavozaci(idvozila,idvozaca) VALUES(?,?)";
  private $OBRISIVOZACA="DELETE FROM vozaci WHERE idvozaca=?";

  private $PRIKAZVOZILAPOIDU="SELECT * FROM vozila WHERE idvozila=?";


  private $UPDATEVOZILO="UPDATE `vozila` SET `imeproizvodjaca`=?,`model`=?,`kategorija`=?,`godiste`=?,`cena`=? WHERE idvozila=?";
 
  private $LOGIN="SELECT * FROM korisnici WHERE username=? AND password=?";
 
  public function __construct(){
        $this->db=DB::createInstance();
    }

  /* public function prikazSvihRadnika(){
       $statement = $this->db->prepare($this->SVIRADNICI);

       $statement->execute();

       $result=$statement->fetchAll();
       return $result;
   }*/
   public function prikazSvihProizvodjaca(){
    $statement = $this->db->prepare($this->PRIKAZPROIZVODJACA);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}

public function prikazSvihKategorija(){
    $statement = $this->db->prepare($this->PRIKAZKATEGORIJA);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}
 

public function unosVozila($i,$m,$k,$g,$c){
    $statement = $this->db->prepare($this->UNOSVOZILA);
        $statement->bindValue(1,$i);
        $statement->bindValue(2,$m);
        $statement->bindValue(3,$k);
        $statement->bindValue(4,$g);
        $statement->bindValue(5,$c);
    $statement->execute();
   
}

public function prikazVozila(){
    $statement = $this->db->prepare($this->PRIKAZVOZILA);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}

public function prikazVozaca(){
    $statement = $this->db->prepare($this->PRIKAZVOZACA);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}


public function zaduzenje( $idvozila,$idvozaca){
    $statement = $this->db->prepare($this->ZADUZENJE);
    $statement->bindValue(1,$idvozila);
    $statement->bindValue(2,$idvozaca);
    $statement->execute();

}

public function unosVozaca($i,$p,$g){
    $statement = $this->db->prepare($this->UNOSVOZACA);
        $statement->bindValue(1,$i);
        $statement->bindValue(2,$p);
        $statement->bindValue(3,$g);
   return $statement->execute();
}

public function obrisiVozaca($id){
    $statement = $this->db->prepare($this->OBRISIVOZACA);
    $statement->bindValue(1,$id);
    $statement->execute();
}



public function prikazVozilaPoIdu($id){
    $statement = $this->db->prepare($this->PRIKAZVOZILAPOIDU);
    $statement->bindValue(1,$id);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}


public function updateVozila($i,$m,$k,$g,$c,$id){
    $statement = $this->db->prepare($this->UPDATEVOZILO);
        $statement->bindValue(1,$i);
        $statement->bindValue(2,$m);
        $statement->bindValue(3,$k);
        $statement->bindValue(4,$g);
        $statement->bindValue(5,$c);
        $statement->bindValue(6,$id);

    $statement->execute();
   
}


public function login( $u,$p){
    $statement = $this->db->prepare($this->LOGIN);
    $statement->bindValue(1,$u);
    $statement->bindValue(2,$p);
    $statement->execute();

    $result=$statement->fetch();
    return $result;

}

public function lastInsertId(){
    return $this->db->lastInsertId();
}

}





?>
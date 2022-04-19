<?php
 Class Recette {

public $id;

public $Titre;

public $Description;

public $Date;

public $Id_cuisinier;





////

function setId($id){
  $this->id = $id;
  
}

function getId(){
  return $this->id;
}
////
function setTitre($Titre){
  $this->Titre= $Titre;
  
}
function getTitre(){
  return $this->Titre;
}
////

function setDescription($Description){
  $this->Description = $Description;
  
}
function getDescription(){
  return $this->Description;
}

///

function setDate($Date){
  $this->Date = $Date;
  
}
function getDate(){
  return $this->Date;
}

////

function setId_cuisinier($Id_cuisinier){
  $this->Id_cuisinier = $Id_cuisinier;
  
}
function getId_cuisinier(){
  return $this->Id_cuisinier;
}


}
?>
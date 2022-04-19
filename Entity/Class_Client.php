<?php
 Class Client {

public $id;

public $Nom;

public $Prenom;

public $Temoignage;

public $Id_recette;

////

function setId($id){
  $this->id = $id;
  
}

function getId(){
  return $this->id;
}
////
function setNom($Nom){
  $this->Nom = $Nom;
  
}
function getNom(){
  return $this->Nom;
}
////

function setPrenom($Prenom){
  $this->Prenom = $Prenom;
  
}
function getPrenom(){
  return $this->Prenom;
}

///

function setTemoignage($Temoignage){
  $this->Temoignage = $Temoignage;
  
}
function getTemoignage(){
  return $this->Temoignage;
}

////

function setId_recette($Id_recette){
  $this->Id_recette = $Id_recette;
  
}
function getId_recette(){
  return $this->Id_recette;
}

////


}
?>
<?php
 Class Cuisinier {

public $id;

public $Nom;

public $Prenom;

public $Description;



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

function setDescription($Description){
  $this->Description = $Description;
  
}
function getDescription(){
  return $this->Description;
}











}
?>
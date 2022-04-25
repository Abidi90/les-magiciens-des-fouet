<?php
   
include '../Gourmet/Gourmet-HTML5/config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"]; 
		$prenom = $_POST["prenom"];
		$description= $_POST["description"];
		$imageCui = $_FILES["imgCui"]['name'];
    
	// Check connection

	if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
	}

	$sql = "INSERT INTO  cuisinier  (Nom, Prenom , Description,imgCui )
	VALUES ('".$name."', '" .$prenom."' , '".$description."' , '".$imageCui."')";

	if ($connect->query($sql) === TRUE) {
	echo "New record created successfully";
	
	} else {
	echo "Error: " . $sql . "<br>" . $connect->error;
	}



	


	
	}

?>
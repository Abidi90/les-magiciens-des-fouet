<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"]; 
		$prenom = $_POST["prenom"];
		$temoignage= $_POST["temoignage"];
        $Id_recette= $_POS["id_recette"];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "magicien_du_fouet";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO  client  (name, prenom , temoignage , id_recette)
	VALUES ('" . $name ."', '" . $prenom."' , '" . $temoignage."' ,'" . $id_recette."'   )";

	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}



	$conn->close();


	
	}

?>
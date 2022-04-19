<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"]; 
		$prenom = $_POST["prenom"];
		$description= $_POST["description"];
       

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

	$sql = "INSERT INTO  cuisinier  (name, prenom , description )
	VALUES ('" . $name ."', '" . $prenom."' , '" . $description."' , )";

	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}



	$conn->close();


	
	}

?>
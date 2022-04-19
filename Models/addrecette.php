<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titre = $_POST["titre"]; 
		$description = $_POST["description"];
		$date= $_POST["date"];
        $id_cuisinier= $_POS["id_cuisinier"];

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

	$sql = "INSERT INTO  recette  (titre, description , date , id_cuisinier)
	VALUES ('" . $titre ."', '" . $description."' , '" . $date."' ,'" . $id_cuisinier."'   )";

	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}



	$conn->close();


	
	}

?>
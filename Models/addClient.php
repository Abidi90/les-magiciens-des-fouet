<?php
include '../Gourmet/Gourmet-HTML5/config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
		$Nom   = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$Role =$_POST["role"];
        
		$email     =$_POST["email"];
		$password  =$_POST["password"];
		$image     =$_FILES["img"]["name"];

	
	// Check connection

	$sql = "INSERT INTO  users (Nom, Prenom , Role , email,password,img)
	VALUES ('" . $Nom ."', '" . $prenom."' , '" . $Role."' ,'" . $email."','" . $password."','" .$image."')";


	if ($connect->query($sql) === TRUE) {
		 header('Location:../Gourmet/Gourmet-HTML5/index.php');
	echo "New record created successfully";
	
	
	} else {
	echo "Error: " . $sql . "<br>" . $connect->error;
	}



	$connect->close();


	
	}

?>
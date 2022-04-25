<?php
include '../Gourmet/Gourmet-HTML5/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	

	$description = $_POST["content"]; 
	$date= date("Y-m-d H:i:s");
	session_start();
	$id_client= $_SESSION['id'];
	$imageT= $_FILES["imgTemoi"]['name'];

	// Create recette
	$sql = "INSERT INTO temoignage(content, Date, id_client, imgTemoi) 
	VALUES ('" . $description."' , '" . $date."' ,'" . $id_client."','" . $imageT."'   )";

	if ($connect->query($sql) === TRUE) {
		header('Location: ../Gourmet/Gourmet-HTML5/index.php');  
		echo "New record created successfully";
	
	} else {
		echo "Error: " . $sql . "<br>" . $connect->error;
	}



	


	
}

?>
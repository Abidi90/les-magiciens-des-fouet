<?php
include '../Gourmet/Gourmet-HTML5/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$titre = $_POST["titre"]; 
	$description = $_POST["description"];
	$date= date("Y-m-d H:i:s");
	$id_cuisinier= $_POST["cuisinier"];
	$image= $_FILES["img"]['name'];

	// Create recette
	$sql = "INSERT INTO  recette  (titre, description , DateCreation , id_cuisinier,imgRecette)
	VALUES ('" . $titre ."', '" . $description."' , '" . $date."' ,'" . $id_cuisinier."','" . $image."'   )";

	if ($connect->query($sql) === TRUE) {
		header('Location: ../Gourmet/Gourmet-HTML5/index.php');  
		echo "New record created successfully";
	
	} else {
		echo "Error: " . $sql . "<br>" . $connect->error;
	}



	$conn->close();


	
}

?>
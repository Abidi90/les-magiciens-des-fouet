<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
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

// sql to create table
$sql = "CREATE TABLE recette (
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Titre VARCHAR(50) NOT NULL,
Description VARCHAR(50) NOT NULL,
Date VARCHAR(50) ,
Id_cuisinier INT (11))";



if ($conn->query($sql) === TRUE) {
  echo "Table Client created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

?>
</body>
</html>



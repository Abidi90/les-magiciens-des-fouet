<?php
include 'config.php';
$Nom='';
$recette='';
$cuisinier='';
$temoignage='';
// Create connection

$sql = "SELECT Nom,Prenom,img,content FROM users INNER JOIN temoignage on id_client = users.id limit 4 "; // preparation requette
$comment = $connect->query($sql)->fetch_all(MYSQLI_ASSOC);

//Verification si $temoignage est vide ou nn


// dernier recette 

$sql = "SELECT imgRecette,description,id,titre FROM recette  order by DateCreation DESC";
$recette1 = $connect->query($sql)->fetch_assoc();
$cuisinier = '';



///// La recette de jour

$sql = "SELECT  titre,imgRecette,description,DateCreation FROM recette order by DateCreation DESC limit 4";
$recettes = $connect->query($sql)->fetch_all(MYSQLI_ASSOC);
//var_dump($recette);
//

//$sql3 = "SELECT  * FROM recette order by id desc limit 10";
//$dernier = $connect->query($sql3);

//login 


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.

    $stmt = $connect->prepare('SELECT id, password,Nom,Role FROM users WHERE email = ?');

    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();

    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password,$Nom,$Role);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($_POST['password']== $password) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            //session_regenerate_id();
            session_start();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $id;
            $_SESSION['Nom'] = $Nom;
            $_SESSION['Role'] = $Role;
            $stmt->close();
        } else {
            // Incorrect password
            echo 'Incorrect email and/or password! 1';
        }
    } else {
        // Incorrect username
        echo 'Incorrect email and/or password!';
    }
}


include 'index.phtml';
?>


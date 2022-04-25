<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "magicien_du_fouet";

// connect to DB
$connect = new mysqli($servername, $username, $password, $dbname); // creation instance

// $connect = $connect->set_charset("utf8");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

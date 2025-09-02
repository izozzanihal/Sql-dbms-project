<?php
$servername = "localhost";
$username = "root";   // default for XAMPP
$password = "";       // default empty
$dbname = "college_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
?>

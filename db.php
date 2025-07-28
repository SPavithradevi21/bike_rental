<?php
$host = "localhost";
$user = "root";
$password = ""; // No password by default in XAMPP
$dbname = "bike_rental";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

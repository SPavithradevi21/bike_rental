<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['customer_name']);
    $model = trim($_POST['bike_model']);
    $rental_date = $_POST['rental_date'];
    $return_date = $_POST['return_date'];

    if ($name && $model && $rental_date && $return_date) {
        $stmt = $conn->prepare("INSERT INTO rentals (customer_name, bike_model, rental_date, return_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $model, $rental_date, $return_date);
        $stmt->execute();
        $stmt->close();
        header("Location: read.php");
    } else {
        echo "All fields are required.";
    }
}
?>

<form method="post">
    <h2>Add New Rental</h2>
    <input type="text" name="customer_name" placeholder="Customer Name" required><br>
    <input type="text" name="bike_model" placeholder="Bike Model" required><br>
    <input type="date" name="rental_date" required><br>
    <input type="date" name="return_date" required><br>
    <button type="submit">Add Rental</button>
</form>

<a href="read.php">Back to Rentals</a>

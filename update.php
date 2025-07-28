<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("Rental ID missing.");
}
$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['customer_name']);
    $model = trim($_POST['bike_model']);
    $rental_date = $_POST['rental_date'];
    $return_date = $_POST['return_date'];

    if ($name && $model && $rental_date && $return_date) {
        $stmt = $conn->prepare("UPDATE rentals SET customer_name=?, bike_model=?, rental_date=?, return_date=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $model, $rental_date, $return_date, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: read.php");
    } else {
        echo "All fields are required.";
    }
}

$result = $conn->query("SELECT * FROM rentals WHERE id=$id");
$rental = $result->fetch_assoc();
?>

<form method="post">
    <h2>Edit Rental</h2>
    <input type="text" name="customer_name" value="<?= htmlspecialchars($rental['customer_name']) ?>" required><br>
    <input type="text" name="bike_model" value="<?= htmlspecialchars($rental['bike_model']) ?>" required><br>
    <input type="date" name="rental_date" value="<?= $rental['rental_date'] ?>" required><br>
    <input type="date" name="return_date" value="<?= $rental['return_date'] ?>" required><br>
    <button type="submit">Update Rental</button>
</form>

<a href="read.php">Back to Rentals</a>


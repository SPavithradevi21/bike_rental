<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM rentals WHERE id=$id");
}

header("Location: read.php");
?>

<?php
require 'db.php';
$result = $conn->query("SELECT * FROM rentals ORDER BY id DESC");
?>

<h2>Bike Rental Records</h2>
<a href="create.php">Add New Rental</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Bike Model</th>
        <th>Rental Date</th>
        <th>Return Date</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['customer_name']) ?></td>
        <td><?= htmlspecialchars($row['bike_model']) ?></td>
        <td><?= $row['rental_date'] ?></td>
        <td><?= $row['return_date'] ?></td>
        <td>
            <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

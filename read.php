<?php
include 'db.php';

$sql = "SELECT id, fname, email, phone FROM user";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Read Users</title>
</head>
<body>
    <h1>Users List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>
                        <a href='update.php?id=" . $row["id"] . "'>Update</a> | 
                        <a href='delete.php?id=" . $row["id"] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to update the user data
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE user SET fname='$fname', email='$email', phone='$phone', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Fetch the user data based on the ID from the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "Error: " . $conn->error;
            exit;
        }

        $user = $result->fetch_assoc();

        if (!$user) {
            echo "No user found with ID $id";
            exit;
        }
    } else {
        echo "No user ID provided";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <?php if (isset($user)): ?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" value="<?php echo $user['fname']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" value="<?php echo $user['phone']; ?>"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value=""><br>
        <input type="submit" value="Update">
    </form>
    <?php else: ?>
    <p>No user data to display.</p>
    <?php endif; ?>
</body>
</html>

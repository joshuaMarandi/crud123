<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (fname, email, phone, password) VALUES ('$fname', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
header("Location: read.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="create.php" method="post">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

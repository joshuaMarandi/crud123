<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "new";

$conn = new mysqli($servername,$username, $password,$dbname);

if($conn->connect_error){
    die("conn$conn failed" . $conn->connect_error);
}

echo "things went well "


?>
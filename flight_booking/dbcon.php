<?php

$servername = "localhost";
$username = "visvaa"; 
$password = "visvaa123";
$dbname = "Flight1"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>

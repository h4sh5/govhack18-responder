<?php

$servername = "localhost";
$dbname = 'responder';
$username = "oghacks";
$password = "g0vhack2018";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

?>
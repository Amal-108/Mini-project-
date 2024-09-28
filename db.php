<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "project";    

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 4306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
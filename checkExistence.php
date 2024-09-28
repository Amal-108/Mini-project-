<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 4306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $value = $_POST['value'];

    if ($type == 'email') {
        $sql = "SELECT * FROM Users WHERE email_id='$value'";
    } elseif ($type == 'phone') {
        $sql = "SELECT * FROM Users WHERE phone_number='$value'";
    } elseif ($type == 'username') {
        $sql = "SELECT * FROM Users WHERE username='$value'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo ucfirst($type) . " already exists.";
    } else {
        echo "";
    }
}

$conn->close();
?>

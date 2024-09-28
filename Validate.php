<?php
session_start();
require 'db.php'; // Assuming db.php contains the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Special case for admin
    if ($username === 'Amal' && $password === 'Tuttu@12375') {
        $_SESSION['userID'] = 'admin';
        $_SESSION['userType'] = 'admin';
        echo json_encode(['success' => true, 'redirect' => 'Amindashboarddemo.php']);
        exit();
    }

    // Query to check if user exists
    $stmt = $conn->prepare("SELECT UserID, Username, PasswordHash, UserType FROM Users WHERE Username = ? OR Email = ?");
    $stmt->bind_param('ss', $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['PasswordHash'])) {
            $_SESSION['userID'] = $user['UserID'];
            $_SESSION['userType'] = $user['UserType'];

            // Redirect based on user type
            if ($user['UserType'] == 'supervisor') {
                echo json_encode(['success' => true, 'redirect' => 'Supervisor_dashboard.php']);
            } else if ($user['UserType'] == 'student') {
                echo json_encode(['success' => true, 'redirect' => 'Student_dashboard.php']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid username or password. Please try again.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password. Please try again.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
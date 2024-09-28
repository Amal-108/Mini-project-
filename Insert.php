<?php
session_start();
require 'db.php'; // Assuming db.php contains the database connection

// New function to check existence
function checkExistence($field, $value) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Users WHERE $field = ?");
    $stmt->bind_param('s', $value);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

// New AJAX check for username and email
if (isset($_POST['check_field'])) {
    $field = $_POST['check_field'];
    $value = $_POST['check_value'];
    
    if ($field === 'username' || $field === 'email') {
        $exists = checkExistence($field, $value);
        echo json_encode(['exists' => $exists]);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate all required fields are present
    $required_fields = ['registerFirstname', 'registerLastname', 'registerEmail', 'registerPhone', 
                        'registerUsername', 'registerPassword', 'user-type', 'registerGender', 'registerDepartment'];
    
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            echo "All fields are required.";
            exit;
        }
    }

    $firstname = $_POST['registerFirstname'];
    $lastname = $_POST['registerLastname'];
    $email = $_POST['registerEmail'];
    $phone = $_POST['registerPhone'];
    $username = $_POST['registerUsername'];
    $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);
    $userType = $_POST['user-type'];
    $gender = $_POST['registerGender'];
    $department = $_POST['registerDepartment'];

    // Check if the username or email already exists
    $stmt = $conn->prepare("SELECT * FROM Users WHERE Username = ? OR Email = ?");
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User with this username or email already exists.";
    } else {
        if ($userType === 'supervisor') {
            $stmt = $conn->prepare("INSERT INTO Users (Firstname, Lastname, Email, Phone, Username, PasswordHash, UserType, Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssssss', $firstname, $lastname, $email, $phone, $username, $password, $userType, $gender);
            if ($stmt->execute()) {
                $supervisorID = $conn->insert_id;
                $stmt = $conn->prepare("INSERT INTO SupervisorDetails (SupervisorID, Department) VALUES (?, ?)");
                $stmt->bind_param('is', $supervisorID, $department);
                $stmt->execute();
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else if ($userType === 'student') {
            // Additional validation for student-specific fields
            $student_fields = ['registerYear', 'registerBatch', 'registerSection'];
            foreach ($student_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Year, Batch, and Section are required for student registration.";
                    exit;
                }
            }

            $year = $_POST['registerYear'];
            $batch = $_POST['registerBatch'];
            $section = $_POST['registerSection'];

            $stmt = $conn->prepare("INSERT INTO Users (Firstname, Lastname, Email, Phone, Username, PasswordHash, UserType, Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssssss', $firstname, $lastname, $email, $phone, $username, $password, $userType, $gender);
            if ($stmt->execute()) {
                $studentID = $conn->insert_id;
                $stmt = $conn->prepare("INSERT INTO StudentDetails (StudentID, Department, Year, Batch, Section) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param('isiss', $studentID, $department, $year, $batch, $section);
                if ($stmt->execute()) {
                    echo "Registration successful!";
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Invalid user type.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>
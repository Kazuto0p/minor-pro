<?php
// Establish connection to MySQL database
require_once "db_connection.php";

// Check if form is submitted
if(isset($_POST['login'])) {
    // Get form data and prevent SQL injection
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to check if user exists
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and verify password
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password verified, redirect to homepage or any other page
            header("Location: homepage.html");
            exit();
        }
    }

    // Invalid credentials
    echo "Invalid email or password";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

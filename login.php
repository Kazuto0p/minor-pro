<?php
// Include the database connection file
require_once "db_connection.php";

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row["password"])) {
            // Password is correct, user is authenticated
            $_SESSION['username'] = $row['email']; // Use the email as username
            $_SESSION['fullname'] = $row['fullname']; // Store the full name in the session

            // Redirect user to homepage
            header("Location: homepage.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password";
        }
    } else {
        // User does not exist
        echo "User does not exist";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>

<?php
// Establish connection to MySQL database
require_once "db_connection.php";

// Start the session
session_start();

// Check if form is submitted
if (isset($_POST['signup'])) {
    // Get form data
    $fullName = $_POST['fName'];
    $phoneNumber = $_POST['PhoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (fullname, phone, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullName, $phoneNumber, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Set session variables
        $_SESSION['username'] = $email;
        $_SESSION['fullname'] = $fullName;

        // User registered successfully, redirect to homepage
        header("Location: homepage.php");
        exit();
    } else {
        // Error inserting user
        echo "Error: " . $conn->error;
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
<?php
// Establish connection to MySQL database
require_once "db_connection.php";

// Start the session
session_start();

// Check if form is submitted
if (isset($_POST['signup'])) {
    // Get form data
    $fullName = $_POST['fName'];
    $phoneNumber = $_POST['PhoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (fullname, phone, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullName, $phoneNumber, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Set session variables
        $_SESSION['username'] = $email;
        $_SESSION['fullname'] = $fullName;

        // User registered successfully, redirect to homepage
        header("Location: homepage.php");
        exit();
    } else {
        // Error inserting user
        echo "Error: " . $conn->error;
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

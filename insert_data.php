<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$database = "leave_application"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sample query to insert data into the table
$sql = "INSERT INTO leave_applications (employee_name, leave_type, HOD, start_date, end_date, reason, phone)
        VALUES ('John Doe', 'Vacation', 'Bhama devi', '2024-04-01', '2024-04-05', 'Family vacation', '1234567890')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

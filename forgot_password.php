<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files and configurations

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the email address
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        // Handle invalid email address
        echo "Invalid email address!";
        exit; // Stop further execution
    }
    
    // Generate a random OTP
    $otp = mt_rand(100000, 999999);
    
    // Prepare the email message
    $to = $email;
    $subject = "Forgot Password OTP";
    $message = "Your OTP is: $otp";
    $headers = "From: umamahesh9447230@gmail.com"; // Change this to a valid email address
    
    // Send the email with the OTP
    $mailSent = mail($to, $subject, $message, $headers);
    if (!$mailSent) {
        // Handle email sending failure
        echo "Failed to send OTP. Please try again later.";
        exit; // Stop further execution
    }
    
    // Redirect user to OTP verification page
    header("Location: otp_verification.html");
    exit;
}
?>

<?php
session_start(); // <<< STEP 1 FIX: Start the session here!
include "connection.php";

// IMPORTANT: Check if user is logged in. If not, redirect them.
// This prevents errors if someone tries to access booking.php directly without being logged in.
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect to your login page
    exit();
}

// Get the user ID from the session and sanitize it
$logged_in_user_id = mysqli_real_escape_string($con, $_SESSION['id']); // Line 12 (now might be line 15 with comments)

// Sanitize all other POST variables to prevent SQL Injection
// This is crucial for security!
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$date = mysqli_real_escape_string($con, $_POST['date']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$branch = mysqli_real_escape_string($con, $_POST['branch']);
$service = mysqli_real_escape_string($con, $_POST['service']);

// Corrected SQL query (Fixes the syntax error with quotes around $name)
// Ensure 'appointment' matches your table name exactly (singular or plural)
$sql = "INSERT INTO appointment (`user_id`, `name`, `email`, `phone`, `gender`, `dates`, `times`, `branch`, `service`)
        VALUES ('$logged_in_user_id', '$name', '$email', '$phone', '$gender', '$date', '$time', '$branch', '$service')";
// The fix was specifically here:                           ^ added missing quote here, and removed extra quote before '$name'

$query = mysqli_query($con, $sql); // Line 17 (now might be line 29 with comments)

// Check if the query was successful before redirecting
if ($query) {
    header('location: http://localhost/elegance/index.php#appointment');
} else {
    // If there's an error, display it for debugging.
    // In a live site, you might redirect to an error page or log the error.
    echo "Error booking appointment: " . mysqli_error($con);
}

mysqli_close($con);
?>
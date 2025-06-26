<?php
include "connection.php";

// Check if the request method is POST and if required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['message'])) {

    // Sanitize and escape input data to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Prepare the SQL statement
    $sql = "INSERT INTO contact(`name`, `email`, `phone`, `message`) VALUES('$name', '$email', '$phone', '$message')";

    // Execute the query
    $query = mysqli_query($con, $sql);

    if ($query) {
        // If insertion is successful, send '1' back to AJAX call
        echo "1";
    } else {
        // If insertion fails, send an error message back
        echo "Error: " . mysqli_error($con);
    }

} else {
    // If it's not a POST request with required data, or data is missing
    // You can echo an error or just do nothing, depending on desired behavior.
    // For a direct browser access, you might want to redirect.
    // For an empty AJAX POST, it will just not echo '1'.
    echo "Invalid request or missing data.";
}

mysqli_close($con);
header("location:http://localhost/elegance/index.php");
exit(); // Always exit after outputting or redirecting

?>
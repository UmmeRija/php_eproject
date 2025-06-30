<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['message'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $sql = "INSERT INTO contact(`name`, `email`, `phone`, `message`) VALUES('$name', '$email', '$phone', '$message')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        echo "1";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid request or missing data.";
}
mysqli_close($con);
header("location:http://localhost/elegance/index.php");
exit(); 

?>
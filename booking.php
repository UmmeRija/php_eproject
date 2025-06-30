<?php
session_start();
include "connection.php";
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$logged_in_user_id = mysqli_real_escape_string($con, $_SESSION['id']); // Line 12 (now might be line 15 with comments)

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$date = mysqli_real_escape_string($con, $_POST['date']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$branch = mysqli_real_escape_string($con, $_POST['branch']);
$service = mysqli_real_escape_string($con, $_POST['service']);
$stylist = mysqli_real_escape_string($con, $_POST['stylist']);
if(empty($stylist)){
    $stylist = "No Preferences";
}

$sql = "INSERT INTO appointment (`user_id`, `name`, `email`, `phone`, `gender`, `dates`, `times`, `branch`, `service` , `stylist`)
        VALUES ('$logged_in_user_id', '$name', '$email', '$phone', '$gender', '$date', '$time', '$branch', '$service' , '$stylist')";

$query = mysqli_query($con, $sql); 


if ($query) {
    header('location: http://localhost/elegance/index.php#appointment');
} else {
    echo "Error booking appointment: " . mysqli_error($con);
}

mysqli_close($con);
?>
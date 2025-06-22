<?php
include "connection.php";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$sql = "INSERT INTO contact(`name`, `email`, `phone`, `message`) VALUES('$name', '$email', '$phone', '$message')";

$query = mysqli_query($con, $sql);
header('location:http://localhost/elegance/service.php');
mysqli_close($con);
?>

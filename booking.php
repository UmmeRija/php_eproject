<?php
include "connection.php";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$time = $_POST['time'];
$branch = $_POST['branch'];
$service = $_POST['service'];

$sql = "INSERT INTO appointment (`name`, `email`, `phone`, `gender`, `dates`, `times`, `branch`, `service`) 
        VALUES ('$name', '$email', '$phone', '$gender', '$date', '$time', '$branch', '$service')";

$query = mysqli_query($con, $sql);
header('location:http://localhost/elegance/service.php');
mysqli_close($con);
?>
?>
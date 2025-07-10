<?php
session_start();
include "connection.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$logged_in_user_id = $_SESSION['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$time = $_POST['time'];
$branch = $_POST['branch'];
$service = $_POST['service'];
$price = $_POST['price']; 
$stylist = $_POST['stylist'];

if(empty($stylist)){
    $stylist = "No Preferences";
}

$sql = "INSERT INTO appointment (`user_id`, `name`, `email`, `phone`, `gender`, `dates`, `times`, `branch`, `service`, `price`, `stylist`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "issssssssds", 
        $logged_in_user_id, 
        $name, 
        $email, 
        $phone, 
        $gender, 
        $date, 
        $time, 
        $branch, 
        $service, 
        $price, 
        $stylist
    );

    $query_success = mysqli_stmt_execute($stmt);

    if ($query_success) {
        header('location: http://localhost/elegance/index.php#appointment');
        exit();
    } else {
        echo "Error booking appointment: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($con);
}

mysqli_close($con);
?>

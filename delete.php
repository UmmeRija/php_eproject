<?php
session_start();
include "connection.php";

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$user_id_from_session = mysqli_real_escape_string($con, $_SESSION['id']);

if (isset($_GET['appointment_id'])) {
    $appointment_id_to_delete = (int)$_GET['appointment_id'];

    $stmt = $con->prepare("DELETE FROM appointment WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $appointment_id_to_delete, $user_id_from_session);
    $stmt->execute();
    $stmt->close();
}

$con->close();

header("Location: index.php"); // Or index.php?status=deleted if you want to handle messages
exit();
?>
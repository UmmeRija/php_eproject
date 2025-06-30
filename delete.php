<?php
include "connection.php";
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['message'] = [
        'type' => 'danger',
        'text' => 'Unauthorized access. Please log in to cancel appointments.'
    ];
    header("Location: index.php"); 
    exit();
}

if (isset($_GET['appointment_id'])) {
    $appointment_id = mysqli_real_escape_string($con, $_GET['appointment_id']);
    $user_id = mysqli_real_escape_string($con, $_SESSION['id']);

    $check_sql = "SELECT id FROM appointment WHERE id = '$appointment_id' AND user_id = '$user_id'";
    $check_query = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_query) == 1) {
        $sql = "DELETE FROM appointment WHERE id = '$appointment_id'";
        if (mysqli_query($con, $sql)) {
            $_SESSION['message'] = [
                'type' => 'success',
                'text' => 'Appointment cancelled successfully.'
            ];
        } else {
            $_SESSION['message'] = [
                'type' => 'danger', 
                'text' => 'Error cancelling appointment: ' . mysqli_error($con)
            ];
        }
    } else {
        $_SESSION['message'] = [
            'type' => 'warning', 
            'text' => 'Appointment not found or you do not have permission to cancel it.'
        ];
    }
} else {
    $_SESSION['message'] = [
        'type' => 'danger',
        'text' => 'Invalid request. Appointment ID not provided.'
    ];
}
header("Location: index.php"); 
exit();
?>
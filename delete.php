<?php
include "connection.php";
session_start();

// Ensure user is logged in
if (!isset($_SESSION['id'])) {
    $_SESSION['message'] = [
        'type' => 'danger', // Using danger for error message styling
        'text' => 'Unauthorized access. Please log in to cancel appointments.'
    ];
    header("Location: index.php"); // Redirect to your main page
    exit();
}

if (isset($_GET['appointment_id'])) {
    $appointment_id = mysqli_real_escape_string($con, $_GET['appointment_id']);
    $user_id = mysqli_real_escape_string($con, $_SESSION['id']);

    // First, check if the appointment belongs to the logged-in user
    $check_sql = "SELECT id FROM appointment WHERE id = '$appointment_id' AND user_id = '$user_id'";
    $check_query = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_query) == 1) {
        // Appointment belongs to the user, proceed with deletion
        $sql = "DELETE FROM appointment WHERE id = '$appointment_id'";
        if (mysqli_query($con, $sql)) {
            $_SESSION['message'] = [
                'type' => 'success', // Bootstrap success alert
                'text' => 'Appointment cancelled successfully.'
            ];
        } else {
            $_SESSION['message'] = [
                'type' => 'danger', // Bootstrap danger alert
                'text' => 'Error cancelling appointment: ' . mysqli_error($con)
            ];
        }
    } else {
        // Appointment not found or does not belong to the user
        $_SESSION['message'] = [
            'type' => 'warning', // Bootstrap warning alert
            'text' => 'Appointment not found or you do not have permission to cancel it.'
        ];
    }
} else {
    // appointment_id not provided
    $_SESSION['message'] = [
        'type' => 'danger',
        'text' => 'Invalid request. Appointment ID not provided.'
    ];
}

// Redirect back to the page where the appointments are displayed
header("Location: index.php"); // IMPORTANT: Replace 'index.php' with the actual name of your main page
exit();
?>
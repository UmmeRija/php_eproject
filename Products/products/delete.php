<?php
include("../includes/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Product deleted successfully!'); window.location.href='fetch.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

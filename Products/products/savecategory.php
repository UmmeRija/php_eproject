<?php
include("../includes/db.php");

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    mysqli_query($conn, $sql);
    echo "<script>alert('Category added!'); window.location.href='insertcategory.php';</script>";
}
?>

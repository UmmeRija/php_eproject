<?php
include("../includes/db.php");

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "upload_images/$image");

    $query = "INSERT INTO products (name, description, price, quantity, image, category_id)
              VALUES ('$name', '$desc', '$price', '$quantity', '$image', '$category_id')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product added successfully!'); window.location.href='fetch.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>






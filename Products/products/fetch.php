<?php
include("../includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product List</title>
    <link rel="stylesheet" href="../assets/libs/flot/css/float-chart.css">
    <link rel="stylesheet" href="../dist/css/style.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>

<body>
<div id="main-wrapper">

    <?php include("../includes/navbar.php"); ?>

    <div class="page-wrapper">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Product List</h2>
                <a href="insert.php" class="btn btn-success btn-md">Add Product</a>
                <a href="../index.php" class="btn btn-warning btn-md">Go Back</a>
            </div>

            <?php
            // CORRECTED SQL QUERY: Changed c.name to c.category_name and c.id to c.category_id
            $result = mysqli_query($conn, "SELECT p.*, c.category_name AS category FROM products p LEFT JOIN categories c ON p.category_id = c.category_id");
            
            if (!$result) {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                exit();
            }
            ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            $qty = $row['quantity'];
                            $status = ($qty == 0) ? "<span class='text-danger'>Sold Out</span>" : ($qty < 4 ? "<span class='text-warning'>Only $qty Left</span>" : "In Stock");
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td>Rs.<?= $row['price'] ?></td>
                                <td><?= $qty ?></td>
                                <td><?= $status ?></td>
                                <td><?= $row['category'] ?></td>
                                <td><img src="upload_images/<?= $row['image'] ?>" width="80"></td>
                                <td>
                                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Update</a> <br> <br>
                                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='9' class='text-center'>No products found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div> </div> </div> <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/waves.js"></script>
<script src="../dist/js/sidebarmenu.js"></script>
<script src="../dist/js/custom.min.js"></script>
</body>
</html>
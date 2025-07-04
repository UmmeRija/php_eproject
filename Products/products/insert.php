<?php
include("../includes/db.php");

$cats = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Product</title>

  <!-- Matrix Admin CSS -->
  <link rel="stylesheet" href="../assets/libs/flot/css/float-chart.css">
  <link rel="stylesheet" href="../dist/css/style.min.css">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">

  <!-- Optional Bootstrap 5 (already included in Matrix) -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
</head>

<body>
<div id="main-wrapper">

  <!-- TOPBAR + SIDEBAR -->
  <?php include("../includes/navbar.php"); ?>

  <!-- PAGE WRAPPER -->
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add Product</h2>
        <a href="fetch.php" class="btn btn-success btn-md">View Products</a>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">

              <form action="saveproduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label>Product Name:</label>
                  <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                  <label>Description:</label>
                  <textarea name="description" class="form-control" required></textarea>
                </div>

                <div class="form-group mb-3">
                  <label>Price:</label>
                  <input type="number" name="price" step="0.01" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                  <label>Quantity:</label>
                  <input type="number" name="quantity" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                  <label>Category:</label>
                  <select name="category_id" class="form-select" required>
                    <option value=""> Select Category</option>
                    <!-- Ya temporary options hain so ican select a feild in the form.-->
                    <option value="1">Conditioner</option>
                    <option value="2">Hair Care </option>
                    <option value="3">Mask</option>
                    <option value="3">Shampoo</option>
                  </select>
                </div>

                <div class="form-group mb-3">
                  <label>Image:</label>
                  <input type="file" name="image" class="form-control" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="fetch.php" class="btn btn-secondary">Cancel</a>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

    </div> <!-- /.container-fluid -->
  </div> <!-- /.page-wrapper -->
</div> <!-- /#main-wrapper -->

<!-- JS Scripts -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/waves.js"></script>
<script src="../dist/js/sidebarmenu.js"></script>
<script src="../dist/js/custom.min.js"></script>
</body>
</html>

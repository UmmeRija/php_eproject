<?php
include("../includes/db.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Product</title>

  <!-- Matrix Admin CSS -->
  <link rel="stylesheet" href="../assets/libs/flot/css/float-chart.css">
  <link rel="stylesheet" href="../dist/css/style.min.css">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>

<body>
<div id="main-wrapper">

  <!-- TOPBAR + SIDEBAR -->
  <?php include("../includes/navbar.php"); ?>

  <!-- PAGE WRAPPER -->
  <div class="page-wrapper">
    <div class="container-fluid">
      <h2 class="mb-4">Update Product</h2>

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">

              <form action="saveproduct.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="update" value="1">

                <div class="form-group mb-3">
                  <label>Product Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                </div>

                <div class="form-group mb-3">
                  <label>Description</label>
                  <textarea name="description" class="form-control" required><?php echo $row['description']; ?></textarea>
                </div>

                <div class="form-group mb-3">
                  <label>Price</label>
                  <input type="number" name="price" step="0.01" class="form-control" value="<?php echo $row['price']; ?>" required>
                </div>

                <div class="form-group mb-3">
                  <label>Quantity</label>
                  <input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>" required>
                </div>

                <div class="form-group mb-3">
                  <label>Image (Leave it empty to keep current image)</label>
                  <input type="file" name="image" class="form-control">
                  <img src="upload_images/<?php echo $row['image']; ?>" width="200" class="mt-2">
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-success">Update Product</button>
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


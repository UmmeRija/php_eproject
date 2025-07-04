<!DOCTYPE html>
<html>
<head>
  <title>Inserting Category</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
  <div class="container">
    <h2>Add Category</h2>
    <form action="savecategory.php" method="POST">
      <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Save Category</button>
    </form>
  </div>
</body>
</html>

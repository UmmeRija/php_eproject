<?php
include("connection.php");

$sql = "SELECT * FROM products";
$query = mysqli_query($con, $sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Products</title>

    <link rel="shortcut icon" href="img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/responsive.css"> 

    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #fff;
            background-color: #000;
        }

        .products-banner-section {
            text-align: center;
            padding: 60px 0;
        }

        .products-banner-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .products-page-title {
            font-family: 'Bellefair', serif;
            font-size: 3rem;
            color: #fff;
        }

        .products-sidebar {
            background: #111;
            padding: 30px;
            border-radius: 10px;
            color: #ccc;
        }

        .products-sidebar h5 {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .products-sidebar ul {
            list-style: none;
            padding: 0;
        }

        .products-sidebar ul li {
            margin-bottom: 10px;
        }

        .products-sidebar ul li a {
            color: #bbb;
            text-decoration: none;
        }

        .products-sidebar ul li a:hover,
        .products-sidebar ul li a.active {
            color: #e2b97f;
        }

        .price-filter-input {
            background: #000;
            border: 1px solid #333;
            color: #fff;
        }

        .price-filter-button {
            background-color: #e2b97f;
            color: #000;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            margin-top: 15px;
            width: 100%;
        }

        .product-card {
        background-color: #1a1a1a;
        border: 1px solid #333;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        min-height: 395px; 
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
        justify-content: space-between; 
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-card img {
        max-height: 200px;
        object-fit: contain;
        margin-bottom: 15px;
        width: 100%;
    }

    .product-card h5 {
        font-size: 16px;
        margin-bottom: 10px;
        color: #fff;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        line-height: 1.4; 
        height: 2.8em; 
    }

    .product-card .price {
        color: #f0c040;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-card .btn {
        background-color: #f0c040;
        border: none;
        color: #000;
        font-weight: 600;
    }

    .product-card .btn:hover {
        background-color: #d6a800;
    }
    </style>
</head>

<body>

    <?php include "navbar.php"; ?>

    <section class="products-banner-section">
        <div class="container">
            <h1 class="products-page-title">OUR PRODUCTS</h1>
            <p class="text-muted">Discover our curated selection of premium hair and skincare products designed to elevate your beauty routine.</p>
        </div>
        <img src="img/banner.jpg" alt="Products Banner" class="products-banner-image img-fluid">
    </section>

    <section class="products-content-area py-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="products-sidebar">
                        <h5>Shop By Category</h5>
                        <ul>
                            <li><a href="#" class="active">All Products</a></li>
                            <li><a href="#">Hair Care</a></li>
                            <li><a href="#">Skin Care</a></li>
                            <li><a href="#">Styling Tools</a></li>
                            <li><a href="#">Fragrances</a></li>
                            <li><a href="#">Gifts & Kits</a></li>
                        </ul>

                        <h5 class="mt-4">Shop By Brand</h5>
                        <ul>
                            <li><a href="#">Kerastase</a></li>
                            <li><a href="#">Skeyndor</a></li>
                            <li><a href="#">Lakme</a></li>
                            <li><a href="#">Other Brands</a></li>
                        </ul>

                        <h5 class="mt-4">Price Range</h5>
                        <div class="d-flex align-items-center">
                            <input type="number" class="form-control price-filter-input me-2" placeholder="Min" value="0">
                            <span class="text-white mx-1">-</span>
                            <input type="number" class="form-control price-filter-input ms-2" placeholder="Max" value="50000">
                        </div>
                        <button class="price-filter-button mt-3">Filter</button>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-lg-9 col-md-8">
                    <h2 class="text-white text-center mb-4">Shop Our Products</h2>
                    <div class="row g-4">
                        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product-card h-100">
                                    <img src="Products/products/upload_images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                                    <h5><?= $row['name'] ?></h5>
                                    <div class="price">PKR <?= number_format($row['price']) ?></div>
                                    <a href="description.php?id=<?= $row['id'] ?>" class="btn btn-md">View More</a>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

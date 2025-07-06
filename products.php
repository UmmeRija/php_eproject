<?php
session_start(); // Start the session to access cart data
include("connection.php");

$filter_category = $_GET['category'] ?? 'all';
$filter_price_range = $_GET['price_range'] ?? 'all'; 
$is_ajax_request = isset($_GET['ajax']) && $_GET['ajax'] === 'true';

$sql = "SELECT p.*, c.category_name
        FROM products p
        JOIN categories c ON p.category_id = c.category_id";

$where_clauses = [];

if($filter_category !== 'all'){
    $where_clauses[] = "c.category_name = '" . mysqli_real_escape_string($con, $filter_category) . "'";
}

if($filter_price_range !== 'all'){
    $price_parts = explode('-', $filter_price_range);

    if (count($price_parts) === 2) {
        $min_price = (int)$price_parts[0];
        $max_price_str = $price_parts[1]; 

        if ($max_price_str === 'plus') { 
            $where_clauses[] = "p.price >= " . $min_price;
        } else {
            $max_price = (int)$max_price_str;
            $where_clauses[] = "p.price BETWEEN " . $min_price . " AND " . $max_price;
        }
    }
}

if (!empty($where_clauses)) {
    $sql .= " WHERE " . implode(" AND ", $where_clauses);
}

$result_products = mysqli_query($con, $sql);

if(!$result_products){
    if ($is_ajax_request) {
        echo "<div class='col-12 text-center text-danger'>Error retrieving products: " . mysqli_error($con) . "</div>";
    } else {
        echo "<!doctype html><html><head><title>Error</title><link rel='stylesheet' href='css/bootstrap.min.css'><style>body{background-color:#000;color:#fff;display:flex;justify-content:center;align-items:center;height:100vh;font-family:'Bellefair',serif;} .error-message{text-align:center;padding:20px;border:1px solid #e2b97f;border-radius:8px;} h1{color:#e2b97f;}</style></head><body><div class='error-message'><h1>Database Error!</h1><p>Failed to retrieve products. Please try again later or contact support.</p><p>Technical details: " . mysqli_error($con) . "</p></div></body></html>";
    }
    exit(); 
}

if ($is_ajax_request) {
    ob_start(); 
    if (mysqli_num_rows($result_products) > 0) {
        while ($row = mysqli_fetch_assoc($result_products)) { ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-card h-100">
                    <img src="Products/products/upload_images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                    <h5><?= htmlspecialchars($row['name']) ?></h5>
                    <div class="price">PKR <?= number_format($row['price']) ?></div>
                    <a href="description.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-md">View More</a>
                </div>
            </div>
        <?php
        }
    } else {
        echo "<div class='col-12 text-center text-muted'>No products found for the selected filters.</div>";
    }
    echo ob_get_clean(); 
    exit(); 
}

// Calculate total items in cart for display on the button
$cart_item_count = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_item_count += $item['quantity'];
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Products</title>

    <link rel="shortcut icon" href="img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            background-color: #000;
            background-image: none;
            height: auto;
            position: relative;
            overflow: hidden;
            display: block;
        }

        .products-banner-section::before {
            display: none;
        }

        .products-banner-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
            margin-top: 20px;
            position: static;
            z-index: auto;
            filter: none;
        }

        .products-banner-section .container {
            text-align: center;
            padding-left: 15px;
            padding-right: 15px;
            position: static;
            z-index: auto;
        }

        .products-page-title {
            font-family: 'Bellefair', serif;
            font-size: 3rem;
            color: #fff;
            text-align: center;
            text-shadow: none;
            margin-bottom: 1rem;
            line-height: 1.2;
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
            background-color:black;
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
        .text-center.mb-4{
            color: #e0b57c;
        }

        /* Cart button in header */
        .cart-button {
            position: fixed; /* Changed to fixed for visibility */
            top: 20px;
            right: 20px;
            z-index: 1000; /* Ensure it's above other content */
            background-color: #333;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none; /* For the <a> tag */
        }
        .cart-button:hover {
            background-color: #444;
            color: #fff; /* Keep text white on hover */
        }
        .cart-item-count {
            background-color: #e2b97f;
            color: #000;
            border-radius: 50%;
            padding: 2px 7px;
            font-size: 0.8rem;
            font-weight: bold;
            position: absolute;
            top: -8px;
            right: -8px;
            min-width: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include "navbar.php"; ?>

    <!-- "View Cart" button that redirects to cart.php -->
    <a href="cart.php" class="cart-button">
        <i class="fas fa-shopping-cart"></i> 
        View Cart 
        <span class="cart-item-count" id="cartItemCount"><?= $cart_item_count ?></span>
    </a>

    <section class="products-banner-section">
        <div class="container">
            <h1 class="products-page-title">OUR PRODUCTS</h1>
        </div>
        <img src="img/banner.jpg" alt="Products Banner" class="products-banner-image img-fluid">
    </section>

    <section class="products-content-area py-5" id="products-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="products-sidebar">
                        <h5>Shop By Category</h5>
                        <ul>
                            <li><a href="?category=all&price_range=<?= htmlspecialchars($filter_price_range) ?>" class="filter-link <?= ($filter_category === 'all') ? 'active' : '' ?>">All Products</a></li>
                            <li><a href="?category=Conditioner&price_range=<?= htmlspecialchars($filter_price_range) ?>" class="filter-link <?= ($filter_category === 'Conditioner') ? 'active' : '' ?>">Conditioner</a></li>
                            <li><a href="?category=Hair Care&price_range=<?= htmlspecialchars($filter_price_range) ?>" class="filter-link <?= ($filter_category === 'Hair Care') ? 'active' : '' ?>">Hair Care</a></li>
                            <li><a href="?category=Mask&price_range=<?= htmlspecialchars($filter_price_range) ?>" class="filter-link <?= ($filter_price_range === 'Mask') ? 'active' : '' ?>">Mask</a></li>
                            <li><a href="?category=Shampoo&price_range=<?= htmlspecialchars($filter_price_range) ?>" class="filter-link <?= ($filter_price_range === 'Shampoo') ? 'active' : '' ?>">Shampoo</a></li>
                        </ul>

                        <h5 class="mt-4">Price Range</h5>
                        <div class="d-flex align-items-center">
                            <ul>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=all" class="filter-link <?= ($filter_price_range === 'all') ? 'active' : '' ?>">All Prices</a></li>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=0-1000" class="filter-link <?= ($filter_price_range === '0-1000') ? 'active' : '' ?>">Rs. 0 - Rs. 1,000</a></li>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=1000-1500" class="filter-link <?= ($filter_price_range === '1000-1500') ? 'active' : '' ?>">Rs. 1,000 - Rs. 1,500</a></li>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=1500-2000" class="filter-link <?= ($filter_price_range === '1500-2000') ? 'active' : '' ?>">Rs. 1,500 - Rs. 2,000</a></li>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=2000-4000" class="filter-link <?= ($filter_price_range === '2000-4000') ? 'active' : '' ?>">Rs. 2,000 - Rs. 4,000</a></li>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=4000-6000" class="filter-link <?= ($filter_price_range === '4000-6000') ? 'active' : '' ?>">Rs. 4,000 - Rs. 6,000</a></li>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=6000-8000" class="filter-link <?= ($filter_price_range === '6000-8000') ? 'active' : '' ?>">Rs. 6,000 - Rs. 8,000</a></li>
                                <li><a href="?category=<?= htmlspecialchars($filter_category) ?>&price_range=8000-9000" class="filter-link <?= ($filter_price_range === '8000-9000') ? 'active' : '' ?>">Rs. 8,000 - Rs. 9,000</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8">
                    <h2 class="text-center mb-4">Shop Our Products</h2>
                    <div class="row g-4" id="product-grid"> <?php
                        if (mysqli_num_rows($result_products) > 0) {
                            while ($row = mysqli_fetch_assoc($result_products)) { ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-card h-100">
                                        <img src="Products/products/upload_images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                                        <h5><?= htmlspecialchars($row['name']) ?></h5>
                                        <div class="price">PKR <?= number_format($row['price']) ?></div>
                                        <a href="description.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-md">View More</a>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            echo "<div class='col-12 text-center text-muted'>No products found for the selected filters.</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productGrid = document.getElementById('product-grid');
            const productsSection = document.getElementById('products-section');
            // Removed side cart specific JS

            // Existing filter logic
            document.querySelectorAll('.filter-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const clickedUrl = new URL(this.href);
                    
                    const newCategory = clickedUrl.searchParams.get('category');
                    const newPriceRange = clickedUrl.searchParams.get('price_range');

                    const requestUrl = `products.php?category=${encodeURIComponent(newCategory)}&price_range=${encodeURIComponent(newPriceRange)}&ajax=true`;

                    const newBrowserUrl = `?category=${encodeURIComponent(newCategory)}&price_range=${encodeURIComponent(newPriceRange)}`;
                    history.pushState(null, '', newBrowserUrl);

                    fetch(requestUrl)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.text();
                        })
                        .then(html => {
                            productGrid.innerHTML = html;

                            document.querySelectorAll('.filter-link').forEach(l => {
                                const lUrl = new URL(l.href);
                                const linkCategory = lUrl.searchParams.get('category');
                                const linkPriceRange = lUrl.searchParams.get('price_range');

                                if (linkCategory === newCategory && linkPriceRange === newPriceRange) {
                                    l.classList.add('active');
                                } else {
                                    l.classList.remove('active');
                                }
                            });

                            productsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        })
                        .catch(error => {
                            console.error('Error fetching products:', error);
                            productGrid.innerHTML = '<div class="col-12 text-center text-danger">Failed to load products. Please try again.</div>';
                        });
                });
            });
        });
    </script>
</body>

</html>
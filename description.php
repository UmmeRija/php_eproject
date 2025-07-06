<?php
session_start();
include 'connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p style='color: white; text-align: center; padding-top: 100px;'>Invalid product ID.</p>";
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM products WHERE id = $id LIMIT 1";
$query = mysqli_query($con, $sql);

if (!$query || mysqli_num_rows($query) == 0) {
    echo "<p style='color: white; text-align: center; padding-top: 100px;'>Product not found.</p>";
    exit;
}

$product = mysqli_fetch_assoc($query);

$related_products = [];
if (isset($product['name']) && !empty($product['name'])) {

    $product_name_lower = strtolower($product['name']);

    $stop_words = ['the', 'a', 'an', 'and', 'or', 'for', 'with', 'in', 'on', 'at', 'of', 'by', 'from', 'is', 'are', 'was', 'were', 'be', 'been', 'ing', 'ml', 'g', 'kg', 'oz', 'fl', 'x'];
    $product_name_clean = preg_replace('/[^\p{L}\p{N}\s]/u', '', $product_name_lower);

    $words = array_unique(array_filter(explode(' ', $product_name_clean)));

    $keywords = [];
    foreach ($words as $word) {
        if (!in_array($word, $stop_words) && strlen($word) > 2) {
            $keywords[] = $word;
        }
    }

    if (!empty($keywords)) {

        $where_clauses = [];
        foreach ($keywords as $keyword) {
            $where_clauses[] = "name LIKE '%" . mysqli_real_escape_string($con, $keyword) . "%'";
        }
        $where_clause_sql = implode(' OR ', $where_clauses);

        $related_sql = "SELECT * FROM products WHERE (" . $where_clause_sql . ") AND id != $id ORDER BY RAND() LIMIT 12";

        $related_query = mysqli_query($con, $related_sql);

        if ($related_query) {
            while ($row = mysqli_fetch_assoc($related_query)) {
                $related_products[] = $row;
            }
        } else {
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($product['name']) ?> - Product Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <head>

    <meta name="google-site-verification" content="HFbmTnl3DFY0OcfFafsHdSffB2itOoYCnX-j9iUUCqE" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="service.html">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/favicon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&amp;display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">


    <link rel="stylesheet" href="css/slidemenu.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Affinity Salon",
  "url": "https://www.affinity.salon/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<script type="application/ld+json">

{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Affinity Salon",
  "alternateName": "Affinity Hair & Beauty",
  "url": "https://www.affinity.salon/",
  "logo": "",
  "sameAs": [
    "https://www.facebook.com/affinityeliteindia",
    "https://www.instagram.com/affinity.elite",
    "index.html"
  ]
}
</script>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NJW4QH8K');</script>

    <style>
        body {
            background-color: #000;
            font-family: 'Inter', sans-serif;
            color: #fff;
        }
        .container {
            max-width: 1200px;
        }

        .product-detail-wrapper {
            background-color: black;
            padding: 40px;
            border-radius: 10px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        img.product-image-detail {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #333;
        }

        .product-info-column h1 {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            font-size: 2.8rem;
            margin-bottom: 10px;
        }

        .product-info-column .price-display {
            font-size: 2rem;
            color: #f0c040;
            font-weight: bold;
            margin-bottom: 20px;
            display: block;
        }

        .product-info-column .product-meta {
            font-size: 0.95rem;
            color: #bbb;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        .product-info-column .product-meta strong {
            color: #e2b97f;
        }
        .product-info-column .product-meta a {
            color: #f0c040;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .product-info-column .product-meta a:hover {
            color: #e2b97f;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .quantity-selector input[type="number"] {
            width: 60px;
            padding: 8px 0;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #000;
            color: #fff;
            text-align: center;
            -moz-appearance: textfield;
        }
        .quantity-selector input[type="number"]::-webkit-outer-spin-button,
        .quantity-selector input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .quantity-selector .btn {
            background-color: #333;
            border: 1px solid #555;
            color: #fff;
            border-radius: 5px;
            padding: 6px 12px;
            font-size: 1rem;
            line-height: 1;
            transition: background-color 0.2s ease;
        }
        .quantity-selector .btn:hover {
            background-color: #555;
        }
        .quantity-selector .mx-2 {
            margin-left: 0.5rem !important;
            margin-right: 0.5rem !important;
        }

        .btn-add-to-cart {
            background-color: #f0c040 !important;
            border: none;
            color: #000 !important;
            padding: 12px 30px;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;

        }
        .btn-add-to-cart:hover {
            background-color: #d6a800 !important;
            color: #000 !important;
        }

        .social-share {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #333;
        }
        .social-share span {
            color: #bbb;
            font-size: 0.95rem;
            margin-right: 15px;
        }
        .social-share a {
            color: #e2b97f;
            margin-right: 15px;
            font-size: 1.3rem;
            transition: color 0.3s;
        }
        .social-share a:hover {
            color: #f0c040;
        }

        .product-tabs-wrapper {
            margin-top: 40px;
        }
        .nav-tabs {
            border-bottom: 1px solid #333;
        }
        .nav-tabs .nav-link {
            color: #bbb;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 12px 25px;
            margin-right: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link:hover,
        .nav-tabs .nav-link.active {
            color: #e2b97f;
            background-color: transparent;
            border-color: #e2b97f;
        }
        .tab-content {
            background-color: #1a1a1a;
            padding: 30px;
            border: 1px solid #222;
            border-top: none;
            border-radius: 0 0 10px 10px;
            color: #ddd;
            line-height: 1.7;
        }

        .related-products-section {
            padding: 60px 0;
            text-align: center;
        }
        .related-products-section h2 {
            font-family: 'Bellefair', serif;
            font-size: 2.5rem;
            color: #e2b97f;
            margin-bottom: 40px;
        }


        .product-card {
            height: 100%;
            min-height: 380px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card img {
            max-height: 180px;
            object-fit: contain;
            margin-bottom: 15px;
            width: 100%;
            border-radius: 5px;
        }

        .product-card h5 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #fff;
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 1.4;
            height: 2.8em;
        }
        .product-card:hover {
            transform: translateY(-5px);

        }

        .product-card .price {
            color: #f0c040;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .product-card .btn-view-more {
            background-color: #e2b97f;
            border: none;
            color: #000;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        .product-card .btn-view-more:hover {
            background-color: #d6a25f;
            color: #000;
        }

        .owl-nav button {
            color: #e2b97f !important;
            font-size: 2rem !important;
            margin: 0 10px !important;
            transition: color 0.3s;
        }
        .owl-nav button:hover {
            color: #f0c040 !important;
            background-color: transparent !important;
        }
        .owl-dots .owl-dot span {
            background: #555 !important;
            transition: background 0.3s;
        }
        .owl-dots .owl-dot.active span {
            background: #e2b97f !important;
        }

        .side-cart {
            position: fixed;
            top: 0;
            right: -350px;
            width: 350px;
            height: 100%;
            background-color: #1a1a1a;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.5);
            z-index: 99999;
            display: flex;
            flex-direction: column;
            transition: right 0.3s ease-in-out;
            color: #fff;
        }


        .side-cart.open {
            right: 0;
        }

        .side-cart .cart-header {
            padding: 15px 20px;
            background-color: #222;
            border-bottom: 1px solid #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .side-cart .cart-header .cart-icon-bag {
            font-size: 1.5rem;
            color: #e2b97f;
            position: relative;
        }
        .side-cart .cart-header .cart-icon-bag span {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: #f0c040;
            color: #000;
            font-size: 0.7rem;
            border-radius: 50%;
            padding: 2px 6px;
            line-height: 1;
        }

        .side-cart .cart-header h4 {
            margin: 0;
            font-size: 1.3rem;
            color: #e2b97f;
            flex-grow: 1;
        }

        .side-cart .cart-header .close-btn {
            background: none;
            border: none;
            color: #bbb;
            font-size: 2rem;
            cursor: pointer;
            line-height: 1;
            padding: 0 5px;
        }
        .side-cart .cart-header .close-btn:hover {
            color: #f0c040;
        }

        .side-cart .cart-items-container {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .side-cart .empty-cart-text {
            text-align: center;
            color: #bbb;
            padding: 30px 0;
        }

        .side-cart .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #333;
        }
        .side-cart .cart-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .side-cart .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
            border: 1px solid #555;
        }

        .side-cart .item-details {
            flex-grow: 1;
            font-size: 0.95rem;
        }
        .side-cart .item-details h5 {
            color: #e2b97f;
            margin-bottom: 3px;
            font-size: 1rem;
            line-height: 1.3;
        }
        .side-cart .item-details p {
            margin: 0;
            color: #bbb;
            font-size: 0.85rem;
        }

        .side-cart .item-remove-btn {
            background: none;
            border: none;
            color: #ff4d4d;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 5px;
            transition: color 0.2s;
        }
        .side-cart .item-remove-btn:hover {
            color: #ff0000;
        }

        .side-cart .cart-footer {
            padding: 20px;
            background-color: #222;
            border-top: 1px solid #333;
        }

        .side-cart .subtotal {
            display: flex;
            justify-content: space-between;
            font-size: 1.1rem;
            font-weight: bold;
            color: #f0c040;
            margin-bottom: 15px;
        }

        .side-cart .btn-dark-checkout,
        .side-cart .btn-primary-checkout {
            display: block;
            width: 100%;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
        }

        .side-cart .btn-dark-checkout {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .side-cart .btn-dark-checkout:hover {
            background-color: #555;
            color: #fff;
        }

        .side-cart .btn-primary-checkout {
            background-color: #e2b97f;
            color: #000;
            border: none;
        }
        .side-cart .btn-primary-checkout:hover {
            background-color: #f0c040;
            color: #000;
        }

        .side-cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99998;
            display: none;
        }
        .side-cart-overlay.show {
            display: block;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <div class="product-detail-wrapper">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="Products/products/upload_images/<?= htmlspecialchars($product['image']) ?>" class="product-image-detail" alt="<?= htmlspecialchars($product['name']) ?>">
            </div>

            <div class="col-md-6 product-info-column">
                <h1><?= htmlspecialchars($product['name']) ?></h1>
                <span class="price-display">PKR <?= number_format($product['price'], 0) ?></span>

                <p class="product-description"><?= nl2br(htmlspecialchars(substr($product['description'], 0, 200))) ?><?= strlen($product['description']) > 200 ? '...' : '' ?></p>

                <form method="post" class="mt-4" name="add_to_cart_form"> <div class="quantity-selector mb-3 d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-dark" onclick="changeQty(-1)">−</button>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="100" class="form-control form-control-sm mx-2 text-center">
                        <button type="button" class="btn btn-sm btn-dark" onclick="changeQty(1)">+</button>
                    </div>

                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
                    <input type="hidden" name="product_price" value="<?= htmlspecialchars($product['price']) ?>">
                    <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['image']) ?>">
                    <button type="submit" name="add_to_cart" class="btn btn-add-to-cart">
                        <i class="fas fa-shopping-basket"></i> Add to Cart
                    </button>
                </form>

                <div class="social-share">
                    <span>Share:</span>
                    <a href="https://wa.me/?text=Check%20out%20this%20product:%20<?= urlencode(htmlspecialchars($product['name'])) ?>%20- YOUR_PRODUCT_URL?id=<?= $product['id'] ?>" target="_blank" title="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=YOUR_PRODUCT_URL?id=<?= $product['id'] ?>" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20product:%20<?= urlencode(htmlspecialchars($product['name'])) ?>&url=YOUR_PRODUCT_URL?id=<?= $product['id'] ?>" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=YOUR_PRODUCT_URL?id=<?= $product['id'] ?>&title=<?= urlencode(htmlspecialchars($product['name'])) ?>" target="_blank" title="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/your_brand_instagram_username" target="_blank" title="Share on Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="product-tabs-wrapper mt-5">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="additional-info-tab" data-bs-toggle="tab" data-bs-target="#additional-info" type="button" role="tab" aria-controls="additional-info" aria-selected="false">Additional Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews (0)</button>
                </li>
            </ul>
            <div class="tab-content" id="productTabsContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                    </div>
                <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                    <p>No additional information available for this product.</p>
                    </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <p>There are no reviews yet for this product.</p>
                    </div>
            </div>
        </div>
    </div>
</div>

<section class="related-products-section">
    <div class="container">
        <h2>Related Products</h2>
        <?php if (!empty($related_products)): ?>
            <div class="owl-carousel owl-theme related-products-carousel">
                <?php foreach ($related_products as $related_product): ?>
                    <div class="item">
                        <a href="?id=<?= htmlspecialchars($related_product['id']) ?>" class="product-card">
                            <img src="Products/products/upload_images/<?= htmlspecialchars($related_product['image']) ?>" alt="<?= htmlspecialchars($related_product['name']) ?>">
                            <h5><?= htmlspecialchars($related_product['name']) ?></h5>
                            <div class="price">PKR <?= number_format($related_product['price'], 0) ?></div>
                            <button class="btn btn-view-more">View More</button>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-muted">No related products found.</p>
        <?php endif; ?>
    </div>
</section>

<div class="side-cart" id="sideCart">
    <div class="cart-header">
        <div class="cart-icon-bag">
            <i class="fas fa-shopping-bag"></i> <span id="cartItemCount">0</span>
        </div>
        <h4>Your Cart</h4>
        <button type="button" class="close-btn" id="closeCartBtn">&times;</button>
    </div>
    <div class="cart-items-container" id="cartItemsContainer">
        <p class="empty-cart-text">Your cart is empty.</p>
    </div>
    <div class="cart-footer">
        <div class="subtotal">
            <span>Subtotal:</span>
            <span id="cartSubtotal">PKR 0</span>
        </div>
        <a href="checkout.php" class="btn btn-primary-checkout mt-2">Checkout</a>
    </div>
</div>
<?php include 'footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    function changeQty(delta) {
        const qtyInput = document.getElementById('quantity');
        let current = parseInt(qtyInput.value) || 1;
        const min = parseInt(qtyInput.min) || 1;
        const max = parseInt(qtyInput.max) || 100;

        current += delta;

        if (current < min) current = min;
        if (current > max) current = max;

        qtyInput.value = current;
    }

    $(document).ready(function(){
        $(".related-products-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            responsive: {
                0: { items: 1 },
                576: { items: 2 },
                768: { items: 3 },
                992: { items: 4 }
            }
        });

        const sideCart = $('#sideCart');
        const closeCartBtn = $('#closeCartBtn');
        const cartItemsContainer = $('#cartItemsContainer');
        const cartItemCount = $('#cartItemCount');
        const cartSubtotal = $('#cartSubtotal');

        const sideCartOverlay = $('<div class="side-cart-overlay" id="sideCartOverlay"></div>');
        $('body').append(sideCartOverlay);

        function updateSideCart(cartData) {
            cartItemCount.text(cartData.cart_count);
            cartSubtotal.text('PKR ' + cartData.cart_total.toLocaleString('en-PK'));

            cartItemsContainer.empty();

            if (cartData.cart_items && cartData.cart_items.length > 0) {
                cartData.cart_items.forEach(item => {
                    const itemHtml = `
                        <div class="cart-item">
                            <img src="Products/products/upload_images/${item.image}" alt="${item.name}">
                            <div class="item-details">
                                <h5>${item.name}</h5>
                                <p>${item.quantity} x PKR ${item.price.toLocaleString('en-PK')}</p>
                            </div>
                            <button class="item-remove-btn" data-product-id="${item.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    cartItemsContainer.append(itemHtml);
                });
            } else {
                cartItemsContainer.append('<p class="empty-cart-text">Your cart is empty.</p>');
            }
        }

        function openSideCart() {
            sideCart.addClass('open');
            sideCartOverlay.addClass('show');
        }

        function closeSideCart() {
            sideCart.removeClass('open');
            sideCartOverlay.removeClass('show');
        }

        $('form[name="add_to_cart_form"]').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = form.serialize() + '&action=add';

            $.ajax({
                url: 'addtocart.php',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        console.log('Product added:', response.message);
                        updateSideCart(response);
                        openSideCart();
                    } else {
                        console.error('Error adding product:', response.message);
                        alert('Error: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown, jqXHR.responseText);
                    alert('An error occurred while adding to cart. Please try again.');
                }
            });
        });

        closeCartBtn.on('click', closeSideCart);

        sideCartOverlay.on('click', closeSideCart);

        cartItemsContainer.on('click', '.item-remove-btn', function() {
            const productId = $(this).data('product-id');

            if (!confirm('Are you sure you want to remove this item from your cart?')) {
                return;
            }

            $.ajax({
                url: 'addtocart.php',
                method: 'POST',
                data: {
                    action: 'remove',
                    product_id: productId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        console.log('Product removed:', response.message);
                        updateSideCart(response);
                    } else {
                        console.error('Error removing product:', response.message);
                        alert('Error: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown, jqXHR.responseText);
                    alert('An error occurred while removing the item. Please try again.');
                }
            });
        });

        $.ajax({
            url: 'addtocart.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    updateSideCart(response);
                } else {
                    console.error('Error loading initial cart:', response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error loading initial cart:', textStatus, errorThrown, jqXHR.responseText);
            }
        });
    });
</script>
</body>
</html>
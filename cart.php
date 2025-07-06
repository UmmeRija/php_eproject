<?php
session_start();

$cart_items = $_SESSION['cart'] ?? [];

$cart_total = 0;
foreach ($cart_items as $item) {
    $cart_total += ($item['price'] * $item['quantity']);
}

$message = $_SESSION['cart_message'] ?? '';
unset($_SESSION['cart_message']);

?>
<!DOCTYPE html>
<html lang="en">
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
            color: #fff;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .cart-page-wrapper {
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        h2 {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            margin-bottom: 30px;
            text-align: center;
        }
        .table {
            background-color: #2b2b2b;
            color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead {
            background-color: #3a3a3a;
        }
        .table th, .table td {
            border-color: #444;
            vertical-align: middle;
            padding: 12px;
            color: #fff;
        }
        .table th {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            font-weight: normal;
        }
        .table tbody tr:hover {
            background-color: #333;
        }
        .cart-item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #444;
        }
        .remove-item-btn {
            background: none;
            border: none;
            color: #ff6b6b;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0;
            line-height: 1;
            transition: color 0.2s;
        }
        .remove-item-btn:hover {
            color: #ff3838;
        }
        .cart-summary {
            background-color: #222;
            padding: 25px;
            border-radius: 8px;
            margin-top: 30px;
        }
        .cart-summary .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 1rem;
            color: #ddd;
        }
        .cart-summary .summary-item.total {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f0c040;
            padding-top: 15px;
            margin-top: 15px;
            border-top: 1px solid #444;
        }
        .cart-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            gap: 15px;
        }
        .cart-actions .btn {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.2s ease;
            flex: 1;
        }
        .cart-actions .btn-continue {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .cart-actions .btn-continue:hover {
            background-color: #444;
            color: #fff;
        }
        .cart-actions .btn-checkout {
            background-color: #e2b97f;
            color: #000;
            border: none;
        }
        .cart-actions .btn-checkout:hover {
            background-color: #f0c040;
        }
        .empty-cart-message {
            text-align: center;
            padding: 50px 0;
            color: #bbb;
            font-size: 1.2rem;
        }
        .empty-cart-message a {
            color: #f0c040;
            text-decoration: none;
            font-weight: bold;
        }
        .empty-cart-message a:hover {
            text-decoration: underline;
        }
        .alert {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="cart-page-wrapper">
            <h2>Your Shopping Cart</h2>

            <?php if ($message): ?>
                <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <?php if (empty($cart_items)): ?>
                <div class="empty-cart-message">
                    <p>Your cart is empty.</p>
                    <p><a href="products.php">Start shopping now!</a></p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart_items as $item_id => $item): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="Products/products/upload_images/<?= htmlspecialchars($item['image'] ?? 'placeholder.jpg') ?>" class="cart-item-img me-3" alt="<?= htmlspecialchars($item['name']) ?>">
                                            <span><?= htmlspecialchars($item['name']) ?></span>
                                        </div>
                                    </td>
                                    <td>PKR <?= number_format($item['price'], 0) ?></td>
                                    <td>
                                        <span><?= htmlspecialchars($item['quantity']) ?></span>
                                    </td>
                                    <td>PKR <?= number_format($item['price'] * $item['quantity'], 0) ?></td>
                                    <td>
                                        <button class="remove-item-btn" data-item-id="<?= htmlspecialchars($item_id) ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-end">
                    <div class="col-md-6 col-lg-4">
                        <div class="cart-summary">
                            <div class="summary-item">
                                <span>Cart Subtotal</span>
                                <span>PKR <?= number_format($cart_total, 0) ?></span>
                            </div>
                            <div class="summary-item total">
                                <span>Total</span>
                                <span>PKR <?= number_format($cart_total, 0) ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-actions">
                    <a href="products.php" class="btn btn-continue">Continue Shopping</a>
                    <a href="checkout.php" class="btn btn-checkout">Proceed to Checkout</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateCart(itemId, action) {
                $.ajax({
                    url: 'update_cart.php',
                    method: 'POST',
                    data: {
                        action: action,
                        item_id: itemId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            location.reload(); 
                        } else {
                            alert('Error updating cart: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", status, error, xhr.responseText);
                        alert('An error occurred while updating cart. Please try again.');
                    }
                });
            }

            $('.remove-item-btn').on('click', function() {
                const itemId = $(this).data('item-id');
                if (confirm('Are you sure you want to remove this item from your cart?')) {
                    updateCart(itemId, 'remove');
                }
            });
        });
    </script>
</body>
</html>
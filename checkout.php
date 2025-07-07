<?php
session_start();
include "connection.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart_items = $_SESSION['cart'];
$cart_total = 0;
foreach ($cart_items as $item_id => $item) {
    $cart_total += ($item['price'] * $item['quantity']);
}

$is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$login_page_url = 'login.php';

$user_data = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'phone' => ''
];

if ($is_logged_in && isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $stmt = $con->prepare("SELECT name, email, phone FROM register WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            $full_name = $row['name'];
            $name_parts = explode(' ', $full_name, 2);
            $user_data['first_name'] = $name_parts[0] ?? '';
            $user_data['last_name'] = $name_parts[1] ?? '';
            
            $user_data['email'] = $row['email'];
            $user_data['phone'] = $row['phone'];
        }
        $stmt->close();
    }
}

if (isset($con) && $con) {
    $con->close();
}
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
        }
        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .checkout-page-wrapper {
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        h2 {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            margin-bottom: 20px;
        }
        h4.order-summary-title {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-label {
            color: #bbb;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .form-control,
        .form-select,
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            background-color: #fff !important;
            border: 2px solid #555 !important;
            color: #333 !important;
            padding: 7px 10px !important;
            border-radius: 7px !important;
            width: 100% !important;
            display: block !important;
            box-shadow: none !important;
            outline: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
        }

        .form-control:focus,
        .form-select:focus,
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus {
            background-color: #fff !important;
            border-color: #e2b97f !important;
            color: #333 !important;
            box-shadow: none !important;
            outline: none !important;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0px 1000px #fff inset !important;
            -webkit-text-fill-color: #333 !important;
            background-color: #fff !important;
            color: #333 !important;
        }

        .form-control::placeholder {
            color: #888;
        }

        .form-check-input {
            background-color: #333;
            border: 1px solid #555;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #e2b97f;
            border-color: #e2b97f;
        }
        .form-check-label {
            color: #bbb;
        }

        .checkout-login-coupon {
            background-color: #222;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 30px;
            color: #bbb;
            font-size: 0.9rem;
        }
        .checkout-login-coupon a {
            color: #f0c040;
            text-decoration: none;
            transition: color 0.3s;
        }
        .checkout-login-coupon a:hover {
            color: #e2b97f;
        }

        .order-summary-box {
            background-color: #222;
            padding: 25px;
            border-radius: 8px;
        }
        .order-summary-box hr {
            border-top: 1px solid #444;
            margin: 15px 0;
        }
        .order-summary-box .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 1rem;
            color: #ddd;
        }
        .order-summary-box .summary-item.total {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f0c040;
            padding-top: 15px;
            margin-top: 15px;
            border-top: 1px solid #444;
        }
        .order-summary-box .product-line-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dotted #333;
            font-size: 0.95rem;
        }
        .order-summary-box .product-line-item:last-of-type {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .order-summary-box .product-line-item .name-qty {
            color: #e2b97f;
            flex-grow: 1;
        }
        .order-summary-box .product-line-item .price {
            color: #fff;
            white-space: nowrap;
            margin-left: 15px;
        }

        .payment-methods {
            margin-top: 20px;
        }
        .payment-method-item {
            background-color: #2b2b2b;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: background-color 0.2s, border-color 0.2s;
            position: relative;
            box-shadow: none !important;
        }
        .payment-method-item:hover {
            background-color: #3a3a3a;
            border-color: #e2b97f;
            box-shadow: none !important;
        }
        .payment-method-item.selected {
            border-color: #f0c040;
            background-color: #2f2f2f;
            box-shadow: none !important;
        }
        .payment-method-item label {
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            color: #fff;
            cursor: pointer;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }
        .payment-method-item input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        .payment-method-item label::before {
            content: '';
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 1px solid #777;
            border-radius: 50%;
            margin-right: 12px;
            background-color: transparent;
            transition: background-color 0.2s, border-color 0.2s;
            box-sizing: border-box;
            box-shadow: none !important;
        }
        .payment-method-item input[type="radio"]:checked + label::before {
            background-color: #e2b97f;
            border-color: #e2b97f;
            box-shadow: none !important;
            padding: 4px;
            background-clip: content-box;
        }

        .payment-description {
            font-size: 0.85rem;
            color: #bbb;
            margin-top: 10px;
            padding-left: 30px;
        }

        .btn-place-order {
            background-color: #e2b97f !important;
            border: none;
            color: #000 !important;
            padding: 12px 30px;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }
        .btn-place-order:hover {
            background-color: #f0c040 !important;
            color: #000 !important;
        }

        .login-required-message {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
        }
        .login-required-message p {
            color: #fff;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }
        .login-required-message .btn-login-redirect {
            background-color: #f0c040;
            color: #000;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .login-required-message .btn-login-redirect:hover {
            background-color: #e2b97f;
            color: #000;
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

        .remove-item-btn {
            background: none;
            border: none;
            color: #ff6b6b;
            font-size: 1.1rem;
            cursor: pointer;
            margin-left: 10px;
            padding: 0;
            transition: color 0.2s ease;
            line-height: 1;
        }
        .remove-item-btn:hover {
            color: #ff3838;
        }
        .product-line-item .item-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-grow: 1;
        }
        .product-line-item .item-details .name-qty {
            flex-grow: 1;
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="checkout-page-wrapper">
            <?php if (!empty($cart_items)) { ?>
                <div class="row">
                    <div class="col-lg-7">
                        

                        <h2>Billing details</h2>
                        <form id="checkoutForm" action="process_order.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">*FIRST NAME</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" pattern="^[a-zA-Z\s'-]+$" title="First name can only contain letters, spaces, hyphens, or apostrophes." value="<?= htmlspecialchars($user_data['first_name']) ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">*LAST NAME</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" pattern="^[a-zA-Z\s'-]+$" title="Last name can only contain letters, spaces, hyphens, or apostrophes." value="<?= htmlspecialchars($user_data['last_name']) ?>" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="streetAddress" class="form-label">*STREET ADDRESS</label>
                                <input type="text" class="form-control mb-2" id="streetAddress" name="street_address_house" placeholder="House number and street name" required>
                                <input type="text" class="form-control" id="aptSuite" name="street_address_apt" placeholder="Apartment, suite, unit, etc. (optional)">
                            </div>
                            <div class="mb-3">
                                <label for="townCity" class="form-label">*TOWN / CITY</label>
                                <input type="text" class="form-control" id="townCity" name="city" required>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">*STATE</label>
                                <select class="form-select" id="state" name="state" required>
                                    <option value="">Select a state...</option>
                                    <option value="Sindh">Sindh</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                                    <option value="Balochistan">Balochistan</option>
                                    <option value="Islamabad">Islamabad Capital Territory</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pinCode" class="form-label">PIN CODE</label>
                                <input type="text" class="form-control" id="pinCode" name="pin_code">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">*PHONE</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" pattern="^0\d{3}-\d{7}$" title="Phone number format: 0XXX-XXXXXXX" value="<?= htmlspecialchars($user_data['phone']) ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">*EMAIL ADDRESS</label>
                                    <input type="email" class="form-control" id="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address." value="<?= htmlspecialchars($user_data['email']) ?>" required>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                
                            </div>
                            <div class="form-check mb-4">
                               
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-5">
                        <h4 class="order-summary-title">Your order</h4>
                        <div class="order-summary-box">
                            <div class="summary-item product-line-item header">
                                <span class="name-qty">Product</span>
                                <span class="price">Subtotal</span>
                            </div>
                            <hr>
                            <?php foreach ($cart_items as $item_id => $item) { ?>
                                <div class="summary-item product-line-item" data-item-id="<?= htmlspecialchars($item_id) ?>">
                                    <div class="item-details">
                                        <span class="name-qty"><?= htmlspecialchars($item['name']) ?> × <?= htmlspecialchars($item['quantity']) ?></span>
                                        <span class="price">PKR <?= number_format($item['price'] * $item['quantity'], 0) ?></span>
                                    </div>
                                    <button type="button" class="remove-item-btn" data-item-id="<?= htmlspecialchars($item_id) ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            <?php } ?>
                            <hr>
                            <div class="summary-item">
                                <span>Subtotal</span>
                                <span>PKR <?= number_format($cart_total, 0) ?></span>
                            </div>
                            <div class="summary-item">
                                <span>Shipping</span>
                                <span>FREE</span>
                            </div>
                            <hr>
                            <div class="summary-item total">
                                <span>Total</span>
                                <span>PKR <?= number_format($cart_total, 0) ?></span>
                            </div>

                            <div class="payment-methods mt-4">
                                <div class="form-check payment-method-item selected">
                                    <input class="form-check-input" type="radio" name="payment_method" id="paymentCreditCard" value="credit_card" checked>
                                    <label class="form-check-label" for="paymentCreditCard">
                                        Credit Card/Debit Card/NetBanking
                                    </label>
                                    <p class="payment-description">Pay securely by Credit or Debit card or Internet Banking through Razorpay.</p>
                                </div>
                                <div class="form-check payment-method-item">
                                    <input class="form-check-input" type="radio" name="payment_method" id="paymentCOD" value="cod">
                                    <label class="form-check-label" for="paymentCOD">
                                        Cash on delivery
                                    </label>
                                </div>
                            </div>

                            <?php if ($is_logged_in) { ?>
                                <button type="submit" class="btn btn-place-order" form="checkoutForm">PLACE ORDER</button>
                            <?php } else { ?>
                                <div class="login-required-message">
                                    <p>You must be logged in to place an order.</p>
                                    <a href="<?= htmlspecialchars($login_page_url) ?>" class="btn btn-login-redirect">Login or Sign Up</a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="empty-cart-message">
                    <p>Your cart is empty. Please add some items to proceed to checkout.</p>
                    <p><a href="products.php">Continue Shopping</a></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.payment-method-item').on('click', function() {
                $('.payment-method-item').removeClass('selected');
                $(this).addClass('selected');
                $(this).find('input[type="radio"]').prop('checked', true);
            });

            $(document).on('click', '.remove-item-btn', function() {
                var itemId = $(this).data('item-id');
                
                if (confirm('Are you sure you want to remove this item from your cart?')) {
                    $.ajax({
                        url: 'addtocart.php', 
                        method: 'POST',
                        data: {
                            action: 'remove',
                            product_id: itemId 
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log("Remove item AJAX success:", response);
                            if (response.status === 'success') {
                                location.reload(); 
                            } else {
                                alert("Error: " + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Remove item AJAX error:", status, error, xhr.responseText);
                            alert("There was an error removing the item. Please try again.");
                        }
                    });
                }
            });
        });
    </script>
    <?php include 'footer.php'; ?>

</body>
</html>
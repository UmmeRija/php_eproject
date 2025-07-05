<?php
session_start(); // Start the session to access $_SESSION

// Include your database connection (if you need it later, for now not strictly necessary for display)
// include 'connection.php';

// Initialize cart if it doesn't exist to prevent errors
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart_items = $_SESSION['cart'];
$cart_total = 0;
foreach ($cart_items as $item_id => $item) {
    $cart_total += ($item['price'] * $item['quantity']);
}

// --- NEW LOGIC FOR LOGIN CHECK ---
$is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$login_page_url = 'login.php'; // Adjust this to your actual login page URL
// --- END NEW LOGIC ---

// You can include your navbar and footer if they are separate files
// For now, I'm assuming you have them.
// include 'navbar.php';
// include 'footer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Your Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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
            margin-bottom: 20px; /* Adjusted margin for section titles */
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
        .form-control, .form-select {
            background-color: #000;
            border: 1px solid #333;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .form-control:focus, .form-select:focus {
            background-color: #000;
            color: #fff;
            border-color: #e2b97f;
            box-shadow: 0 0 0 0.25rem rgba(226, 185, 127, 0.25);
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

        /* Order Summary Section */
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
            align-items: flex-start;
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
            white-space: nowrap; /* Prevent price from wrapping */
            margin-left: 15px;
        }

        /* Payment methods */
        .payment-methods {
            margin-top: 20px;
        }
        .payment-method-item {
            background-color: #333;
            border: 1px solid #555;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .payment-method-item:hover {
            background-color: #444;
            border-color: #e2b97f;
        }
        .payment-method-item.selected {
            border-color: #f0c040;
            background-color: #2a2a2a;
        }
        .payment-method-item label {
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            color: #fff;
            cursor: pointer;
            margin-bottom: 0;
        }
        .payment-method-item input[type="radio"] {
            margin-right: 10px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 1px solid #777;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            outline: none;
            cursor: pointer;
            background-color: #000;
        }
        .payment-method-item input[type="radio"]:checked {
            background-color: #e2b97f;
            border-color: #e2b97f;
            box-shadow: 0 0 0 3px #e2b97f, inset 0 0 0 3px #000;
        }

        .payment-description {
            font-size: 0.85rem;
            color: #bbb;
            margin-top: 10px;
            padding-left: 28px; /* Align with radio button */
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

        /* Styles for login required message */
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
    </style>
</head>
<body>

    <?php include 'navbar.php'; // Include your navigation bar ?>

    <div class="container">
        <div class="checkout-page-wrapper">
            <?php if (!empty($cart_items)): ?>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="checkout-login-coupon">
                            Returning customer? <a href="#">Click here to login</a><br>
                            Have a coupon? <a href="#">Click here to enter your code</a>
                        </div>

                        <h2>Billing details</h2>
                        <form id="checkoutForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">*FIRST NAME</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">*LAST NAME</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" required>
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
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">*EMAIL ADDRESS</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="createAccount" name="create_account">
                                <label class="form-check-label" for="createAccount">
                                    Create an account?
                                </label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="shipToDifferentAddress" name="ship_to_different_address">
                                <label class="form-check-label" for="shipToDifferentAddress">
                                    Ship to a different address?
                                </label>
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
                            <?php foreach ($cart_items as $item_id => $item): ?>
                                <div class="summary-item product-line-item">
                                    <span class="name-qty"><?= htmlspecialchars($item['name']) ?> × <?= htmlspecialchars($item['quantity']) ?></span>
                                    <span class="price">PKR <?= number_format($item['price'] * $item['quantity'], 0) ?></span>
                                </div>
                            <?php endforeach; ?>
                            <hr>
                            <div class="summary-item">
                                <span>Subtotal</span>
                                <span>PKR <?= number_format($cart_total, 0) ?></span>
                            </div>
                            <div class="summary-item">
                                <span>Shipping</span>
                                <span>FREE</span> </div>
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

                            <?php if ($is_logged_in): ?>
                                <button type="submit" class="btn btn-place-order" form="checkoutForm">PLACE ORDER</button>
                            <?php else: ?>
                                <div class="login-required-message">
                                    <p>You must be logged in to place an order.</p>
                                    <a href="<?= htmlspecialchars($login_page_url) ?>" class="btn btn-login-redirect">Login or Sign Up</a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-cart-message">
                    <p>Your cart is empty. Please add some items to proceed to checkout.</p>
                    <p><a href="index.php">Continue Shopping</a></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add/remove 'selected' class for visual feedback on payment method selection
            $('.payment-method-item').on('click', function() {
                $('.payment-method-item').removeClass('selected');
                $(this).addClass('selected');
                $(this).find('input[type="radio"]').prop('checked', true);
            });
        });
    </script>
    <?php include 'footer.php'; // Include your footer ?>

</body>
</html>
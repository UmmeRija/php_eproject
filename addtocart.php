<?php
session_start(); // Start the session to access $_SESSION
include 'connection.php'; // Include your database connection

// Set header to return JSON
header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => 'Invalid request.'];

// Helper function to get current cart data
function getCartData() {
    $cart_count = 0;
    $cart_total = 0;
    $cart_items = [];

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $item) {
            $cart_count += $item['quantity'];
            $cart_total += ($item['price'] * $item['quantity']);
            // Add the product ID to the item array before sending to frontend
            $cart_items[] = ['id' => $id] + $item;
        }
    }
    return [
        'cart_count' => $cart_count,
        'cart_total' => $cart_total,
        'cart_items' => $cart_items
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

    if ($action === 'add') {
        // --- ADD TO CART LOGIC ---
        $item_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
        $item_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
        $item_price = filter_input(INPUT_POST, 'product_price', FILTER_VALIDATE_FLOAT);
        $item_image = filter_input(INPUT_POST, 'product_image', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

        // Validate inputs
        if ($item_id === false || $item_name === null || $item_price === false || $item_image === null || $quantity === false || $quantity < 1) {
            $response['message'] = 'Missing or invalid product data for add action.';
            echo json_encode($response);
            exit();
        }

        // Initialize cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add or update item in cart
        if (isset($_SESSION['cart'][$item_id])) {
            $_SESSION['cart'][$item_id]['quantity'] += $quantity; // Add to existing quantity
        } else {
            $_SESSION['cart'][$item_id] = [
                'name' => $item_name,
                'price' => $item_price,
                'image' => $item_image,
                'quantity' => $quantity
            ];
        }

        $cart_data = getCartData();
        $response = array_merge(['status' => 'success', 'message' => 'Item added to cart successfully!'], $cart_data);

    } elseif ($action === 'remove') {
        // --- REMOVE FROM CART LOGIC ---
        $item_id_to_remove = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

        if ($item_id_to_remove === false) {
            $response['message'] = 'Invalid product ID for removal.';
            echo json_encode($response);
            exit();
        }

        if (isset($_SESSION['cart'][$item_id_to_remove])) {
            unset($_SESSION['cart'][$item_id_to_remove]);
            $response['status'] = 'success';
            $response['message'] = 'Item removed from cart successfully!';
        } else {
            $response['message'] = 'Item not found in cart.';
        }

        $cart_data = getCartData();
        $response = array_merge($response, $cart_data); // Merge status/message with updated cart data

    } else {
        $response['message'] = 'Unknown action.';
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // --- GET CART DATA LOGIC (for initial load) ---
    $cart_data = getCartData();
    $response = array_merge(['status' => 'success', 'message' => 'Current cart state loaded.'], $cart_data);

} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
exit();
?>
<?php
session_start(); // THIS IS CRITICAL - MUST BE AT THE VERY TOP

header('Content-Type: application/json'); // Ensure JSON response

// Initialize cart if it doesn't exist to prevent errors
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $itemId = $_POST['item_id'] ?? null;

    // Handle 'remove' action
    if ($action === 'remove' && $itemId !== null) {
        if (isset($_SESSION['cart'][$itemId])) {
            unset($_SESSION['cart'][$itemId]); // Remove the item from the session cart
            
            // Send a success response back to the JavaScript
            echo json_encode(['status' => 'success', 'message' => 'Item removed from cart.']);
            exit(); // Terminate script execution after sending response
        } else {
            // Item not found in cart
            echo json_encode(['status' => 'error', 'message' => 'Item not found in cart.']);
            exit();
        }
    }
}

// If no valid action or request method, send an error response
echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
?>
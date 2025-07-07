<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function getCartDataForResponse() {
    $cart_count = 0;
    $cart_total = 0;
    $cart_items_list = [];

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $item) {
            $cart_count += $item['quantity'];
            $cart_total += ($item['price'] * $item['quantity']);
            $cart_items_list[] = ['id' => $id] + $item;
        }
    }
    return [
        'cart_count' => $cart_count,
        'cart_total' => $cart_total,
        'cart_items' => $cart_items_list
    ];
}

$response = ['status' => 'error', 'message' => 'Invalid request.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'add':
            $item_id = (int)($_POST['product_id'] ?? 0);
            $item_name = $_POST['product_name'] ?? '';
            $item_price = (float)($_POST['product_price'] ?? 0);
            $item_image = $_POST['product_image'] ?? 'placeholder.jpg';
            $quantity = (int)($_POST['quantity'] ?? 1);

            if ($item_id <= 0 || empty($item_name) || $item_price <= 0 || $quantity <= 0) {
                $response['message'] = 'Invalid product data.';
            } else {
                if (isset($_SESSION['cart'][$item_id])) {
                    $_SESSION['cart'][$item_id]['quantity'] += $quantity;
                    $response = getCartDataForResponse();
                    $response['message'] = 'Quantity updated.';
                } else {
                    $_SESSION['cart'][$item_id] = [
                        'name' => $item_name,
                        'price' => $item_price,
                        'image' => $item_image,
                        'quantity' => $quantity
                    ];
                    $response = getCartDataForResponse();
                    $response['message'] = 'Product added.';
                }
                $response['status'] = 'success';
            }
            break;

        case 'remove':
            $item_id_to_remove = (int)($_POST['product_id'] ?? 0);

            if ($item_id_to_remove <= 0) {
                $response['message'] = 'Invalid product ID.';
            } elseif (isset($_SESSION['cart'][$item_id_to_remove])) {
                unset($_SESSION['cart'][$item_id_to_remove]);
                $response = getCartDataForResponse();
                $response['message'] = 'Item removed.';
                $response['status'] = 'success';
            } else {
                $response['message'] = 'Item not found.';
            }
            break;

        case 'update_manual':
            $item_id = (int)($_POST['product_id'] ?? 0);
            $new_quantity = (int)($_POST['quantity'] ?? 0);

            if ($item_id <= 0 || !isset($_SESSION['cart'][$item_id])) {
                $response['message'] = 'Invalid product or not in cart.';
            } else {
                if ($new_quantity <= 0) {
                    unset($_SESSION['cart'][$item_id]);
                    $response['message'] = 'Item removed (quantity 0).';
                } else {
                    $_SESSION['cart'][$item_id]['quantity'] = $new_quantity;
                    $response['message'] = 'Quantity updated.';
                }
                $response = getCartDataForResponse();
                $response['status'] = 'success';
            }
            break;

        default:
            $response['message'] = 'Unknown action.';
            break;
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_cart_status') {
    $response = getCartDataForResponse();
    $response['message'] = 'Cart status loaded.';
    $response['status'] = 'success';
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
exit();
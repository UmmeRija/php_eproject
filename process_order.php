<?php
session_start();
include "connection.php";

$user_id = $_SESSION['id'] ?? null;

$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$street_address_house = $_POST['street_address_house'] ?? '';
$street_address_apt = $_POST['aptSuite'] ?? '';
$city = $_POST['city'] ?? '';
$state = $_POST['state'] ?? '';
$pin_code = $_POST['pin_code'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';

$order_total = 0;
$order_items_data = [];
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item_id => $item) {
        $item_price = is_numeric($item['price']) ? (float)$item['price'] : 0;
        $item_quantity = is_numeric($item['quantity']) ? (int)$item['quantity'] : 0;
        $order_total += ($item_price * $item_quantity);
        
        $order_items_data[] = [
            'id' => $item['id'] ?? $item_id,
            'name' => $item['name'] ?? 'Unknown Product',
            'quantity' => $item_quantity,
            'price_per_item' => $item_price,
            'image' => $item['image'] ?? ''
        ];
    }
} else {
    header("Location: cart.php?message=Your cart is empty. Please add items before checkout.");
    exit;
}

$order_items_json = json_encode($order_items_data);

$con->begin_transaction();

$stmt_order = $con->prepare("INSERT INTO orders (user_id, first_name, last_name, email, phone, street_address_house, street_address_apt, city, state, pin_code, order_total, payment_method, order_items_json) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt_order === false) {
    $con->rollback();
    $con->close();
    header("Location: error_page.php?message=Order preparation failed.");
    exit;
}

$stmt_order->bind_param("isssssssssdss", $user_id, $first_name, $last_name, $email, $phone, $street_address_house, $street_address_apt, $city, $state, $pin_code, $order_total, $payment_method, $order_items_json);

if (!$stmt_order->execute()) {
    $con->rollback();
    $stmt_order->close();
    $con->close();
    header("Location: error_page.php?message=Order insertion failed.");
    exit;
}

$order_id = $con->insert_id;

$con->commit();

unset($_SESSION['cart']);

$stmt_order->close();
$con->close();

header("Location: order_confirmation.php?order_id=" . $order_id);
exit;
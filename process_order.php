<?php
session_start();
include "connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user_id = $_SESSION['id'] ?? null;

$first_name = mysqli_real_escape_string($con, $_POST['first_name'] ?? '');
$last_name = mysqli_real_escape_string($con, $_POST['last_name'] ?? '');
$email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
$phone = mysqli_real_escape_string($con, $_POST['phone'] ?? '');
$street_address_house = mysqli_real_escape_string($con, $_POST['street_address_house'] ?? '');
$street_address_apt = mysqli_real_escape_string($con, $_POST['aptSuite'] ?? '');
$city = mysqli_real_escape_string($con, $_POST['city'] ?? '');
$state = mysqli_real_escape_string($con, $_POST['state'] ?? '');
$pin_code = mysqli_real_escape_string($con, $_POST['pin_code'] ?? '');
$payment_method = mysqli_real_escape_string($con, $_POST['payment_method'] ?? '');

$order_total = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $item_price = is_numeric($item['price']) ? (float)$item['price'] : 0;
        $item_quantity = is_numeric($item['quantity']) ? (int)$item['quantity'] : 0;
        $order_total += ($item_price * $item_quantity);
    }
} else {
}

$con->begin_transaction();

try {
    $stmt_order = $con->prepare("INSERT INTO orders (user_id, first_name, last_name, email, phone, street_address_house, street_address_apt, city, state, pin_code, order_total, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt_order === false) {
        throw new Exception("Failed to prepare order statement: " . $con->error);
    }

    $stmt_order->bind_param("isssssssssds", $user_id, $first_name, $last_name, $email, $phone, $street_address_house, $street_address_apt, $city, $state, $pin_code, $order_total, $payment_method);

    if (!$stmt_order->execute()) {
        throw new Exception("Error executing order insertion: " . $stmt_order->error);
    }
    $order_id = $con->insert_id;

    $stmt_item = $con->prepare("INSERT INTO order_items (order_id, product_name, quantity, price_per_item) VALUES (?, ?, ?, ?)");
    
    if ($stmt_item === false) {
        throw new Exception("Failed to prepare order item statement: " . $con->error);
    }

    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item_data) {
            $product_name = mysqli_real_escape_string($con, $item_data['name'] ?? 'Unknown Product');
            $quantity = is_numeric($item_data['quantity'] ?? 0) ? (int)$item_data['quantity'] : 0;
            $price_per_item = is_numeric($item_data['price'] ?? 0) ? (float)$item_data['price'] : 0;

            $stmt_item->bind_param("isid", $order_id, $product_name, $quantity, $price_per_item);

            if (!$stmt_item->execute()) {
                throw new Exception("Error executing item insertion for '" . htmlspecialchars($product_name) . "': " . $stmt_item->error);
            }
        }
    }

    $con->commit();

    unset($_SESSION['cart']);

    header("Location: order_confirmation.php");
    exit;

} catch (Exception $e) {
    $con->rollback();
    echo "<h2 style='color: red;'>DATABASE INSERTION FAILED!</h2>";
    echo "<p style='color: red;'>An error occurred:</p>";
    echo "<pre style='color: red;'>" . htmlspecialchars($e->getMessage()) . "</pre>";
    error_log("Order processing error: " . $e->getMessage());
} finally {
    if (isset($stmt_order) && $stmt_order) $stmt_order->close();
    if (isset($stmt_item) && $stmt_item) $stmt_item->close();
    if (isset($con) && $con) $con->close();
}
?>
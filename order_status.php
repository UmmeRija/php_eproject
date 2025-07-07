<?php
session_start();
include "connection.php";
$is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$user_id = $_SESSION['id'] ?? null;

$orders = [];

if ($is_logged_in && $user_id) {
    $sql_orders = "SELECT id, first_name, last_name, email, status, order_date, order_items_json FROM orders WHERE user_id = ? ORDER BY order_date DESC";
    $stmt_orders = $con->prepare($sql_orders);

    if ($stmt_orders === false) {
    } else {
        $stmt_orders->bind_param("i", $user_id);
        $stmt_orders->execute();
        $result_orders = $stmt_orders->get_result();

        if ($result_orders->num_rows > 0) {
            while ($order_row = $result_orders->fetch_assoc()) {
                $order_details = $order_row;
                
                $order_details['items'] = json_decode($order_row['order_items_json'], true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $order_details['items'] = [];
                  
                }

                $orders[] = $order_details;
            }
        }
        $stmt_orders->close();
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .order-status-wrapper {
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin-bottom: 30px;
        }
        h2 {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            margin-bottom: 30px;
            text-align: center;
        }
        .message-box {
            background-color: #222;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            color: #ddd;
            font-size: 1.1rem;
        }
        .message-box a {
            color: #f0c040;
            text-decoration: none;
            font-weight: bold;
        }
        .message-box a:hover {
            text-decoration: underline;
        }
        .table-responsive {
            margin-top: 30px;
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
        .order-items-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 0.95rem;
        }
        .order-items-list li {
            margin-bottom: 5px;
            color: #ddd;
        }
        .order-items-list li:last-child {
            margin-bottom: 0;
        }
        .order-status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: capitalize;
            font-size: 0.85rem;
            display: inline-block;
        }
        .status-pending { background-color: #f0c040; color: #333; }
        .status-processing { background-color: #0d6efd; color: #fff; }
        .status-completed { background-color: #198754; color: #fff; }
        .status-cancelled { background-color: #dc3545; color: #fff; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="order-status-wrapper">
            <h2>Your Order Status</h2>

            <?php if (!$is_logged_in) { ?>
                <div class="message-box">
                    <p>You need to be signed in to view your order status.</p>
                    <p><a href="login.php">Login or Sign Up</a></p>
                </div>
            <?php } elseif (empty($orders)) { ?>
                <div class="message-box">
                    <p>You don't have any current orders.</p>
                    <p><a href="products.php">Order something to view its status</a></p>
                </div>
            <?php } else { ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Order Details</th>
                                <th>Order Status</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($order['id']) ?></td>
                                    <td><?= htmlspecialchars($order['first_name'] . ' ' . $order['last_name']) ?></td>
                                    <td><?= htmlspecialchars($order['email']) ?></td>
                                    <td>
                                        <ul class="order-items-list">
                                            <?php
                                            if (!empty($order['items'])) {
                                                foreach ($order['items'] as $item) {
                                            ?>
                                                    <li><?= htmlspecialchars($item['name']) ?> (Qty: <?= htmlspecialchars($item['quantity']) ?>)</li>
                                            <?php
                                                }
                                            } else {
                                            ?>
                                                <li>No items found for this order.</li>
                                            <?php } ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="order-status-badge status-<?= strtolower(htmlspecialchars($order['status'])) ?>">
                                            <?= htmlspecialchars($order['status']) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars(date('M d, Y H:i', strtotime($order['order_date']))) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
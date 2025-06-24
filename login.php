<?php
session_start(); // Make sure this is the very first line of code

include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Sanitize inputs to prevent SQL injection
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password']; // Password will be verified, no need to escape here yet

        $sql = "SELECT id, name, email, phone, passwords FROM register WHERE email = '$email'"; // Added 'phone' to SELECT
        $query = mysqli_query($con, $sql);

        // Check if query executed successfully AND if any rows were returned
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query); // Fetch the single matching user row

            // Verify the hashed password
            if (password_verify($password, $row['passwords'])) {
                // Set all necessary session variables upon successful login
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email']; // <-- ADDED: Store user's email in session
                $_SESSION['phone'] = $row['phone']; // <-- ADDED: Store user's phone in session (assuming 'phone' is the column name in your 'register' table)

                // Redirect to index.php after successful login
                header('location:http://localhost/elegance/index.php');
                exit(); // Always exit after a header redirect
            } else {
                // Password does not match
                echo "Invalid username and password";
            }
        } else {
            // No user found with that email
            echo "Invalid username and password";
        }
    } else {
        // Email or password not provided in the POST request
        echo "Please enter both email and password.";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="google-site-verification" content="HFbmTnl3DFY0OcfFafsHdSffB2itOoYCnX-j9iUUCqE" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://www.affinity.salon/">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/favicon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/slidemenu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: inherit;
            background-color: #000;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-card {
            background-color: #1a1a1a;
            border: 1px solid #333;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(226, 185, 127, 0.1);
        }

        .title {
            text-align: center;
            font-family: 'Bellefair', serif;
            font-size: 24px;
            font-weight: 300;
            letter-spacing: 2px;
            color: #e2b97f;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-size: 13px;
            color: #ddd;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            background-color: #2b2b2b;
            border: 1px solid #444;
            border-radius: 6px;
            color: #fff;
            font-size: 14px;
            font-family: inherit;
        }

        input:focus {
            outline: none;
            border-color: #e2b97f;
            box-shadow: 0 0 5px rgba(226, 185, 127, 0.5);
        }

        button {
            background-color: #e2b97f;
            color: #000;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: inherit;
        }

        button:hover {
            background-color: #d1a968;
        }

        .bottom-links {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
        }

        .bottom-links a {
            color: #e2b97f;
            text-decoration: none;
        }

        .bottom-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body id="home" class="slide_menu slide-right" data-spy="scroll" data-target="#navbar-example">

    <div class="login-container">
        <div class="login-card">
            <h1 class="title">WELCOME BACK</h1>
            <form method="POST" action="">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="abc@example.com" />

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password" />

                <button type="submit">LOG IN</button>
            </form>
            <div class="bottom-links">
                New here? <a href="register.php">Create an Account</a>
            </div>
            <div class="bottom-links">
                <a href="index.php">← Go back to homepage</a>
            </div>
        </div>
    </div>

</body>
</html>
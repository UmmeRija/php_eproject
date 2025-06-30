<?php
session_start();
include "connection.php";

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name'] ?? '');
    $email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
    $phone = mysqli_real_escape_string($con, $_POST['phone'] ?? '');
    $password_raw = $_POST['password'] ?? '';
    $confirm_password_raw = $_POST['confirm'] ?? '';
    if (empty($name)) {
        $error_message = "Name cannot be empty.";
    }
    if (empty($error_message) && empty($email)) {
        $error_message = "Email cannot be empty.";
    } elseif (empty($error_message) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format. Please use a valid email address.";
    }
    if (empty($error_message) && empty($phone)) {
        $error_message = "Phone number cannot be empty.";
    } elseif (empty($error_message) && !preg_match('/^\d{4}-\d{7}$/', $phone)) {
        $error_message = "Phone number must be in 0000-0000000 format (e.g., 03XX-XXXXXXX).";
    }
    if (empty($error_message) && empty($password_raw)) {
        $error_message = "Password cannot be empty.";
    } elseif (empty($error_message) && $password_raw !== $confirm_password_raw) {
        $error_message = "Passwords do not match.";
    }

    if (empty($error_message)) {
        $password_hashed = password_hash($password_raw, PASSWORD_BCRYPT);
        $check_sql = "SELECT id FROM register WHERE email = '$email' OR phone = '$phone' LIMIT 1";
        $check_result = mysqli_query($con, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            $error_message = "Email or Phone number already registered.";
        } else {
            $sql = "INSERT INTO register(`name`, `email`, `passwords`, `phone`) VALUES('$name', '$email', '$password_hashed', '$phone')";
            $query = mysqli_query($con, $sql);

            if ($query) {
                header("location: http://localhost/elegance/login.php?registration=success");
                exit();
            } else {
                $error_message = "Error registering user: " . mysqli_error($con);
            }
        }
    }
    if (!empty($error_message)) {
        $_SESSION['registration_error'] = $error_message;
        header("location: http://localhost/elegance/register.php");
        exit();
    }
}
if (isset($_SESSION['registration_error'])) {
    $error_message = $_SESSION['registration_error'];
    unset($_SESSION['registration_error']); 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&display=swap" rel="stylesheet">

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
                "https://www.affinity.salon/"
            ]
        }
    </script>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NJW4QH8K');
    </script>
    <title>Register</title>

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

        .register-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .register-card {
            background-color: #1a1a1a;
            border: 1px solid #333;
            padding: 45px 35px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(226, 185, 127, 0.1);
        }

        .title {
            text-align: center;
            font-family: 'Bellefair', serif;
            font-size: 24px;
            letter-spacing: 2px;
            color: #e2b97f;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #aaa;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 6px;
            font-size: 13px;
            color: #ddd;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
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
            box-shadow: 0 0 5px rgba(226, 185, 127, 0.4);
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
        .error-message {
            color: red;
            font-size: 0.85em;
            margin-top: -15px; 
            margin-bottom: 15px; 
            display: block;
        }
        .alert-server-error {
            background-color: #d1a968; 
            color: #000;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-card">
            <h1 class="title">CREATE ACCOUNT</h1>
            <p class="subtitle">Join the Affinity experience.</p>

            <?php if (!empty($error_message)) : ?>
                <div class="alert-server-error">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>

            <form method="post" onsubmit="return validateFrme();">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required placeholder="Your Name" pattern="[A-Za-z\s]+" title="Enter your Name!" />
                <span id="nameErr" class="error-message"></span>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="abc@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Enter a valid email address (e.g., user@example.com)" />
                <span id="emailErr" class="error-message"></span>

                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" required placeholder="03XX-XXXXXXX" pattern="^\d{4}-\d{7}$" title="Phone number must be in 0000-0000000 format (e.g., 03XX-XXXXXXX)" maxlength="12" />
                <span id="phoneErr" class="error-message"></span>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password" />
                <span id="passwordErr" class="error-message"></span> <label for="confirm">Confirm Password</label>
                <input type="password" name="confirm" id="confirm_password" required placeholder="Repeat your password" />
                <span id="confirmPasswordErr" class="error-message"></span> <button type="submit">REGISTER</button>
            </form>
            <div class="bottom-links">
                Already have an account? <a href="login.php">Log in</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/iscroll.js"></script>
    <script src="js/slidemenu.js"></script>
    <script src="js/main.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script type="text/javascript">
        function validateEmail(email) {
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
        }

        function validateFrme() {
        
            document.getElementById('nameErr').innerHTML = "";
            document.getElementById('emailErr').innerHTML = "";
            document.getElementById('phoneErr').innerHTML = "";
            document.getElementById('passwordErr').innerHTML = ""; 
            document.getElementById('confirmPasswordErr').innerHTML = "";
            const nameElement = document.getElementById('name');
            const emailElement = document.getElementById('email');
            const phoneElement = document.getElementById('phone');
            const passwordElement = document.getElementById('password');
            const confirmPasswordElement = document.getElementById('confirm_password');

            let isValid = true; 

            if (!nameElement.value.trim()) {
                document.getElementById('nameErr').innerHTML = "Please enter your full name.";
                isValid = false;
            }
            if (!emailElement.value.trim()) {
                document.getElementById('emailErr').innerHTML = "Please enter your email address.";
                isValid = false;
            } else if (!validateEmail(emailElement.value.trim())) {
                document.getElementById('emailErr').innerHTML = "Please enter a valid email address (e.g., user@example.com).";
                isValid = false;
            }

            const phoneRegex = /^\d{4}-\d{7}$/;
            if (!phoneElement.value.trim()) {
                document.getElementById('phoneErr').innerHTML = "Please enter your phone number.";
                isValid = false;
            } else if (!phoneRegex.test(phoneElement.value.trim())) {
                document.getElementById('phoneErr').innerHTML = "Phone number must be in 0000-0000000 format (e.g., 03XX-XXXXXXX).";
                isValid = false;
            }

            if (!passwordElement.value.trim()) {
                document.getElementById('passwordErr').innerHTML = "Please enter a password.";
                isValid = false;
            }
        
            if (!confirmPasswordElement.value.trim()) {
                document.getElementById('confirmPasswordErr').innerHTML = "Please confirm your password.";
                isValid = false;
            } else if (passwordElement.value !== confirmPasswordElement.value) { 
                document.getElementById('confirmPasswordErr').innerHTML = "Passwords do not match.";
                isValid = false;
            }
            if (!isValid) {
                if (!nameElement.value.trim()) { nameElement.focus(); }
                else if (!emailElement.value.trim() || !validateEmail(emailElement.value.trim())) { emailElement.focus(); }
                else if (!phoneElement.value.trim() || !phoneRegex.test(phoneElement.value.trim())) { phoneElement.focus(); }
                
                else if (!passwordElement.value.trim()) { passwordElement.focus(); }
                else if (!confirmPasswordElement.value.trim()) { confirmPasswordElement.focus(); }
                else if (passwordElement.value !== confirmPasswordElement.value) { confirmPasswordElement.focus(); }
            }

            return isValid; 
        }
    </script>
</body>

</html>
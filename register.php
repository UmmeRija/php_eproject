<?php
include "connection.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO register(`name`, `email`, `passwords`) VALUES('{$name}','{$email}','{$password}')";
        $query = mysqli_query($con, $sql);
        header("location: http://localhost/elegance/login.php");
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

    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- all css here -->
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

    <!-- SEO -->
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

    <!-- Google Tag Manager -->
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
    <!-- End Google Tag Manager -->

    <title>Register</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: inherit; /* Use default body font from fonts.css */
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
            /* text-shadow: 0 0 2px rgba(255, 217, 148, 0.2),
                         0 0 6px rgba(255, 217, 148, 0.2); */
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
input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            background-color: #2b2b2b;
            border: 1px solid #444;
            border-radius: 6px;
            color: #fff;
            font-size: 14px;
            font-family: inherit; /* Use same as rest of site */
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
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-card">
            <h1 class="title">CREATE ACCOUNT</h1>
            <p class="subtitle">Join the Affinity experience.</p>
            <form method="post">
                <label for="name">Full Name</label>
                <input type="text" name="name" required placeholder="Your Name" />

                <label for="email">Email</label>
                <input type="email" name="email" required placeholder="abc@example.com" />

                <label for="password">Password</label>
                <input type="password" name="password" required placeholder="Enter your password" />

                <label for="confirm">Confirm Password</label>
                <input type="password" name="confirm" required placeholder="Repeat your password" />

                <button type="submit">REGISTER</button>
            </form>
            <div class="bottom-links">
                Already have an account? <a href="login.php">Log in</a>
            </div>
        </div>
    </div>
</body>

</html>

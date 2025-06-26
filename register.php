<?php
session_start();
include "connection.php"; // Your database connection file

$error_message = ''; // Initialize error message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve input data
    $name = mysqli_real_escape_string($con, $_POST['name'] ?? '');
    $email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
    $phone = mysqli_real_escape_string($con, $_POST['phone'] ?? '');
    $password_raw = $_POST['password'] ?? '';
    $confirm_password_raw = $_POST['confirm'] ?? '';

    // --- Server-side Validation ---

    // Validate Name (basic check for emptiness, add more if needed)
    if (empty($name)) {
        $error_message = "Name cannot be empty.";
    }

    // Validate Email
    // Only proceed with email validation if no previous errors
    if (empty($error_message) && empty($email)) {
        $error_message = "Email cannot be empty.";
    } elseif (empty($error_message) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format. Please use a valid email address.";
    }

    // Validate Phone Number (0000-0000000 format)
    // Only proceed with phone validation if no previous errors
    if (empty($error_message) && empty($phone)) {
        $error_message = "Phone number cannot be empty.";
    } elseif (empty($error_message) && !preg_match('/^\d{4}-\d{7}$/', $phone)) {
        $error_message = "Phone number must be in 0000-0000000 format (e.g., 03XX-XXXXXXX).";
    }

    // Validate Password (Length and Regex removed, only match and emptiness remain)
    // Only proceed with password validation if no previous errors
    if (empty($error_message) && empty($password_raw)) {
        $error_message = "Password cannot be empty.";
    } elseif (empty($error_message) && $password_raw !== $confirm_password_raw) { // KEEPING this check as requested
        $error_message = "Passwords do not match.";
    }

    // If no errors, proceed with insertion
    if (empty($error_message)) {
        $password_hashed = password_hash($password_raw, PASSWORD_BCRYPT);

        // Check if email or phone already exists (optional but recommended for registration)
        $check_sql = "SELECT id FROM register WHERE email = '$email' OR phone = '$phone' LIMIT 1";
        $check_result = mysqli_query($con, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            $error_message = "Email or Phone number already registered.";
        } else {
            // Proceed with insertion
            $sql = "INSERT INTO register(`name`, `email`, `passwords`, `phone`) VALUES('$name', '$email', '$password_hashed', '$phone')";
            $query = mysqli_query($con, $sql);

            if ($query) {
                // Registration successful, redirect to login page
                header("location: http://localhost/elegance/login.php?registration=success");
                exit();
            } else {
                $error_message = "Error registering user: " . mysqli_error($con);
            }
        }
    }

    // If there's an error, store it in session and redirect back to this page
    if (!empty($error_message)) {
        $_SESSION['registration_error'] = $error_message;
        header("location: http://localhost/elegance/register.php");
        exit();
    }
}

// Display any session error message from a previous failed submission
if (isset($_SESSION['registration_error'])) {
    $error_message = $_SESSION['registration_error'];
    unset($_SESSION['registration_error']); // Clear the error after displaying
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
            margin-bottom: 20px; /* Adjusted for error messages */
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
        .error-message {
            color: red;
            font-size: 0.85em;
            margin-top: -15px; /* Adjust to pull closer to input */
            margin-bottom: 15px; /* Space before next element */
            display: block; /* Ensure it takes full width */
        }
        .alert-server-error {
            background-color: #d1a968; /* A color that stands out but fits theme */
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
    <script>
        // Swiper related scripts (kept as is, assuming they are general utilities)
        var swiper = new Swiper(".banner", {
            slidesPerView: 1,
            spaceBetween: 0,
            autoplay: {
                delay: 5000,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var mySwiper1 = document.querySelector('.h__partners-swiper1');
        if (mySwiper1) {
            mySwiper1 = new Swiper('.h__partners-swiper1', {
                loop: true,
                slidesPerView: 'auto',
                shortSwipes: true,
                longSwipes: true,
                allowTouchMove: true,
                autoplay: {
                    delay: 1,
                },
                freeMode: true,
                speed: 5000,
            });
        }

        var swiper = new Swiper(".testi", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        $(".hide-btn").click(function() {
            $("#slide-nav").css("display", "none");
            $("body").removeClass("slide-open");
        });
        $(".show-btn").click(function() {
            $("#slide-nav").css("display", "block");
        });
    </script>

    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/iscroll.js"></script>
    <script src="js/slidemenu.js"></script>
    <script src="js/main.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        // Datepicker script (not relevant to register.php, but kept if you copy-pasted it)
        jQuery(document).ready(function() {
            jQuery('#datepicker').datepicker({
                dateFormat: 'dd-mm-yy',
                minDate: 0
            });
        });
    </script>

    <script>
        const ladiesServices = [{
            label: "Hair Styling",
            options: ["Hair Cut", "Ironing", "Global Colouring", "Blow Dry", "Root Touch Up", "Shampoo & Conditioning", "Head Massage", "Roller Setting", "Oiling"]
        }, {
            label: "Make Up",
            options: ["Party Make Up", "Engagement Make Up", "Bridal & Reception Make Up", "Base Make Up", "Eye Make Up"]
        }, {
            label: "Hair Texture",
            options: ["Rebonding", "Perming", "Keratin", "Colour Protection", "Smoothening"]
        }, {
            label: "Hair Treatments",
            options: ["Spa Treatments", "Volumizing", "Advanced Hair Moisturising", "Scalp Treatments"]
        }, {
            label: "Facials & Rituals",
            options: ["Bleach", "Luxury Facials/Rituals", "Clean Ups", "Body Polishing/Rejuvenation", "Threading"]
        }, {
            label: "Hand & Feet",
            options: ["Manicure", "Spa Pedicure", "Pedicure", "Waxing", "Spa Manicure"]
        }, {
            label: "Nail Care",
            options: ["Nail Paint", "Nail Art", "Nail Filling", "Other"]
        }];

        const gentsServices = [{
            label: "Hair Cut & Finish",
            options: ["Cut and Hair Care", "Shampoo & Conditioning", "Head Massage", "Beard Styling", "Hair/Beard Colouring"]
        }, {
            label: "Hair Colour",
            options: ["Hair Colour(Ammonia & Ammonia Free)", "Hi - Lites", "Beard Colour"]
        }, {
            label: "Hair Texture",
            options: ["Straightening", "Smoothening", "Rebonding", "Perming"]
        }, {
            label: "Hair Treatments",
            options: ["Hair Spa", "Advanced Moisturising", "Scalp Treatments", "Colour Protection"]
        }, {
            label: "Skin Care",
            options: ["Clean Ups", "Facials", "Organic Treatments", "Manicure", "Pedicure"]
        }, {
            label: "Beard Grooming",
            options: ["Beard Trim", "Beard Colour", "Beard Styling", "Shave", "Luxury Shave & Beard Spa", "Other"]
        }];

        function updateServices() {
            const genderSelectElement = document.getElementById("genderSelect");
            const serviceSelectElement = document.getElementById("serviceSelect");

            if (!genderSelectElement || !serviceSelectElement) {
                return;
            }

            const gender = genderSelectElement.value;
            const serviceSelect = serviceSelectElement;

            serviceSelect.innerHTML = '<option value="">Select Service</option>';

            if (gender) {
                serviceSelect.disabled = false;
                const services = gender === "1" ? ladiesServices : gentsServices;

                services.forEach(group => {
                    const optgroup = document.createElement("optgroup");
                    optgroup.label = group.label;

                    group.options.forEach(service => {
                        const option = document.createElement("option");
                        option.value = service;
                        option.textContent = service;
                        optgroup.appendChild(option);
                    });
                    serviceSelect.appendChild(optgroup);
                });
            } else {
                serviceSelect.disabled = true;
            }
        }
        const genderSelectElement = document.getElementById("genderSelect");
        if (genderSelectElement) {
            genderSelectElement.addEventListener("change", updateServices);
        }
    </script>

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script type="text/javascript">
        function validateEmail(email) {
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
        }

        function validateFrme() {
            // Clear all previous error messages
            document.getElementById('nameErr').innerHTML = "";
            document.getElementById('emailErr').innerHTML = "";
            document.getElementById('phoneErr').innerHTML = "";
            document.getElementById('passwordErr').innerHTML = ""; // Re-added clearing for passwordErr
            document.getElementById('confirmPasswordErr').innerHTML = ""; // Re-added clearing for confirmPasswordErr

            // Get elements
            const nameElement = document.getElementById('name');
            const emailElement = document.getElementById('email');
            const phoneElement = document.getElementById('phone');
            const passwordElement = document.getElementById('password');
            const confirmPasswordElement = document.getElementById('confirm_password');

            let isValid = true; // Flag to track overall form validity

            // Validate Name
            if (!nameElement.value.trim()) {
                document.getElementById('nameErr').innerHTML = "Please enter your full name.";
                isValid = false;
            }

            // Validate Email
            if (!emailElement.value.trim()) {
                document.getElementById('emailErr').innerHTML = "Please enter your email address.";
                isValid = false;
            } else if (!validateEmail(emailElement.value.trim())) {
                document.getElementById('emailErr').innerHTML = "Please enter a valid email address (e.g., user@example.com).";
                isValid = false;
            }

            // Validate Phone Number (0000-0000000 format)
            const phoneRegex = /^\d{4}-\d{7}$/;
            if (!phoneElement.value.trim()) {
                document.getElementById('phoneErr').innerHTML = "Please enter your phone number.";
                isValid = false;
            } else if (!phoneRegex.test(phoneElement.value.trim())) {
                document.getElementById('phoneErr').innerHTML = "Phone number must be in 0000-0000000 format (e.g., 03XX-XXXXXXX).";
                isValid = false;
            }

            // Validate Password (only check for emptiness, length/regex removed)
            if (!passwordElement.value.trim()) {
                document.getElementById('passwordErr').innerHTML = "Please enter a password.";
                isValid = false;
            }
            // Removed password length check

            // Validate Confirm Password (match check KEPT, emptiness check kept)
            if (!confirmPasswordElement.value.trim()) {
                document.getElementById('confirmPasswordErr').innerHTML = "Please confirm your password.";
                isValid = false;
            } else if (passwordElement.value !== confirmPasswordElement.value) { // KEEPING this check as requested
                document.getElementById('confirmPasswordErr').innerHTML = "Passwords do not match.";
                isValid = false;
            }

            // If form is not valid, focus on the first invalid element
            if (!isValid) {
                if (!nameElement.value.trim()) { nameElement.focus(); }
                else if (!emailElement.value.trim() || !validateEmail(emailElement.value.trim())) { emailElement.focus(); }
                else if (!phoneElement.value.trim() || !phoneRegex.test(phoneElement.value.trim())) { phoneElement.focus(); }
                // Re-ordered focus to consider password fields
                else if (!passwordElement.value.trim()) { passwordElement.focus(); }
                else if (!confirmPasswordElement.value.trim()) { confirmPasswordElement.focus(); }
                else if (passwordElement.value !== confirmPasswordElement.value) { confirmPasswordElement.focus(); }
            }

            return isValid; // Return true if all validations pass, false otherwise
        }
    </script>
</body>

</html>
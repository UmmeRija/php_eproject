<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta name="google-site-verification" content="HFbmTnl3DFY0OcfFafsHdSffB2itOoYCnX-j9iUUCqE" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://www.affinity.salon/contact.php">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- all css here -->
    <!-- Original local Bootstrap (if you're still using an older version locally, keep this) -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> 

    <!-- Bootstrap 5.0.2 CDN (Preferred for modern features) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- Bootstrap Icons (still included, might be used elsewhere on the page) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Your Custom CSS files -->
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/slidemenu.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Inline Custom Styles to complement Bootstrap and match original aesthetic -->
    <style>
        /* This section contains custom styles to match your template's look
           without conflicting with Bootstrap's grid or form structure. */

        /* General form container styling - similar to your 'formbox' concept */
        .custom-form-card {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        /* Styling for the input/textarea itself */
        .form-control.custom-input-field {
            border-radius: 8px; /* Rounded corners on all sides now */
            padding: 0.65rem 1rem; /* Consistent padding */
            font-size: 1rem;
            font-family: 'Inter', sans-serif; /* Apply Inter font */
            color: #333; /* Darker text color */
            border: 1px solid #dee2e6; /* Standard Bootstrap border color */
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05); /* Subtle inner shadow */
            line-height: 1.5; /* Ensure consistent line height */
        }

        /* Focus state for form controls */
        .form-control.custom-input-field:focus {
            background-color: #fff; /* Explicitly keep background white on focus */
            color: #333; /* Explicitly keep text dark on focus */
            border-color: #a96b48; /* Highlight border on focus */
            box-shadow: 0 0 0 0.25rem rgba(169, 107, 72, 0.25); /* Bootstrap-like focus glow */
            outline: 0; /* Remove default browser outline */
        }

        /* Submit Button Styling */
        .custom-submit-button {
            background-color: #7d4d3a; /* Brown color from your image */
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .custom-submit-button:hover {
            background-color: #a96b48; /* Lighter brown on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        .custom-submit-button:active {
            transform: translateY(0); /* Press effect */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Adjust placeholder color */
        .form-control.custom-input-field::placeholder {
            color: #888;
        }

        /* General body font and color if not already set by style.css */
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        /* Ensure specific elements from your contactbox have correct colors */
        .contactbox .mainicon p {
            color: #333; /* Or whatever dark color is appropriate for readability */
        }

        /* Re-apply Bellefair font to specific headings */
        .gettouch h3 {
            font-family: 'Bellefair', serif;
        }
        /* --- New Contact Banner Styling (to match About Us/Service layout) --- */

.contact-banner-text-band {
    background-color: #000; /* Dark background */
    padding: 40px 0; /* Adjust padding to control height of the black band */
    text-align: center; /* Centers the text inside this band */
}

.contact-page-title {
    font-family: 'Bellefair', serif; /* Assuming 'Bellefair' is your preferred elegant font */
    font-size: 3rem; /* Adjust font size to match "ABOUT US" / "Our Services" */
    font-weight: normal;
    color: #fff; /* White text color */
    margin: 0; /* Remove default top/bottom margins from the heading */
    line-height: 1;
}

.contact-banner-text-band p {
    font-size: 1.1rem; /* Adjust paragraph font size */
    color: #fff;
    margin-top: 15px; /* Space between title and paragraph */
}

.contact-banner-image {
    width: 100%; /* Makes the image span the full width */
    height: auto; /* Maintains the image's aspect ratio */
    display: block; /* Important to remove any extra space below the image */
    /* You can uncomment and adjust these if you want the image to fill a specific height and crop: */
    /* height: 500px; */
    /* object-fit: cover; */
}

/* --- Responsive Adjustments for the new Contact banner --- */
@media (max-width: 992px) {
    .contact-page-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .contact-banner-text-band {
        padding: 30px 0;
    }
    .contact-page-title {
        font-size: 2rem;
    }
}

@media (max-width: 576px) {
    .contact-banner-text-band {
        padding: 25px 0;
    }
    .contact-page-title {
        font-size: 1.7rem;
    }
}
    </style>

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
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NJW4QH8K');
    </script>
    <!-- End Google Tag Manager -->
    <title>Contact Us</title>
</head>

<body id="home" class="slide_menu slide-right" data-spy="scroll" data-target="#navbar-example">

    <?php include "navbar.php"; ?>

    <!-- Start Slider Area -->
 <section class="contact-banner-section">
    <div class="contact-banner-text-band">
        <div class="container">
            <h1 class="contact-page-title text-uppercase text-white">Contact Us</h1>
            <p class="text-white">
                Need to make a reservation or have any queries? Reach out to us today!
            </p>
        </div>
    </div>
    <img src="img/partnerbg3.jpg" class="img-fluid contact-banner-image" alt="Contact Us Banner">
</section>

    <!-- Contact Info Section -->
    <section class="ptb50 contactbox">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="img/touch.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-5">
                            <h3 class="mt-2">Contact Us</h3>
                            <div class="mainicon mt-4">
                                <div class="iconbox">
                                    <i class="bi bi-house-door"></i>
                                </div>
                                <div>
                                    <p class="mb-0  text-light">64, Block-B, Sushant Lok Phase 1, Sector-43, Gurugram, Haryana-122022</p>
                                </div>
                            </div>
                            <div class="mainicon">
                                <div class="iconbox">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div>
                                    <p class="mb-0  text-light">support@affinity.salon</p>
                                </div>
                            </div>
                            <div class="mainicon">
                                <div class="iconbox">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-light">9899178000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Get In Touch Form Section -->
    <section class="ptb50 gettouch text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <h3 class="mt-2">Get in touch</h3>
                    <p>Please fill out the form below, and our team will get back <br>to you as soon as possible.</p>

                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <div class="custom-form-card"> <!-- Styled card-like container for the form -->
                                <!-- The 'alert_message' div remains for displaying feedback to the user -->
                                <div id="alert_message" class="alert alert-danger" role="alert" style="display:none; margin-bottom: 15px;"></div>
                                
                                <form action="savecontact.php" method="post" id="frm" onsubmit="return validateFrme();">
                                    <input type="hidden" name="date" value="2025-06-21">
                                    <input type="hidden" name="source" value="contact">

                                    <!-- Name Field -->
                                    <div class="mb-3">
                                        <input type="text" class="form-control custom-input-field" id="cname" name="name" placeholder="Name" pattern="[A-Za-z\s]+" title="Enter your Name!" required>
                                    </div>
                                    <div id="nameErr" class="text-danger text-start"></div> <!-- Error message display -->

                                    <!-- Email Field -->
                                    <div class="mb-3">
                                        <input type="email" class="form-control custom-input-field" id="cemail" name="email" placeholder="Email" required>
                                    </div>
                                    <div id="emailErr" class="text-danger text-start"></div> 


                                    <!-- Phone Field -->
                                    <div class="mb-3">
                                        <input type="tel" minlength="10" maxlength="13" class="form-control custom-input-field" id="phone" name="phone" placeholder="Phone" pattern="[0-9]{10,13}" title="Enter a valid phone number!" required>
                                    </div>
                                    <div id="phoneErr" class="text-danger text-start"></div> <!-- Error message display -->

                                    <!-- Message Field -->
                                    <div class="mb-3">
                                        <textarea class="form-control custom-input-field" placeholder="Leave us a Message" name="message" rows="3" maxlength="500" required></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div>
                                        <button type="submit" class="custom-submit-button" id="btn_apppointment">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>

    <!-- all js here -->
    <!-- jquery latest version (moved to bottom for better page load performance) -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <!-- Bootstrap 5.0.2 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
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
    </script>

    <script>
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

    <!-- Original JS files -->
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/iscroll.js"></script>
    <script src="js/slidemenu.js"></script>
    <script src="js/main.js"></script>

    <!-- jQuery UI for Datepicker -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#datepicker').datepicker({
                dateFormat: 'dd-mm-yy',
                startDate: '+1d',
                minDate: 0
            });
        });
    </script>

    <!-- Service Selection Logic (This part of the JS is NOT connected to the contact form) -->
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

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Form Validation Script -->
    <script type="text/javascript">
        function validateEmail(email) {
            if (email.length <= 0) {
                return true;
            }
            var splitted = email.match(/^(.+)@(.+)$/);
            if (splitted == null) return false;

            var regexp_user = /^\"?[\w-_\.]*\"?$/;
            var regexp_domain = /^[\w-\.]*\.[A-Za-z]{2,4}$/;

            if (splitted[1] && splitted[1].match(regexp_user) == null) return false;
            if (splitted[2] && splitted[2].match(regexp_domain) == null) {
                var regexp_ip = /^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
                if (splitted[2].match(regexp_ip) == null) return false;
            }
            return true;
        }

        function isInteger(s) {
            for (var i = 0; i < s.length; i++) {
                var c = s.charAt(i);
                if (((c < "0") || (c > "9"))) return false;
            }
            return true;
        }

        function validateFrme() {
            // Clear all previous error messages and hide the alert_message div
            document.getElementById('nameErr').innerHTML = "";
            document.getElementById('phoneErr').innerHTML = "";
            document.getElementById('emailErr').innerHTML = "";
            $('#alert_message').hide().html('');

            // Get elements
            var nameElement = document.getElementById('cname');
            var emailElement = document.getElementById('cemail');
            var phoneElement = document.getElementById('phone');
            var submitButton = $('#btn_apppointment');

            // --- Client-side Validation ---

            // Validate Name
            var name = nameElement ? nameElement.value : '';
            if (!name.trim()) {
                document.getElementById('nameErr').innerHTML = "Please Enter Name";
                if (nameElement) nameElement.focus();
                submitButton.show(); // Show button on validation failure
                console.log("Button visible: Client-side Name validation failed");
                return false;
            }

            // Validate Email
            var email = emailElement ? emailElement.value : '';
            if (!email.trim()) {
                document.getElementById('emailErr').innerHTML = "Please Enter Email";
                if (emailElement) emailElement.focus();
                submitButton.show(); // Show button on validation failure
                console.log("Button visible: Client-side Email empty");
                return false;
            }
            if (!validateEmail(email)) {
                document.getElementById('emailErr').innerHTML = "Please Enter a valid Email address!";
                if (emailElement) emailElement.focus();
                submitButton.show(); // Show button on validation failure
                console.log("Button visible: Client-side Email format invalid");
                return false;
            }

            // Validate Phone
            var phone = phoneElement ? phoneElement.value : '';
            if (!phone.trim()) {
                document.getElementById('phoneErr').innerHTML = "Please Enter Phone Number";
                if (phoneElement) phoneElement.focus();
                submitButton.show(); // Show button on validation failure
                console.log("Button visible: Client-side Phone empty");
                return false;
            }
            if (isNaN(phone)) {
                document.getElementById('phoneErr').innerHTML = "Phone No. should be Numeric";
                if (phoneElement) phoneElement.focus();
                submitButton.show(); // Show button on validation failure
                console.log("Button visible: Client-side Phone not numeric");
                return false;
            }

            // --- AJAX Submission ---
            var form = $("#frm");
            if (form.length === 0) {
                console.error("Form with ID 'frm' not found for AJAX submission. Skipping AJAX.");
                $('#alert_message').html("Form not found. Please refresh the page.").show();
                submitButton.show(); // Ensure button is shown if form is missing
                console.log("Button visible: Form ID missing");
                return false;
            }

            // Hide button and possibly show a loading indicator
            submitButton.hide();
            console.log("Button hidden: Submitting form...");
            // $('#processing').show(); // Uncomment if you have a processing spinner

            // Failsafe timeout to show button if AJAX takes too long or gets stuck
            const failsafeTimeout = setTimeout(() => {
                if (submitButton.is(':hidden')) {
                    submitButton.show();
                    console.warn("Button forcibly shown by failsafe timeout.");
                    $('#alert_message').html("Submission taking longer than expected. Please wait or try again.").show();
                }
            }, 5000); // 5 seconds. Adjust as needed.

            $.ajax({
                type: "POST",
                url: 'savecontact.php', // Ensure this path is correct
                data: form.serialize(),
                success: function(response) {
                    clearTimeout(failsafeTimeout); // Clear failsafe if AJAX succeeded
                    console.log("AJAX Success Response (Raw): '" + response + "'"); // LOG THE RAW RESPONSE

                    // Check if response contains '1' anywhere, or if it's "success"
                    if (response.trim().includes('1')) { // Changed to .includes('1') for more robustness
                        console.log("AJAX Success: Server indicated success. Redirecting...");
                        window.location = "savecontact.php"; // Redirect immediately on confirmed success
                    } else {
                        // Server returned an error message or non-'1' response
                        console.log("AJAX Success but server did not return '1'. Displaying response.");
                        $('#alert_message').html(response).show();
                        submitButton.show(); // Show button for server-side error message
                        console.log("Button visible: Server returned non-'1' response.");
                        $('#frm')[0].reset(); // Reset form on server-side error, as per your original logic
                        window.setTimeout(function() {
                            $("#alert_message").fadeTo(500, 0).slideUp(500, function() {
                                $(this).html('').hide();
                            });
                        }, 4000);
                    }
                },
                error: function(xhr, status, error) {
                    clearTimeout(failsafeTimeout); // Clear failsafe if AJAX errored
                    // AJAX request failed (e.g., 404, 500, network issue)
                    console.error("AJAX Error: ", status, error, "Response Text:", xhr.responseText); // Log full responseText
                    let errorMessage = "An error occurred during submission. Please try again.";
                    if (xhr.status) {
                        errorMessage += ` (Status: ${xhr.status} - ${xhr.statusText})`;
                    }
                    if (xhr.responseText && xhr.status !== 404) {
                        errorMessage += `<br>Server Debug: <pre>${xhr.responseText.substring(0, 500)}</pre>`; // Show more of the responseText
                    }
                    $('#alert_message').html(errorMessage).show();
                    submitButton.show(); // Show button for AJAX error
                    console.log("Button visible: AJAX request error.");
                }
            });
            return false; // Prevent default form submission as AJAX is used
        }
    </script>
</body>

</html>

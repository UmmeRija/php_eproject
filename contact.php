<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta name="google-site-verification" content="HFbmTnl3DFY0OcfFafsHdSffB2itOoYCnX-j9iUUCqE" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://www.affinity.salon/contact.php">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/favicon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/slidemenu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

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
    <title>Contact Us</title>
</head>

<body id="home" class="slide_menu slide-right" data-spy="scroll" data-target="#navbar-example">

    <?php include "navbar.php"; ?>

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
                                <p class="mb-0  text-light">123 Street, PECHS Block II, Karachi, Sindh</p>
                                </div>
                            </div>
                            <div class="mainicon">
                                <div class="iconbox">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div>
                                    <p class="mb-0  text-light">elegancesalon@gmail.com</p>
                                </div>
                            </div>
                            <div class="mainicon">
                                <div class="iconbox">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-light">+92 9899178000</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ptb50 gettouch text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <h3 class="mt-2">Get in touch</h3>
                    <p>Please fill out the form below, and our team will get back <br>to you as soon as possible.</p>

                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <div class="custom-form-card"> <div id="alert_message" class="alert alert-danger" role="alert" style="display:none; margin-bottom: 15px;"></div>
                                
                                <form action="savecontact.php" method="post" id="frm" onsubmit="return validateFrme();">
                                    <input type="hidden" name="date" value="2025-06-21">
                                    <input type="hidden" name="source" value="contact">

                                    <div class="mb-3">
                                        <input type="text" class="form-control custom-input-field" id="cname" name="name" placeholder="Name" pattern="[A-Za-z\s]+" title="Enter your Name!" required>
                                    </div>
                                    <div id="nameErr" class="text-danger text-start"></div> <div class="mb-3">
                                        <input type="email" class="form-control custom-input-field" id="cemail" name="email" placeholder="Email" required>
                                    </div>
                                    <div id="emailErr" class="text-danger text-start"></div> 


                                    <div class="mb-3">
                                        <input type="tel" minlength="12" maxlength="12" class="form-control custom-input-field" id="phone" name="phone" placeholder="Phone (e.g., 03XX-XXXXXXX)" pattern="^\d{4}-\d{7}$" title="Enter a valid phone number in 0000-0000000 format!" required>
                                    </div>
                                    <div id="phoneErr" class="text-danger text-start"></div> <div class="mb-3">
                                        <textarea class="form-control custom-input-field" placeholder="Leave us a Message" name="message" rows="3" maxlength="500" required></textarea>
                                    </div>

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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="js/jquery.meanmenu.js"></script>
<script src="js/iscroll.js"></script>
<script src="js/slidemenu.js"></script>
<script src="js/main.js"></script>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script type="text/javascript">
    // Swiper for banner
   // Swiper for banner
var swiperBanner = new Swiper(".banner", {
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

// Swiper for partners
var mySwiperPartners = document.querySelector('.h__partners-swiper1');
if (mySwiperPartners) {
    mySwiperPartners = new Swiper('.h__partners-swiper1', {
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

// Swiper for testimonials
var swiperTesti = new Swiper(".testi", {
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

// Toggle slide navigation
$(".hide-btn").click(function() {
    $("#slide-nav").css("display", "none");
    $("body").removeClass("slide-open");
});
$(".show-btn").click(function() {
    $("#slide-nav").css("display", "block");
    $("body").addClass("slide-open");
});

jQuery(document).ready(function() {
    if (jQuery.fn.datepicker) {
        jQuery('#datepicker').datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 0
        });
    } else {
        console.warn("jQuery UI Datepicker is not loaded or '#datepicker' element is missing.");
    }
});

function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
}

function validateFrme() {
    $('#nameErr').html("");
    $('#phoneErr').html("");
    $('#emailErr').html("");
    $('#alert_message').hide().html('');

    var nameElement = document.getElementById('cname');
    var emailElement = document.getElementById('cemail');
    var phoneElement = document.getElementById('phone');
    var submitButton = $('#btn_apppointment');

    var name = nameElement ? nameElement.value : '';
    if (!name.trim()) {
        $('#nameErr').html("Please Enter Name");
        if (nameElement) nameElement.focus();
        submitButton.show();
        return false;
    }

    var email = emailElement ? emailElement.value : '';
    if (!email.trim()) {
        $('#emailErr').html("Please Enter Email");
        if (emailElement) emailElement.focus();
        submitButton.show();
        return false;
    }
    if (!validateEmail(email)) {
        $('#emailErr').html("Please Enter a valid Email address!");
        if (emailElement) emailElement.focus();
        submitButton.show();
        return false;
    }

    var phone = phoneElement ? phoneElement.value : '';
    const phoneRegex = /^\d{4}-\d{7}$/;
    if (!phone.trim()) {
        $('#phoneErr').html("Please Enter Phone Number");
        if (phoneElement) phoneElement.focus();
        submitButton.show();
        return false;
    }
    if (!phoneRegex.test(phone)) {
        $('#phoneErr').html("Phone No. should be in 0000-0000000 format (e.g., 03XX-XXXXXXX).");
        if (phoneElement) phoneElement.focus();
        submitButton.show();
        return false;
    }

    var form = $("#frm");
    if (form.length === 0) {
        console.error("Form with ID 'frm' not found for AJAX submission. Skipping AJAX.");
        $('#alert_message').html("Form not found. Please refresh the page.").show();
        submitButton.show();
        return false;
    }

    submitButton.hide();

    const failsafeTimeout = setTimeout(() => {
        if (submitButton.is(':hidden')) {
            submitButton.show();
            $('#alert_message').html("Submission taking longer than expected. Please wait or try again.").show();
        }
    }, 5000);

    $.ajax({
        type: "POST",
        url: 'savecontact.php',
        data: form.serialize(),
        success: function(response) {
            clearTimeout(failsafeTimeout);
            if (response.trim().includes('1')) {
                window.location = "contact.php?success=1";
            } else {
                $('#alert_message').html(response).show();
                submitButton.show();
                window.setTimeout(function() {
                    $("#alert_message").fadeTo(500, 0).slideUp(500, function() {
                        $(this).html('').hide();
                    });
                }, 4000);
            }
        },
        error: function(xhr, status, error) {
            clearTimeout(failsafeTimeout);
            let errorMessage = "An error occurred during submission. Please try again.";
            if (xhr.status) {
                errorMessage += ` (Status: ${xhr.status} - ${xhr.statusText})`;
            }
            if (xhr.responseText && xhr.status !== 404) {
                errorMessage += `<br>Server Debug: <pre>${xhr.responseText.substring(0, 500)}</pre>`;
            }
            $('#alert_message').html(errorMessage).show();
            submitButton.show();
        }
    });
    return false;
}

$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
        $('#alert_message').removeClass('alert-danger').addClass('alert-success').html('Thank you for contacting us! Your message has been sent successfully.').show();
        $('#frm')[0].reset();
        window.setTimeout(function() {
            $("#alert_message").fadeTo(500, 0).slideUp(500, function() {
                $(this).html('').hide();
                const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                window.history.replaceState({
                    path: newUrl
                }, '', newUrl);
            });
        }, 4000);
    }
});
</script>
</body>

</html>
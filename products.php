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
    
              <?php
include "footer.php";
?>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="js/jquery.meanmenu.js"></script>
<script src="js/iscroll.js"></script>
<script src="js/slidemenu.js"></script>
<script src="js/main.js"></script>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>
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
</script>
    </body>
</html>
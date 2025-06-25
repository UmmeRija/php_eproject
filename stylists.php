<?php
include "connection.php";
// $sql = "SELECT * FROM ";
// $query = mysqli_query($con, $sql);
// $num_rows = mysqli_num_rows($query);?>
<!doctype html>
<html class="no-js" lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><head>

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
<title>Our Stylists</title>
   <style>
     /* --- New Service Banner Styling (to match About Us layout from screenshot) --- */

.service-banner-text-band {
    background-color: #000; /* Dark background as seen in your screenshot */
    padding: 40px 0; /* Adjust padding top/bottom to control height of the black band */
    text-align: center; /* Centers the text inside this band */
}

.service-page-title {
    font-family: 'Bellefair', serif; /* Assuming this is the elegant font used for "ABOUT US" */
    font-size: 3rem; /* Adjust this font size to perfectly match "ABOUT US" in your screenshot */
    font-weight: normal; /* The "ABOUT US" in the screenshot doesn't look bold */
    color: #fff; /* White text color */
    margin: 0; /* Remove default top/bottom margins from the heading */
    line-height: 1; /* Adjust line height for tighter spacing if needed */
}

/* If you added the optional paragraph back in the HTML, style it here */
.service-banner-text-band p {
    font-size: 1.1rem; /* Adjust paragraph font size */
    color: #fff;
    margin-top: 15px; /* Space between title and paragraph */
}

.service-banner-image {
    width: 100%; /* Makes the image span the full width */
    height: auto; /* Maintains the image's aspect ratio */
    display: block; /* Important to remove any extra space below the image */
    /* If you want the image to fill a specific height and crop, you can uncomment and adjust these: */
    /* height: 500px; */
    /* object-fit: cover; */
}

/* --- Responsive Adjustments for the new banner --- */
@media (max-width: 992px) {
    .service-page-title {
        font-size: 2.5rem; /* Smaller font for medium screens */
    }
}

@media (max-width: 768px) {
    .service-banner-text-band {
        padding: 30px 0; /* Reduce padding on smaller screens */
    }
    .service-page-title {
        font-size: 2rem; /* Even smaller font for tablet/mobile */
    }
}

@media (max-width: 576px) {
    .service-banner-text-band {
        padding: 25px 0;
    }
    .service-page-title {
        font-size: 1.7rem; /* Smallest font for extra small mobile screens */
    }
}
   </style>
</head>
    <body id="home" class="slide_menu slide-right" data-spy="scroll" data-target="#navbar-example">


    <?php include "navbar.php"; ?>

                       <section class="service-banner-section">
    <div class="service-banner-text-band">
        <div class="container">
            <h1 class="service-page-title text-uppercase text-white">Our Stylists</h1>
            </div>
    </div>
    <img src="img/servicebg.jpg" class="img-fluid service-banner-image" alt="Our Services Banner">
</section>
  <section class="">
        <div class="about-area py-5">
            <div class="container-fluid">

                <div class="row g-0">

                    <div class="col-md-6 bg2 px-5 text-center d-flex align-items-center">
                        <div class="about-content">
                            <div class="about-headline">

                                <h3 class="text-light">Meet Our Stylists</h3>
                                <span class="side-head top-head text-light">Hair / Beauty / Grooming</span>

                            </div>
                            <p class="text-light">
                                Meet our exceptional team of talented stylists, each a dedicated professional committed to mastering their craft. Experience personalized attention and innovative techniques designed to make you feel confident, refreshed, and absolutely radiant.Discover the difference that true expertise, combined with a genuine understanding of your needs.</p>
                            <a href="#stylists" class="btn1">
                                Meet our Stylists
                            </a>


                        </div>
                    </div>
                       <div class="col-md-6">
                        <div class="about-images">
                            <div class="about-top-image">
                                <img class="ab-image" src="img/partner6.jpg" alt="">

                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row g-0">
                    <div class="col-md-6 rdnone">
                        <div class="about-images">
                            <div class="about-top-image">
                                <img class="ab-image" src="img/img2.jpg" alt="">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  bg1 px-5 text-center d-flex align-items-center">
                        <div class="about-content">
                            <div class="about-headline">

                                <h3 class="text-dark">Feel Divine, Look Great</h3>
                                <span class="side-head top-head">Luxury & Affordability Under One Roof</span>
                            </div>
                            <p class="text-dark"> At Elegance Salon, we believe that a makeover can transform not just how you look, but how you feel. Our team of skilled professionals is dedicated to giving you a flawless experience, where luxury and perfection come together.
                                Feel divine with Elegance.</p>

                            <a href="index.php#appointment" class="btn1">
                                Book appointment
                            </a>



                        </div>
                    </div>

                    <div class="col-md-6 rdblock">
                        <div class="about-images">
                            <div class="about-top-image">
                                <img class="ab-image" src="img/img2.jpg" alt="">

                            </div>
                        </div>
                    </div>
                </div>

              <?php
include "footer.php";
?>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".banner", {
            slidesPerView: 1,
            spaceBetween: 0,
            //loop: true,
            //mousewheel: true,
            //effect: 'fade',

            autoplay: {
                delay: 5000,
                // disableOnInteraction: false,
            },

            /* pagination: {
               el: ".swiper-pagination",
               clickable: true,
             },*/
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });


        var mySwiper1 = document.querySelector('.h__partners-swiper1').slider;

        mySwiper1 = new Swiper('.h__partners-swiper1', {
            //grabCursor: false,
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
    </script>

    <script>
        var swiper = new Swiper(".testi", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            //mousewheel: true,
            //effect: 'fade',

            autoplay: {
                delay: 5000,
                // disableOnInteraction: false,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            /* navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
             },*/
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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    </body>
</html>
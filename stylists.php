<?php
include "connection.php";
$sql = "SELECT * FROM stylist";
$query = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($query);?>
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
    
.service-banner-text-band {
    background-color: #000; 
    padding: 40px 0; 
    text-align: center; 
}

.service-page-title {
    font-family: 'Bellefair', serif; 
    font-size: 3rem; 
    font-weight: normal; 
    color: #fff; 
    margin: 0; 
    line-height: 1; 
}

.service-banner-text-band p {
    font-size: 1.1rem; 
    color: #fff;
    margin-top: 15px; 
}

.service-banner-image {
    width: 100%; 
    height: auto; 
    display: block; 
}

@media (max-width: 992px) {
    .service-page-title {
        font-size: 2.5rem; 
    }
}

@media (max-width: 768px) {
    .service-banner-text-band {
        padding: 30px 0; 
    }
    .service-page-title {
        font-size: 2rem; 
    }
}

@media (max-width: 576px) {
    .service-banner-text-band {
        padding: 25px 0;
    }
    .service-page-title {
        font-size: 1.7rem; 
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
    <img src="img/servicebg.png" class="img-fluid service-banner-image" alt="Our Services Banner">
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

                  <section class="appointments-table-section py-5">
    <div class="container-fluid">
       
            <?php if ($num_rows > 0) { ?>
                <h2 class="text-center" style="color: #e2b97f; font-family: 'Bellefair', serif; margin-bottom: 30px;">Our Stylists</h2>
                <div class="table-responsive" id="stylists">
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Specilization</th>
                                <th>Years of Experience</th>
                                <th>Working Hours</th>
                                <!-- <th>Branch</th> -->
                            </tr>
                            </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($query)) { 
 if(htmlspecialchars($row['Status']) == "Accepted"){?>
                                <tr>
                                   <td><?php echo htmlspecialchars($row['FullName']); ?></td>
                                   <td><?php echo htmlspecialchars($row['Gender']); ?></td>
                                   <td><?php echo htmlspecialchars($row['Specialization']); ?></td>
                                   <td><?php echo htmlspecialchars($row['YearsOfExperience']); ?></td>
                                   <td><?php echo htmlspecialchars($row['WorkingHours']); ?></td>
                                   <!-- <td><?php echo htmlspecialchars($row['Branch']); ?></td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } 
            ?> 
    </div>
</section>
<?php } ?>
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

    // var mySwiperPartnersElement = document.querySelector('.h__partners-swiper1');
    // if (mySwiperPartnersElement) {
    //     var mySwiperPartners = new Swiper('.h__partners-swiper1', {
    //         loop: true,
    //         slidesPerView: 'auto',
    //         shortSwipes: true,
    //         longSwipes: true,
    //         allowTouchMove: true,
    //         autoplay: {
    //             delay: 1,
    //         },
    //         freeMode: true,
    //         speed: 5000,
    //     });
    // }
    // var swiperTesti = new Swiper(".testi", {
    //     slidesPerView: 1,
    //     spaceBetween: 30,
    //     loop: true,
    //     autoplay: {
    //         delay: 5000,
    //     },
    //     pagination: {
    //         el: ".swiper-pagination",
    //         clickable: true,
    //     },
    // });

    // $(".hide-btn").click(function() {
    //     $("#slide-nav").css("display", "none");
    //     $("body").removeClass("slide-open");
    // });
    // $(".show-btn").click(function() {
    //     $("#slide-nav").css("display", "block");
    //     $("body").addClass("slide-open");
    // });
    // jQuery(document).ready(function() {
    //     if (jQuery.fn.datepicker) {
    //         jQuery('#datepicker').datepicker({
    //             dateFormat: 'dd-mm-yy',
    //             minDate: 0
    //         });
    //     }
    // });
</script>
    </body>
</html>
<?php
include "connection.php";
session_start();
$num_rows = 0;
$query = null;
 $id = mysqli_real_escape_string($con, $_SESSION['id']);
$sql = "SELECT * FROM appointment WHERE user_id = '$id'";
    $query = mysqli_query($con, $sql);
 $num_rows = mysqli_num_rows($query);?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from www.affinity.salon/service.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Jun 2025 13:36:24 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  

        <meta name="google-site-verification" content="HFbmTnl3DFY0OcfFafsHdSffB2itOoYCnX-j9iUUCqE" />
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="canonical" href="service.html"> 
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon -->		
		<link rel="shortcut icon" href="img/favicon.png">

		<!-- all css here -->
                <link rel="stylesheet" href="css/bootstrap.min.css">
		
		<link href="../cdn.jsdelivr.net/npm/bootstrap%405.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <link href="https://fonts.googleapis.com/css2?family=Bellefair&amp;display=swap" rel="stylesheet">

                
                
                <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/swiper%4011/swiper-bundle.min.css" />
                <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
                
                <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/bootstrap-icons%401.11.3/font/bootstrap-icons.min.css">
                
		
                <link rel="stylesheet" href="css/fonts.css">
		<link rel="stylesheet" href="css/meanmenu.min.css">
		
        
		<link rel="stylesheet" href="css/slidemenu.css">
		
		<link rel="stylesheet" href="css/style.css">
		<!-- responsive css -->
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
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NJW4QH8K');</script>
<!-- End Google Tag Manager --><title>Our Services</title>
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
        
		
          
   <?php
include "navbar.php";
?>
		           <!-- Start Slider Area -->
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
                                <img class="ab-image" src="img/img2.jpg" alt="">

                            </div>
                        </div>
                    </div>
                </div>

              <section class="appointments-table-section py-5">
    <div class="container-fluid">
            <?php if ($num_rows > 0) { ?>
                <h2 class="text-center" style="color: #e2b97f; font-family: 'Bellefair', serif; margin-bottom: 30px;">Our Stylists</h2>
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover" id="stylists">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Branch</th>
                                <th>Service</th>
                               
                            </tr>
                            </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                   <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                    <td><?php echo htmlspecialchars($row['dates']); ?></td>
                                    <td><?php echo htmlspecialchars($row['times']); ?></td>
                                    <td><?php echo htmlspecialchars($row['branch']); ?></td>
                                    <td><?php echo htmlspecialchars($row['service']); ?></td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            
            <?php } ?>
        
    </div>
</section>
   
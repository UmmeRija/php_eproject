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

    <title>Affinity Salon</title>
</head>

<body id="home" class="slide_menu slide-right" data-spy="scroll" data-target="#navbar-example">


  <?php
  include "navbar.php";
  ?>
    <!-- Start Slider Area -->
    <div class="swiper banner">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="img/banner.jpg" alt="">

            </div>

            <!--<div class="swiper-slide">
                        <img src="img/banner.jpg" alt="">
                        
                      </div>-->

        </div>

        <!--<div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>-->
    </div>
    <!-- End Slider Area -->
    <!--form-->
    <section class="testibg py-5">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-sm-8 mx-auto">
                    <div class="form py-3" id="appointment">
                        <div class="container-fluid">
                            <form action="booking.php" method="post">
                                <div class="row d-flex align-items-center">

                                    <div class="col-sm-12 mb-3">
                                        <div class="headtext clry">Make an appointment Now</div>
                                    </div>

                                    <div class="width-auto-100 mt-2 mb-2">
                                        <label><i class="fa-regular fa-user   "></i> Name</label>
                                        <input type="text" placeholder="Enter Name " required name="name" class="form-control" id="">
                                    </div>
                                    <div class="width-auto-100 mt-2 mb-2">
                                        <label><i class="fa-regular fa-user   "></i> Email</label>
                                        <input type="email" placeholder="Enter Email " name="email" class="form-control" id="">
                                    </div>
                                    <div class="width-auto-100 mt-2 mb-2">
                                        <label><i class="fa-regular fa-user   "></i> Phone</label>
                                        <input placeholder="Enter Phone " required name="phone" class="form-control" minlength="10" maxlength="14" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    </div>
                                    <div class="width-auto-100  mt-2 mb-2">
                                        <label><i class="fa-solid fa-list"></i> Gender</label>
                                        <select class="selctbox" name="gender" tabindex="6" data-validation="required" required="" data-validation-error-msg="Please select a gender" id="genderSelect">
                                    <option value="">Select Gender*</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                    <option value="2">Others/Undefined</option>
                                  
                              </select>
                                    </div>
                                    <div class="width-auto-100 mt-2 mb-2">
                                        <label><i class="fa-regular fa-calendar"></i> Date</label>
                                        <input type="text" placeholder="Select Date" required name="date" class="form-control" id="datepicker">
                                    </div>
                                    <div class="width-auto-100 mt-2 mb-2">
                                        <label><i class="fa-regular fa-clock"></i> Time</label>
                                        <select class="selctbox" name="time">
                                  <option>Select Time</option>
                                  <option>10:00 AM</option>
                                  <option>11:00 AM</option>
                                  <option>12:00 PM</option>
                                  <option>01:00 PM</option>
                                  <option>02:00 PM</option>
                                  <option>03:00 PM</option>
                              </select>

                                    </div>
                                    <div class="width-auto-100 mt-2 mb-2">
                                        <label><i class="fa-regular fa-handshake"></i> BRANCH</label>
                                        <select class="selctbox" name="branch">
                                  <option>Select Branch</option>
                                  <option>Green Park</option>
                                  <option>Greater kailash II</option>
                                  <option>New Friends Colony</option>
                                  <option>Shivalik Road</option>
                                  <option>Bengali Market</option>
                                  <option>Gurugram</option>

                                  
                              </select>
                                    </div>
                                    <div class="width-auto-100  mt-2 mb-2">
                                        <label><i class="fa-solid fa-list"></i> Service</label>


                                        <!-- Service Selection -->
                                        <select name="service" class="selctbox" id="serviceSelect" disabled required>
                                    <option value="">Select Service</option>
                                </select>
                                    </div>






                                    <div class="width-auto-100  mt-3 mb-2 text-center ">

                                        <input value="Book appointment" type="submit" class="sumbitbtn w-50">
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <!--//form-->


    <!-- Start About Area -->
    <section class="">
        <div class="about-area py-5">
            <div class="container-fluid">
                <div class="row g-0">
                    <div class="col-md-6 rdnone">
                        <div class="about-images">
                            <div class="about-top-image">
                                <img class="ab-image" src="img/img1.jpg" alt="">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  bg1 px-5 text-center d-flex align-items-center">
                        <div class="about-content">
                            <div class="about-headline">

                                <h3 class="text-dark">Feel Divine, Look Great</h3>
                                <span class="side-head top-head">Luxury & Affordability Under One Roof</span>
                            </div>
                            <p class="text-dark"> At Affinity Salon, we believe that a makeover can transform not just how you look, but how you feel. Our team of skilled professionals is dedicated to giving you a flawless experience, where luxury and perfection come together.
                                Feel divine with Affinity.</p>

                            <a href="#appointment" class="btn1">
                                Book appointment
                            </a>



                        </div>
                    </div>

                    <div class="col-md-6 rdblock">
                        <div class="about-images">
                            <div class="about-top-image">
                                <img class="ab-image" src="img/img1.jpg" alt="">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row g-0">

                    <div class="col-md-6 bg2 px-5 text-center d-flex align-items-center">
                        <div class="about-content">
                            <div class="about-headline">

                                <h3 class="text-light">Discover Your Look</h3>
                                 <span class="side-head top-head text-light">Hair / Beauty / Grooming</span>

                            </div>
                            <p class="text-light">
                               Looking for some inspiration? Whether you're aiming for a bold new look or enhancing your everyday style, our professionals are here to create something tailored just for you.</p>
                            <a href="service.php" class="btn1">
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



             


                <div class="row g-0" style="display: none;">

                    <div class="col-md-6 bg2 px-5 text-center d-flex align-items-center">
                        <div class="about-content">
                            <div class="about-headline">

                                <h3 class="text-light">Shop Salon-Quality Products</h3>

                            </div>
                            <p class="text-light">
                                At Affinity Salon, we offer a curated selection of the finest beauty products. From our signature range to trusted brands like Kérastase and Olaplex, everything you need to maintain your look is just a click away.
                            </p>
                            <!--<a href="#" class="btn1">
                               Shop Now
                            </a>
                          -->

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="about-images">
                            <div class="about-top-image">
                                <img class="ab-image" src="img/img4.jpg" alt="">

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container-fluid py-5">
            <div class="h__partners" style="width:100%; overflow: hidden;">
                <div class="h__partners-swiper1">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo1.png" />
                        </div>

                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo2.png" />
                        </div>

                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo3.png" />
                        </div>
                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo4.png" />
                        </div>

                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo5.png" />
                        </div>
                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo6.png" />
                        </div>
                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo7.png" />
                        </div>

                        <div class="swiper-slide">
                            <img class="h__partners-image" src="img/mlogo8.png" />
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </section>

    <sction>
        <img class="" src="img/galery.png" />
    </sction>

    <section class="py-5 bg2 leader team">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="headtext clry">
                        OUR LEADERS
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 col-md-4 mt-5">
                    <div class="row">
                        <div class="col-10">
                            <img src="img/team1.png" class="img-fluid">
                        </div>
                        <div class="col-2 position-relative d-flex justify-content-center">
                            <div class="socialbox" style="">
                                <a href=" " target="_blank" class="d-block">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="" class="d-block mt-2" target="_blank">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="col-12">
                            <div class="namebox">
                                Vinit Dua
                                <span>Chairman</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mt-5">
                    <div class="row">
                        <div class="col-10">
                            <img src="img/team2.png" class="img-fluid">
                        </div>
                        <div class="col-2 position-relative d-flex justify-content-center">
                            <div class="socialbox" style="">
                                <a href="" class="d-block" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="" class="d-block mt-2" target="_blank">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="col-12">
                            <div class="namebox">
                                Siddhant Dua
                                <span>CEO</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>




    </section>

    <section class="testibg py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="headtext clry mb-5 text-center">
                        OUR CLIENTS SAY
                    </div>
                </div>
                <div class="col-md-9 mx-auto">
                    <div class="swiper testi">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide bg1">
                                <div class="row g-0 py-5">
                                    <div class="col-md-12 text-center px-3 d-flex align-items-center">
                                        <div class="">
                                            <div class="icon"><img src="img/testiicon.png"></div>
                                            <p class="text-dark">
                                                Had a wonderful day at affinity. Looking for a clean and refreshing look and they exceeded my expectations. Also, it was a super clean process. A Guy named Piyush there guided me through all the services. Great experience

                                            </p>
                                            <p class="text-dark"><u>Aaditya Rai</u>
                                                <br>Google Review
                                            </p>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                                <div class="imgs">
                                                    <img src="img/t1.jpg" class="img-fluid">
                                                </div>
                                            </div>-->
                                </div>

                            </div>

                            <div class="swiper-slide bg1">
                                <div class="row g-0 py-5">
                                    <div class="col-md-12  text-center px-3 d-flex align-items-center">
                                        <div class="">
                                            <div class="icon"><img src="img/testiicon.png"></div>
                                            <p class="text-dark">
                                                Ms. Sujata, Hair Stylist at Affinity Elite, New Friends Colony, New Delhi is an expert and a master hair stylist. I have been searching for such expertise for a long time now. The travel from Gurgaon to Delhi to avail of Sujata's services has been highly
                                                satisfying and very much to my expectations. I would also like to commend the management and staff of the NFC Affinity Elite for their professionalism, friendly behaviour and superb service. Dahlia

                                            </p>
                                            <p class="text-dark"><u>Dahlia Dutta</u>
                                                <br>Google Review
                                            </p>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                                <div class="imgs">
                                                    <img src="img/t1.jpg" class="img-fluid">
                                                </div>
                                                
                                            </div>-->
                                </div>

                            </div>



                        </div>


                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include "footer.php";
?>
    <!-- all js here -->

    <!-- jquery latest version -->
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
    <script>
        jQuery(document).ready(function() {
            jQuery('#datepicker').datepicker({
                dateFormat: 'dd-mm-yy',

                startDate: '+1d',

                minDate: 0
            });
        });
    </script>


    <script>
        // Define the service options for each gender
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

        // Function to populate the service dropdown based on selected gender
        function updateServices() {
            const gender = document.getElementById("genderSelect").value;
            const serviceSelect = document.getElementById("serviceSelect");

            // Clear previous options
            serviceSelect.innerHTML = '<option value="">Select Service</option>';

            // Enable the service dropdown only if a gender is selected
            if (gender) {
                serviceSelect.disabled = false;

                // Determine the appropriate services based on gender
                const services = gender === "1" ? ladiesServices : gentsServices;

                // Populate the service options
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

        // Event listener for gender selection change
        document.getElementById("genderSelect").addEventListener("change", updateServices);
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->




    <!--form validation -->




    <script type="text/javascript">
        function validateEmail(email) {
            // a very simple email validation checking. 
            // you can add more complex email checking if it helps 
            if (email.length <= 0) {
                return true;
            }
            var splitted = email.match("^(.+)@(.+)$");
            if (splitted == null) return false;
            if (splitted[1] != null) {
                var regexp_user = /^\"?[\w-_\.]*\"?$/;
                if (splitted[1].match(regexp_user) == null) return false;
            }
            if (splitted[2] != null) {
                var regexp_domain = /^[\w-\.]*\.[A-Za-z]{2,4}$/;
                if (splitted[2].match(regexp_domain) == null) {
                    var regexp_ip = /^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
                    if (splitted[2].match(regexp_ip) == null) return false;
                } // if
                return true;
            }
            return false;
        }

        function isInteger(s) {
            var i;
            for (i = 0; i < s.length; i++) {
                var c = s.charAt(i);
                if (((c < "0") || (c > "9"))) return false;
            }
            // All characters are numbers.
            return true;
        }

        function validateFrme() {
            // Clear all error messages
            document.getElementById('nameErr').innerHTML = "";
            document.getElementById('genderErr').innerHTML = "";
            document.getElementById('phoneErr').innerHTML = "";
            document.getElementById('serviceErr').innerHTML = "";

            // Validate fields
            var nameElement = document.getElementById('cname');
            var name = nameElement ? nameElement.value : '';

            if (!name.trim()) {
                document.getElementById('nameErr').innerHTML = "Please Enter Name";
                if (nameElement) nameElement.focus();
                return false;
            }

            var genderElement = document.getElementById('gender');
            var gender = genderElement ? genderElement.value : '';

            if (!gender.trim()) {
                document.getElementById('genderErr').innerHTML = "Please Select Gender";
                if (genderElement) genderElement.focus();
                return false;
            }

            var phoneElement = document.getElementById('phone');
            var phone = phoneElement ? phoneElement.value : '';

            if (!phone.trim()) {
                document.getElementById('phoneErr').innerHTML = "Please Enter Phone Number";
                if (phoneElement) phoneElement.focus();
                return false;
            }

            if (isNaN(phone)) {
                document.getElementById('phoneErr').innerHTML = "Phone No. should be Numeric";
                if (phoneElement) phoneElement.focus();
                return false;
            }

            var serviceElement = document.getElementById('service');
            var service = serviceElement ? serviceElement.value : '';

            if (!service.trim()) {
                document.getElementById('serviceErr').innerHTML = "Kindly Select Atleast a Service";
                if (serviceElement) serviceElement.focus();
                return false;
            }

            var form = $("#frm");
            $('#btn_apppointment').hide();
            // $('#processing').show();
            $.ajax({
                type: "POST",
                url: 'process.php',
                data: form.serialize(),
                success: function(response) {
                    if (response == 1) {
                        window.location = "thanks.php";
                    } else {

                        $('#alert_message').html(response);
                        // $('#processing').hide();
                        $('#btn_apppointment').show();
                        $('#frm')[0].reset();
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                $(this).remove();
                            });
                        }, 4000);
                    }

                }
            });
            return true;
        }
    </script>
</body>

</html>
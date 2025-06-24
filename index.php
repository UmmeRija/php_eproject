<?php
include "connection.php"; // Make sure connection.php sets up $con
session_start();

// Enable error reporting for debugging - REMOVE IN PRODUCTION
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$is_logged_in = isset($_SESSION['id']);
$num_rows = 0; // Initialize for no appointments by default
$query = null; // Initialize query result

// Fetch appointments only if the user is logged in
if ($is_logged_in) {
    // IMPORTANT: Make sure 'user_id' in your 'appointment' table
    // corresponds to 'id' in your 'users' table and $_SESSION['id']
    $id = mysqli_real_escape_string($con, $_SESSION['id']);
    $sql = "SELECT * FROM appointment WHERE user_id = '$id'";
    $query = mysqli_query($con, $sql);

    // Check if the query itself failed (e.g., table doesn't exist, bad connection)
    if (!$query) {
        // If query failed, display an error message and stop execution
        echo "<!doctype html><html><head><title>Error</title><link rel='stylesheet' href='css/bootstrap.min.css'><style>body{background-color:#000;color:#fff;display:flex;justify-content:center;align-items:center;height:100vh;font-family:'Bellefair',serif;} .error-message{text-align:center;padding:20px;border:1px solid #e2b97f;border-radius:8px;} h1{color:#e2b97f;}</style></head><body><div class='error-message'><h1>Database Error!</h1><p>Failed to retrieve appointments. Please try again later or contact support.</p><p>Technical details: " . mysqli_error($con) . "</p></div></body></html>";
        exit(); // Stop script execution here
    }

    // Get the number of rows only if the query was successful
    $num_rows = mysqli_num_rows($query);
}
// If not logged in, $query remains null and $num_rows remains 0,
// which is correct for displaying the "login to view" message.
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
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NJW4QH8K');
    </script>
    <title>Elegance Salon</title>
    <style>
        .welcome-user-heading {
            font-family: 'Bellefair', serif;
            color: #fff;
            font-size: 3.5em;
            font-weight: normal;
            letter-spacing: 2px;
            margin-top: 60px;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        @media (max-width: 991px) {
            .welcome-user-heading {
                font-size: 2.8em;
                margin-top: 40px;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 767px) {
            .welcome-user-heading {
                font-size: 2em;
                margin-top: 30px;
                margin-bottom: 20px;
                letter-spacing: 1px;
            }
        }

        /* NEW STYLES FOR LOGIN PROMPT BOX */
        .login-prompt-box {
            background-color: #1a1a1a;
            border-radius: 8px;
            margin-top: 20px;
            padding: 40px;
            text-align: center;
        }

        .login-prompt-box h2 {
            color: #e2b97f;
            font-family: 'Bellefair', serif;
            margin-bottom: 20px;
        }

        .login-prompt-box p {
            color: #fff;
            margin-bottom: 25px;
            font-size: 1.1em;
        }

        .login-prompt-box .btn-warning {
            background-color: #e2b97f;
            border-color: #e2b97f;
            color: #000;
            padding: 12px 30px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .login-prompt-box .btn-warning:hover {
            background-color: #d1a86e;
            border-color: #d1a86e;
        }
      /* Existing styles for .table-responsive .btn-edit, .table-responsive .btn-delete */
.table-responsive .btn-edit,
.table-responsive .btn-delete {
    padding: 4px 8px; /* Adjust padding for button size */
    border: none;
    border-radius: 4px; /* Slightly rounded corners */
    font-size: 13px; /* Adjust font size */
    font-weight: 500; /* Medium font weight */
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
    text-transform: uppercase; /* Match your other buttons if they are uppercase */
    margin: 0 5px; /* Add some space between buttons */
    display: inline-flex; /* Allows text and icons to align well if you add icons later */
    align-items: center;
    justify-content: center;
}

/* Styles for Delete Button */
.table-responsive .btn-delete {
    background-color: #5a3d31; 
    color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.table-responsive .btn-delete:hover {
    background-color: #3b281f; 
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.table-responsive .btn-delete:active {
    transform: translateY(0);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

/* --- ADD THESE STYLES FOR EDIT BUTTON --- */
.table-responsive .btn-edit {
    background-color: #e2b97f; /* Your theme's gold/brown color */
    color: #000; /* Black text for contrast */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.table-responsive .btn-edit:hover {
    background-color: #d1a968; /* Slightly darker gold on hover */
    color: #000;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.table-responsive .btn-edit:active {
    transform: translateY(0);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}
/* --- END ADDED STYLES --- */
thead{
color: #d1a86e;
}
 
    </style>
</head>

<body id="home" class="slide_menu slide-right" data-spy="scroll" data-target="#navbar-example">

    <?php include "navbar.php"; ?>
    <div class="swiper banner">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="img/banner.jpg" alt="">
            </div>
        </div>
    </div>

    <section class="testibg py-5">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-sm-8 mx-auto">
                    <div class="form py-3" id="appointment">
                        <h1 class="welcome-user-heading text-center">Welcome, <?php echo $is_logged_in ? htmlspecialchars($_SESSION['name']) : 'Guest'; ?>!</h1>

                        <?php if ($is_logged_in) { ?>
                            <div class="container-fluid">
                                <form action="booking.php" method="post">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-sm-12 mb-3">
                                            <div class="headtext clry">Make an appointment Now</div>
                                        </div>

                                        <div class="width-auto-100 mt-2 mb-2">
                                            <label><i class="fa-regular fa-user "></i> Name</label>
                                            <input type="text" placeholder="Enter Name " required name="name" class="form-control" id="" value="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : ''; ?>">
                                        </div>
                                        <div class="width-auto-100 mt-2 mb-2">
                                            <label><i class="fa-regular fa-user "></i> Email</label>
                                            <input type="email" placeholder="Enter Email " name="email" class="form-control" id="" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>">
                                        </div>
                                        <div class="width-auto-100 mt-2 mb-2">
                                            <label><i class="fa-regular fa-user "></i> Phone</label>
                                            <input placeholder="Enter Phone " required name="phone" class="form-control" minlength="10" maxlength="14" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : ''; ?>">
                                        </div>
                                        <div class="width-auto-100 mt-2 mb-2">
                                            <label><i class="fa-solid fa-list"></i> Gender</label>
                                            <select class="selctbox" name="gender" tabindex="6" data-validation="required" required="" data-validation-error-msg="Please select a gender" id="genderSelect">
                                                <option value="">Select Gender*</option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                                <option value="Others/Undefined">Others/Undefined</option>
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
                                       <div class="width-auto-100 mt-2 mb-2">
    <label><i class="fa-solid fa-list"></i> Service</label>
    <select name="service" class="selctbox" id="serviceSelect" required>
        <option value="">Select Service</option>
        </select>
    <span id="serviceErr" style="color: red;"></span>
</div>
                                         <div class="width-auto-100 mt-2 mb-2">
                                            <label><i class="fa-solid fa-users"></i> Stylist</label>
                                            <select class="selctbox" name="stylist">
                                                <option>Select Stylist</option>
                                                <option>10:00 AM</option>
                                                <option>11:00 AM</option>
                                                <option>12:00 PM</option>
                                                <option>01:00 PM</option>
                                                <option>02:00 PM</option>
                                                <option>03:00 PM</option>
                                            </select>
                                        </div>
                                        <div class="width-auto-100 mt-3 mb-2 text-center ">
                                            <input value="Book appointment" type="submit" class="sumbitbtn w-50">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div class="container-fluid login-prompt-box">
                                <h2>Login to Book an Appointment</h2>
                                <p>To schedule your appointment, please log in or create an account.</p>
                                <button type="button" class="btn btn-warning" onclick="promptLoginForBooking()">Book Appointment Now</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <section class="appointments-table-section py-5">
    <div class="container-fluid">
        <?php if ($is_logged_in) { ?>
            <?php if ($num_rows > 0) { ?>
                <h2 class="text-center" style="color: #e2b97f; font-family: 'Bellefair', serif; margin-bottom: 30px;">Your Appointments</h2>
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Branch</th>
                                <th>Service</th>
                                <!-- <th>Stylist</th> -->
                                <th>Status</th>
                                <th>Options</th>
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
                                     <!-- <td><?php echo htmlspecialchars($row['stylist']); ?></td> -->
                                      <td><?php echo htmlspecialchars($row['status']); ?></td>
                                    <td>
                                        <a href="edit.php?appointment_id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-sm btn-edit">
                                            Edit Appointment
                                        </a>

                                        <a href="delete.php?appointment_id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-sm btn-delete" onclick="return confirm('Are you sure you want to cancel this appointment?');">
                                            Cancel
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="text-center alert alert-info" role="alert" style="background-color: #1a1a1a; border-color: #333; color: #fff;">
                    <h4 class="alert-heading" style="color: #e2b97f;">No Appointments Yet!</h4>
                    <p>It looks like you haven't booked any appointments. Use the form above to schedule one!</p>
                    <hr>
                    <p class="mb-0">Your booked appointments will appear here.</p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="text-center login-prompt-box">
                <h2>View Your Appointments</h2>
                <p>Log in to view your past and upcoming appointments.</p>
                <button type="button" class="btn btn-warning" onclick="promptLoginForBooking()">Login to View Appointments</button>
            </div>
        <?php } ?>
    </div>
</section>
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
                            <img src="img/founder1.jpg" class="img-fluid">
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
                                Ghazal
                                <span>Chairman</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mt-5">
                    <div class="row">
                        <div class="col-10">
                            <img src="img/founder2.jpg" class="img-fluid">
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
                                Aisha Dua
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<script src="js/jquery.meanmenu.js"></script>
<script src="js/iscroll.js"></script>
<script src="js/slidemenu.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>


<script>
    // Swiper Initializations (from your original code)
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

    // Ensure .slider is not null before creating new Swiper instance
    var mySwiper1Element = document.querySelector('.h__partners-swiper1');
    if (mySwiper1Element) {
        var mySwiper1 = new Swiper('.h__partners-swiper1', {
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

    var swiperTesti = new Swiper(".testi", { // Renamed variable to avoid conflict
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
        // You might want to add $("body").addClass("slide-open"); here if that's its purpose
    });


    // Define ALL service options (IDENTICAL to edit.php)
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

  function populateAllServices(serviceSelectElementId, currentService = '') {
    const serviceSelect = document.getElementById(serviceSelectElementId);
    serviceSelect.innerHTML = '<option value="">Select Service</option>';

    const labelElement = serviceSelect.previousElementSibling;

    if (labelElement && labelElement.tagName === 'LABEL') {
        labelElement.style.color = 'black'; // Changed to black
    }
}
        const allServices = [...ladiesServices, ...gentsServices]; // Combine all services

        allServices.forEach(group => {
            const optgroup = document.createElement("optgroup");
            optgroup.label = group.label;

            group.options.forEach(service => {
                const option = document.createElement("option");
                option.value = service;
                option.textContent = service;
                if (service === currentService) { // This part is for pre-selection (used in edit.php)
                    option.selected = true;
                }
                optgroup.appendChild(option);
            });
            serviceSelect.appendChild(optgroup);
        });
        serviceSelect.disabled = false; // Ensure it's always enabled
    }


    // jQuery's document ready function: Initializes datepicker and populates services
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "dd-mm-yy",
            minDate: 0 // Prevents selecting past dates
        });

        // Populate the service dropdown on page load with all services
        populateAllServices('serviceSelect');
    });


    // --- Your existing form validation functions ---

    function validateEmail(email) {
        // Simplified email validation for modern browsers; your original was very complex.
        // A simple regex check is often sufficient for basic client-side validation.
        // For robust validation, rely on server-side checks.
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function isInteger(s) {
        var isInteger = /^[0-9]+$/;
        return isInteger.test(s);
    }

    function validateFrme() {
        // Clear all error messages
        document.getElementById('nameErr').innerHTML = "";
        document.getElementById('emailErr').innerHTML = ""; // Added email error clear
        document.getElementById('phoneErr').innerHTML = "";
        document.getElementById('dateErr').innerHTML = ""; // Added date error clear
        document.getElementById('timeErr').innerHTML = ""; // Added time error clear
        document.getElementById('serviceErr').innerHTML = "";
        document.getElementById('msgErr').innerHTML = ""; // Added msg error clear
        document.getElementById('genderErr').innerHTML = ""; // Keep if gender field exists

        // Get form elements
        var name = document.getElementById("name").value; // Using ID 'name' as per your HTML from previous context
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var date = document.getElementById("datepicker").value;
        var time = document.getElementById("time").value;
        var service = document.getElementById("serviceSelect").value; // Corrected ID
        var msg = document.getElementById("msg").value;
        var gender = document.getElementById("gender") ? document.getElementById("gender").value : ''; // Assuming gender might be there

        if (name == "") {
            document.getElementById("nameErr").innerHTML = "Name is required.";
            return false;
        }

        if (email == "") {
            document.getElementById("emailErr").innerHTML = "Email is required.";
            return false;
        } else if (!validateEmail(email)) {
            document.getElementById("emailErr").innerHTML = "Invalid email format.";
            return false;
        }

        if (phone == "") {
            document.getElementById("phoneErr").innerHTML = "Phone is required.";
            return false;
        } else if (!isInteger(phone) || phone.length !== 10) { // Assuming 10-digit phone
            document.getElementById("phoneErr").innerHTML = "Phone must be a 10-digit number.";
            return false;
        }

        if (date == "") {
            document.getElementById("dateErr").innerHTML = "Date is required.";
            return false;
        }

        if (time == "") {
            document.getElementById("timeErr").innerHTML = "Time is required.";
            return false;
        }

        if (service == "") {
            document.getElementById("serviceErr").innerHTML = "Service is required.";
            return false;
        }

        // If gender field exists and is required:
        if (document.getElementById("gender") && gender == "") {
             document.getElementById("genderErr").innerHTML = "Please Select Gender";
             return false;
        }


        if (msg == "") {
            document.getElementById("msgErr").innerHTML = "Message is required.";
            return false;
        }


        var form = $("#frm");
        $('#btn_apppointment').hide();
        // $('#processing').show(); // Uncomment if you have a processing indicator
        $.ajax({
            type: "POST",
            url: 'process.php',
            data: form.serialize(),
            success: function(response) {
                if (response == 1) {
                    window.location = "thanks.php";
                } else {
                    $('#alert_message').html(response);
                    // $('#processing').hide(); // Uncomment if you have a processing indicator
                    $('#btn_apppointment').show();
                    $('#frm')[0].reset();
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function() {
                            $(this).remove();
                        });
                    }, 4000);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
                $('#alert_message').html("An error occurred. Please try again.");
                $('#btn_apppointment').show();
            }
        });
        return false; // Return false to prevent default form submission
    }

    // JavaScript function to prompt login and redirect
    function promptLoginForBooking() {
        Swal.fire({
            title: "Login Required",
            text: "You need to be logged in to book an appointment.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Login Now"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "login.php"; // Redirect to your login page
            }
        });
    }
</script>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
</body>

</html>
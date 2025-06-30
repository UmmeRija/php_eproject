<?php
include "connection.php"; 
session_start();
$is_logged_in = isset($_SESSION['id']);
$num_rows = 0; 
$query = null; 

if ($is_logged_in) {
    $id = mysqli_real_escape_string($con, $_SESSION['id']);
    $sql = "SELECT * FROM appointment WHERE user_id = '$id'";
    $query = mysqli_query($con, $sql);    
    if (!$query) {   
        echo "<!doctype html><html><head><title>Error</title><link rel='stylesheet' href='css/bootstrap.min.css'><style>body{background-color:#000;color:#fff;display:flex;justify-content:center;align-items:center;height:100vh;font-family:'Bellefair',serif;} .error-message{text-align:center;padding:20px;border:1px solid #e2b97f;border-radius:8px;} h1{color:#e2b97f;}</style></head><body><div class='error-message'><h1>Database Error!</h1><p>Failed to retrieve appointments. Please try again later or contact support.</p><p>Technical details: " . mysqli_error($con) . "</p></div></body></html>";
        exit(); 
    } 
    $num_rows = mysqli_num_rows($query);
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
                "https://www.facebook.com",
                "https://www.instagram.com"
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
.table-responsive .btn-edit,
.table-responsive .btn-delete {
    padding: 4px 8px; 
    border: none;
    border-radius: 4px; 
    font-size: 13px;
    font-weight: 500; 
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
    text-transform: uppercase; 
    margin: 0 5px; 
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

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

.table-responsive .btn-edit {
    background-color: #e2b97f; 
    color: #000; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.table-responsive .btn-edit:hover {
    background-color: #d1a968;
    color: #000;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.table-responsive .btn-edit:active {
    transform: translateY(0);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}
thead{
color: #d1a86e;
}

        .selctbox optgroup {
            color: black !important; 
            background-color: white !important;
        }

        .selctbox option {
            color: black !important; 
            background-color: white !important; 
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
                                                <option>04:00 PM</option>
                                                <option>05:00 PM</option>
                                            </select>
                                        </div>
                                        <div class="width-auto-100 mt-2 mb-2">
                                            <label><i class="fa-regular fa-handshake"></i> BRANCH</label>
                                            <select class="selctbox" name="branch">
                                                <option>Select Branch</option>
                                                <option>Saddar</option>
                                                <option>PECHS Block II</option>
                                                <option>Defence Block V</option>
                                                <option>North Nazimabad</option>
                                                <option>Malir Cantt</option>
                                            </select>
                                        </div>
                                       <div class="width-auto-100 mt-2 mb-2">
                                            <label><i class="fa-solid fa-list"></i> Service</label>
                                            <select name="service" class="selctbox" id="serviceSelect" required>
                                                <option value="">Select Service</option>
                                                </select>
                                            <span id="serviceErr" style="color: red;"></span>
                                        </div>
                                    </div>
                                       <div class="width-auto-100 mt-2 mb-2">
                                        <label><i class="fa-solid fa-users"></i> Stylist</label>
                                            <select class="selctbox" name="stylist">
                                            <option value="">Select Stylist</option>
                                            <option value="No Preferences">No Preferences</option>
                                                <?php
                                                include 'connection.php'; 

                                                $sql1 = "SELECT FullName FROM stylist";
                                                $query1 = mysqli_query($con, $sql1);

                                                if ($query1 && mysqli_num_rows($query1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($query1)) {
                                                    echo '<option value="' . htmlspecialchars($row1['FullName']) . '">' . htmlspecialchars($row1['FullName']) . '</option>';
                                                    }
                                                } else {
                                                    echo '<option disabled>No Stylists Available</option>';
                                                }
                                                ?>
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
                                <th>Status</th>
                                <th>Stylist</th>
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
                                   <td><?php echo htmlspecialchars($row['status']); ?></td>
                                    <td><?php echo htmlspecialchars($row['stylist']); ?></td>
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
                            <p class="text-dark"> At Elegance Salon, we believe that a makeover can transform not just how you look, but how you feel. Our team of skilled professionals is dedicated to giving you a flawless experience, where luxury and perfection come together.
                                Feel divine with Elegance.</p>
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
                                At Elegance Salon, we offer a curated selection of the finest beauty products. From our signature range to trusted brands like Kérastase and Olaplex, everything you need to maintain your look is just a click away.
                            </p>
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
        <img class="" src="img/gallery.png"/>
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
                                                Had a wonderful day at Elegance. Looking for a clean and refreshing look and they exceeded my expectations. Also, it was a super clean process. A guy named Ayaan there guided me through all the services. Great experience! Would definitely visit again.

                                            </p>
                                            <p class="text-dark"><u>Zara Ali</u>
                                                <br>Google Review
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide bg1">
                                <div class="row g-0 py-5">
                                    <div class="col-md-12  text-center px-3 d-flex align-items-center">
                                        <div class="">
                                            <div class="icon"><img src="img/testiicon.png"></div>
                                            <p class="text-dark">
                                                Ms. Ria, Hair Stylist at Elegance Elite, Saddar, Karachi is an expert and a master hair stylist. I have been searching for such expertise for a long time now. The travel from Hyderabad to Karachi to avail of Ria's services has been highly
                                                satisfying and very much to my expectations. I would also like to commend the management and staff of the NFC Elegance Elite for their professionalism, friendly behaviour and superb service.
                                            </p>
                                            <p class="text-dark"><u>Sana Ahmed</u>
                                                <br>Google Review
                                            </p>
                                        </div>
                                    </div>
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
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/iscroll.js"></script>
<script src="js/slidemenu.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
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

    // jQuery UI Datepicker
    jQuery(document).ready(function() {
        jQuery('#datepicker').datepicker({
            dateFormat: 'dd-mm-yy',
            startDate: '+1d',
            minDate: 0
        });
    });

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

    const combinedServices = [{
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
    }, {
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
        const gender = document.getElementById("genderSelect").value;
        const serviceSelect = document.getElementById("serviceSelect");
        serviceSelect.innerHTML = '<option value="">Select Service</option>';
        if (gender) {
            serviceSelect.disabled = false;
            let servicesToDisplay;
            if (gender === "Female") {
                servicesToDisplay = ladiesServices;
            } else if (gender === "Male") {
                servicesToDisplay = gentsServices;
            } else if (gender === "Others/Undefined") {
                servicesToDisplay = combinedServices;
            } else {
                serviceSelect.disabled = true;
                return;
            }
            servicesToDisplay.forEach(group => {
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
    document.getElementById("genderSelect").addEventListener("change", updateServices);
    document.addEventListener("DOMContentLoaded", updateServices);
    // Email validation
    function validateEmail(email) {
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
            }
            return true;
        }
        return false;
    }

    function isInteger(s) {
        for (var i = 0; i < s.length; i++) {
            var c = s.charAt(i);
            if (((c < "0") || (c > "9"))) return false;
        }
        return true;
    }

    // Form validation
    function validateFrme() {
        document.getElementById('nameErr').innerHTML = "";
        document.getElementById('genderErr').innerHTML = "";
        document.getElementById('phoneErr').innerHTML = "";
        document.getElementById('serviceErr').innerHTML = "";
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
        $.ajax({
            type: "POST",
            url: 'process.php',
            data: form.serialize(),
            success: function(response) {
                if (response == 1) {
                    window.location = "thanks.php";
                } else {
                    $('#alert_message').html(response);
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
    function promptLoginForBooking() {
        window.location.href = 'login.php'; 
    }
</script>
</body>

</html>
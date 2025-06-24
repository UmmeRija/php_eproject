<?php
session_start();
include "connection.php"; // Your database connection file

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$user_session_id = mysqli_real_escape_string($con, $_SESSION['id']); // Sanitize user ID from session
$appointment = null; // Initialize appointment variable

// --- START: Handle form submission (POST request) first ---
if (isset($_POST['update_appointment'])) {
    if (isset($_POST['appointment_id']) && !empty($_POST['appointment_id'])) {
        $appointment_id = mysqli_real_escape_string($con, $_POST['appointment_id']);
        $dates = mysqli_real_escape_string($con, $_POST['dates']);
        $times = mysqli_real_escape_string($con, $_POST['times']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $branch = mysqli_real_escape_string($con, $_POST['branch']);
        $service = mysqli_real_escape_string($con, $_POST['service']);
        // $stylist = mysqli_real_escape_string($con, $_POST['stylist']); 

        // Format date to YYYY-MM-DD for database if it's coming as DD-MM-YYYY
        $date_obj = DateTime::createFromFormat('d-m-Y', $dates);
        if ($date_obj) {
            $formatted_dates = $date_obj->format('Y-m-d');
        } else {
            $formatted_dates = $dates; // Use as is if format is not DD-MM-YYYY or invalid
        }


        // Update the appointment in the database
        // IMPORTANT: Ensure the update query also checks for user_id for security
        $update_sql = "UPDATE appointment SET 
                       dates = '$formatted_dates', 
                       times = '$times', 
                       gender = '$gender', 
                       branch = '$branch', 
                       service = '$service'
                    --    stylist = '$stylist'
                       WHERE id = '$appointment_id' AND user_id = '$user_session_id'";

        if (mysqli_query($con, $update_sql)) {
            echo "<script>alert('Appointment updated successfully!');</script>";
            echo "<script>window.location.href='index.php';</script>"; // Redirect to view page
            exit();
        } else {
            echo "<script>alert('Error updating appointment: " . mysqli_error($con) . "');</script>";
            // For debugging: echo mysqli_error($con);
        }
    } else {
        echo "<script>alert('Error: Appointment ID not provided for update.');</script>";
    }
}
// --- END: Handle form submission ---

// --- START: Fetch appointment data for displaying the form (GET request or after a failed POST) ---
// This block runs if it's a GET request, or if a POST request failed and we need to re-display the form
$appointment_id_to_fetch = null;

if (isset($_GET['appointment_id']) && !empty($_GET['appointment_id'])) {
    $appointment_id_to_fetch = mysqli_real_escape_string($con, $_GET['appointment_id']);
} elseif (isset($_POST['appointment_id']) && !empty($_POST['appointment_id'])) {
    // If a POST request just happened and failed, use the ID from POST to re-populate the form
    $appointment_id_to_fetch = mysqli_real_escape_string($con, $_POST['appointment_id']);
}

if ($appointment_id_to_fetch) {
    // Fetch the specific appointment's data
    // IMPORTANT: Add security check - ensure the appointment belongs to the logged-in user
    $sql = "SELECT * FROM appointment WHERE id = '$appointment_id_to_fetch' AND user_id = '$user_session_id'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $appointment = mysqli_fetch_assoc($result);
    } else {
        // Appointment not found or does not belong to the user
        echo "<script>alert('Appointment not found or you do not have permission to edit it.');</script>";
        echo "<script>window.location.href='index.php';</script>"; // Redirect back to view page
        exit();
    }
} else {
    // No appointment ID provided in the URL or POST for fetching
    echo "<script>alert('No appointment ID provided for editing.');</script>";
    echo "<script>window.location.href='index.php';</script>"; // Redirect back to view page
    exit();
}
// --- END: Fetch appointment data ---

// If we reach here, $appointment contains the data for the valid, owned appointment
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
        })(window, document, 'script', 'GTM-NJW4QH8K');
    </script>
    <title>Elegance Salon</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .edit-form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #1a1a1a;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(226, 185, 127, 0.2);
        }
        .edit-form-container h2 {
            color: #e2b97f;
            text-align: center;
            margin-bottom: 30px;
            font-family: 'Bellefair', serif;
        }
        /* Keep these from your booking form for consistency */
        .width-auto-100 {
            width: 100%;
        }
        .selctbox {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: #2b2b2b;
            border: 1px solid #444;
            border-radius: 6px;
            color: #fff;
            font-size: 14px;
            font-family: inherit;
            /* For dropdown arrows on dark background */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20256%20256%22%3E%3Cpath%20fill%3D%22%23dddddd%22%20d%3D%22M208.5%2089.5l-64%2064c-4.7%204.7-12.3%204.7-17%200l-64-64c-4.7-4.7-4.7-12.3%200-17s12.3-4.7%2017%200L128%20138l55.5-55.5c4.7-4.7%2012.3-4.7%2017%200s4.7%2012.3%200%2017z%22%2F%3E%3C%2Fsvg%3E'); /* Custom SVG for dropdown arrow */
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
        }
        .selctbox:focus {
            outline: none;
            border-color: #e2b97f;
            box-shadow: 0 0 5px rgba(226, 185, 127, 0.5);
        }
        .form-control { /* Also apply to text inputs like datepicker */
            background-color: #2b2b2b;
            border: 1px solid #444;
            color: #fff;
        }
        .form-control:focus {
            background-color: #2b2b2b;
            border-color: #e2b97f;
            box-shadow: 0 0 0 0.25rem rgba(226, 185, 127, 0.25);
            color: #fff;
        }
        label {
            color: #ddd;
            margin-bottom: 5px;
            display: block; /* Ensures label takes full width */
            font-weight: 500;
            font-size: 13px;
        }
        label i { /* Styling for font-awesome icons in labels */
            margin-right: 5px;
            color: #e2b97f;
        }
        .btn-submit-edit {
            background-color: #e2b97f;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit-edit:hover {
            background-color: #d1a968;
            color: #000;
        }
        .btn-back {
            background-color: #5a3d31;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #3b281f;
            color: #fff;
        }
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

<body>
<?php include "navbar.php"; ?>

<div class="edit-form-container">
    <h2 class="headtext clry">Edit Appointment</h2>
    <?php if ($appointment) { ?>
        <form action="edit.php" method="POST">
            <input type="hidden" name="appointment_id" value="<?php echo htmlspecialchars($appointment['id']); ?>">

            <div class="width-auto-100 mt-2 mb-2">
                <label><i class="fa-regular fa-calendar"></i> Date</label>
                <input type="text" placeholder="Select Date" required name="dates" class="form-control" id="datepicker" value="<?php echo htmlspecialchars($appointment['dates']); ?>">
            </div>

            <div class="width-auto-100 mt-2 mb-2">
                <label><i class="fa-regular fa-clock"></i> Time</label>
                <select class="selctbox" name="times" required>
                    <option value="">Select Time</option>
                    <?php
                    $times = ["10:00 AM", "11:00 AM", "12:00 PM", "01:00 PM", "02:00 PM", "03:00 PM"];
                    foreach ($times as $time_option) {
                        $selected = ($appointment['times'] == $time_option) ? 'selected' : '';
                        echo "<option value=\"$time_option\" $selected>$time_option</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="width-auto-100 mt-2 mb-2">
                <label><i class="fa-solid fa-list"></i> Gender</label>
                <select class="selctbox" name="gender" required>
                    <option value="">Select Gender*</option>
                    <option value="Female" <?php if ($appointment['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Male" <?php if ($appointment['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Others/Undefined" <?php if ($appointment['gender'] == 'Others/Undefined') echo 'selected'; ?>>Others/Undefined</option>
                </select>
            </div>

            <div class="width-auto-100 mt-2 mb-2">
                <label><i class="fa-solid fa-handshake"></i> BRANCH</label>
                <select class="selctbox" name="branch" required>
                    <option value="">Select Branch</option>
                    <?php
                    $branches = ["Green Park", "Greater kailash II", "New Friends Colony", "Shivalik Road", "Bengali Market", "Gurugram"];
                    foreach ($branches as $branch_option) {
                        $selected = ($appointment['branch'] == $branch_option) ? 'selected' : '';
                        echo "<option value=\"$branch_option\" $selected>$branch_option</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="width-auto-100 mt-2 mb-2">
                <label><i class="fa-solid fa-list"></i> Service</label>
                <select name="service" class="selctbox" id="serviceSelect" required>
                    <option value="">Select Service</option>
                    </select>
            </div>

            <!-- <div class="width-auto-100 mt-2 mb-2">
                <label><i class="fa-solid fa-users"></i> Stylist</label>
                <select class="selctbox" name="stylist">
                    <option value="">Select Stylist</option>
                    <?php
                    
                    $stylists = ["Stylist A", "Stylist B", "Stylist C", "Stylist D"]; 
                    foreach ($stylists as $stylist_option) {
                        $selected = (isset($appointment['stylist']) && $appointment['stylist'] == $stylist_option) ? 'selected' : '';
                        echo "<option value=\"" . htmlspecialchars($stylist_option) . "\" $selected>" . htmlspecialchars($stylist_option) . "</option>";
                    }
                    ?>
                </select>
            </div> -->
            
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" name="update_appointment" class="btn btn-submit-edit">Update Appointment</button>
                <a href="index.php" class="btn btn-back">Back to Appointments</a>
            </div>
        </form>
    <?php } ?>
</div>

<?php include "footer.php"; ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJW4QH8K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script src="js/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script>
    // Define ALL service options (COMBINED from ladiesServices and gentsServices)
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

    // New function to populate the service dropdown with ALL services
    function populateAllServices(serviceSelectElementId, currentService = '') {
        const serviceSelect = document.getElementById(serviceSelectElementId);
        serviceSelect.innerHTML = '<option value="">Select Service</option>'; // Clear and add default option

        // Combine both ladies and gents services
        const allServices = [...ladiesServices, ...gentsServices];

        allServices.forEach(group => {
            const optgroup = document.createElement("optgroup");
            optgroup.label = group.label;

            group.options.forEach(service => {
                const option = document.createElement("option");
                option.value = service;
                option.textContent = service;
                if (service === currentService) {
                    option.selected = true; // Pre-select the current service
                }
                optgroup.appendChild(option);
            });
            serviceSelect.appendChild(optgroup);
        });
        serviceSelect.disabled = false; // Ensure it's always enabled
    }

    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "dd-mm-yy", // Ensure this matches your existing format
            minDate: 0 // Prevents selecting past dates
        });

        // Get the current service from PHP for pre-selection
        const currentService = "<?php echo htmlspecialchars($appointment['service']); ?>";

        // Call the function to populate the service dropdown on page load
        populateAllServices('serviceSelect', currentService);
    });

    // Your existing validation functions (LEAVE THESE AS IS)
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
        document.getElementById('nameErr').innerHTML = ""; // This ID 'cname' and 'nameErr' are not present in this file,
        document.getElementById('genderErr').innerHTML = ""; // but are likely from your main booking page.
        document.getElementById('phoneErr').innerHTML = ""; // If these elements exist, they will be updated.
        document.getElementById('serviceErr').innerHTML = "";

        // Validate fields
        // Note: 'cname' and 'phone' inputs are not in this 'edit.php' form,
        // so their validation here won't directly apply unless you add them.
        // Assuming your 'name' and 'phone' fields are handled on the original booking.php,
        // and only the fields present in this edit.php are validated upon update.
        // If 'name' and 'phone' are expected to be editable, you need to add them to the form.

        // var nameElement = document.getElementById('cname');
        // var name = nameElement ? nameElement.value : '';
        // if (!name.trim()) {
        //     document.getElementById('nameErr').innerHTML = "Please Enter Name";
        //     if (nameElement) nameElement.focus();
        //     return false;
        // }

        var genderElement = document.querySelector('select[name="gender"]'); // Target by name as 'gender' ID isn't used
        var gender = genderElement ? genderElement.value : '';

        if (!gender.trim()) {
            document.getElementById('genderErr').innerHTML = "Please Select Gender";
            if (genderElement) genderElement.focus();
            return false;
        }

        // var phoneElement = document.getElementById('phone');
        // var phone = phoneElement ? phoneElement.value : '';
        // if (!phone.trim()) {
        //     document.getElementById('phoneErr').innerHTML = "Please Enter Phone Number";
        //     if (phoneElement) phoneElement.focus();
        //     return false;
        // }
        // if (isNaN(phone)) {
        //     document.getElementById('phoneErr').innerHTML = "Phone No. should be Numeric";
        //     if (phoneElement) phoneElement.focus();
        //     return false;
        // }


        var serviceElement = document.getElementById('serviceSelect');
        var service = serviceElement ? serviceElement.value : '';

        if (!service.trim()) {
            document.getElementById('serviceErr').innerHTML = "Kindly Select Atleast a Service";
            if (serviceElement) serviceElement.focus();
            return false;
        }
        
        // This part of validateFrme() looks like it's designed for an AJAX submission.
        // However, the form is set to method="POST" and action="edit.php",
        // meaning it will do a full page reload on submit.
        // The PHP update logic at the top will handle the submission.
        // If you intend to use AJAX here, you would need to prevent the default form submission:
        // e.g., using `$(form).submit(function(e) { e.preventDefault(); ... });`
        // For now, I'm assuming the PHP handles the POST submission.
        
        // Removed AJAX call from here as PHP handles full page POST
        // return true to allow the form to submit naturally
        return true; 
    }

    // Your existing promptLoginForBooking function
    function promptLoginForBooking() {
        window.location.href = 'login.php'; // Redirect to your login page
    }
</script>

</body>
</html>
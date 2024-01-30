<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head> -->

<?php 
    $title = 'Home';
    $style_path = '../../public/css/style.css';
    require '../partials/header.php';

    // set_page_title('Appointments');

?>

<body>
    <section class="sub-header">
        
        <nav>
            <a href="index.html" class="logo"><img src="../../public/images/dental logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa-regular fa-circle-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="../../src/views/appointments/Appointments.php"> APPOINTMENTS</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
                
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <!-- <h1>About Us</h1> -->
    </section>

    <section class="about-sec">
        <h2>About Us</h2>
        <div class="about-row">
            <div class="about-col">
                <h3>Who We Are</h3>
                <p>We are a dental clinic which has been running since the year 2010. <br>We are here to give you the best dental service and make the world a smiling place. Also we are commited to give you the best service you can possibly ask for.</p>

            </div>
            <div class="about-col">
                <h3>What We Do</h3>
                <p>Reigns Dental clinic was founded to give you the best dental services. <br>We are able to achieve this through our qualified dentists and staff.</p>

            </div>
            <div class="about-col">
                <h3>How We Do It</h3>
                <p>We give our patients the best services through our very committed dentist as we prioritise our patients' health first.</p>
            </div>
        </div>

    </section>


    <!-- Footer -->

    <section class="foot">
        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->
        <div class="foot-row">
            <div class="foot-col">
                <h3>Business Hours.</h3>
                <ul>
                    <ol>Mon 7:00am - 7:00pm</ol>
                    <ol>Tue 7:00am - 7:00pm</ol>
                    <ol>Wed 7:00am - 7:00pm</ol>
                    <ol>Thur 7:00am - 7:00pm</ol>
                    <ol>Fri 7:00am - 7:00pm</ol>
                    <ol>Sat 7:00am - 7:00pm</ol>
                    <ol>Sun 8:30am - 5:00pm</ol>
                </ul>
            </div>
            <div class="foot-col">
                <h3>Services</h3>
                <ul>
                    <ol>Teeth Braces.</ol>
                    <ol>Dental Implants.</ol>
                    <ol>Teeth Whitening.</ol>
                    <ol>Teeth Replacement</ol>
                    <ol>Gum Treatment</ol>
                    <ol>Paediatric Dentistry</ol>
                    <ol>Root Canal Treatment</ol>
                </ul>
            </div>
            <div class="foot-col">
                <h3 class="foot-head">Contact Us</h3>
                <a href="mailto:reignsdentalclinic@gmail.com" class="email">Email Us</a><br><br>
                <a href="../../src/views/appointments/Appointments.php" class="this-btn">Book Appointment</a>
            </div>
           
        </div>
        <hr>
        <p>Reigns Dental Clinic ©2023 All Rights Reserved | By Antony Ochieng</p>
    </section>








    <!-- ---JavaScript for Toggle Menu--- -->  
<script>
    var navLinks = document.getElementById("navLinks");
    
    function showMenu(){
        navLinks.style.right = "0"
    }
    
    function hideMenu(){
        navLinks.style.right = "-200px";
    }
</script>
    
</body>
</html>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head> -->

<?php 
   
    $title = 'Blog';
    $style_path = '../../public/css/style.css';
    require '../partials/header.php';


    // set_page_title('Appointments');

?>

<body>
    <section class="sub-header">
        
        <nav>
            <a href="home.php" class="logo"><img src="../../public/images/dental logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa-regular fa-circle-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="../views/appointments/Appointments.php">APPOINTMENTS</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
                
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <!-- <h1>About Us</h1> -->
    </section>

    <section class="blog-sec">
        <h2>Our Blog</h2>
        <h3>Latest Articles</h3>
        <p>Our Reigns dental blog shares the latest oral health tips, trends and advice to improve you and your family’s overall health.</p>
        <div class="blog-row">
            <div class="about-col">
                <img src="../../public/images/tooth-enamel-erosion-400x250.jpg" alt="enamel-erosion">
                <h3>Understanding Tooth Erosion: Causes, Symptoms, and Treatment Options</h3>
                <p>Get a chance to read through and Understand Tooth Erosion: Causes, Symptoms, and Treatment Options</p>

            </div>
            <div class="blog-col">
                <img src="../../public/images/dental-trauma-400x250.jpg" alt="">
                <h3>Understanding Dental Trauma: Causes, Symptoms, and Effective Treatment Approaches
                </h3>
                <p>Read through and get to understand Dental Trauma: Causes, Symptoms, and Effective Treatment Approaches</p>

            </div>
            <div class="blog-col">
                <img src="../../public/images/ezgif.com-webp-to-png-2-1-400x250.jpg" alt="">
                <h3>Malocclusion Demystified: Types, Causes, and Effective Treatment Approaches</h3>
                <p>Read through and understand more about Malocclusion Demystified: Types, Causes, and Effective Treatment Approaches</p>
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
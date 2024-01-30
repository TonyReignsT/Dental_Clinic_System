<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reigns Dental Clinic System</title>
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


    <section class="header">
        <nav>
            <a href="home.php" class="logo"><img src="../../public/images/dental logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa-regular fa-circle-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="../../src/views/appointments/Appointments.php">APPOINTMENTS</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
                
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Reigns Dental Clinic Management System.</h1>
            <p>Welcome to Reigns Dental Clinic. The best dental clinic to give you the best dental service..</p>
                  <a href="appointments/Appointments.php" class="hero-btn">Book Appointment</a>
        </div>
    </section>

    <!--Treatments-->

    <section class="treatment">
        <h1>Treatments We Offer</h1>
        <p>Here are some of the treatments our clinic offers.</p>
        <div class="row">
            <div class="treatment-col">
                <h3>General Dentistry.</h3>
                <ul>
                    <ol>Pediatric Dental Care.</ol>
                    <ol>Dental Cleaning.</ol>
                    <ol>Tooth Extraction.</ol>
                    <ol>Gum Care.</ol>
                </ul>
            </div>
            <div class="treatment-col">
                <h3>Cosmetic Procedures.</h3>
                <ul>
                    <ol>Teeth Braces.</ol>
                    <ol>Dental Implants.</ol>
                    <ol>Teeth Whitening.</ol>
                    <ol>Crown.</ol>
                </ul>
            </div>
            <div class="treatment-col">
                <h3>Restorative Procedures.</h3>
                <ul>
                    <ol>Teeth Replacement.</ol>
                    <ol>Dental Fillings.</ol>
                    <ol>Root Canal Therapy.</ol>
                    <ol>Wisdom Teeth Removal.</ol>
                </ul>
            </div>
            <!-- <div class="treatment-col">
                <h3>Braces.</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat aperiam delectus 
                    veniam deleniti hic eius autem est. Pariatur ea, omnis nesciunt, 
                    architecto sint quasi consectetur aspernatur, maxime error atque culpa.</p>
            </div> -->
        </div>
    </section>

    <!-- Other Services -->
    <section class="services">
        <h1>Other Services Offered.</h1>
        <p>Other services which you may also need are stated below..</p>
        <div class="d-flex flex-row mb-3">
            <div class="services-col">
                <img src="../../public/images/braces.jpg" alt="braces">
                <div class="content">
                    <h3>BRACES <br></h3>      
                </div>

            </div>
            <div class="services-col">
                <img src="../../public/images/braces.jpg" alt="braces">
                <div class="content">
                    <h3>DENTAL CAPS</h3>
                </div>
            </div>
            <div class="services-col">
                <img src="../../public/images/fillings.jpg" alt="braces">
                <div class="content">
                    <h3>FILLINGS</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities -->

    <section class="facilities">
        <h1>Our Facilities.</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        
        <div class="row">
            <div class="facilities-col">
                <img src="../../public/images/facility1.jpg">
                <h3>World Class Operating Room.</h3>
                <p>Our Clinic has world class operating rooms just to cater for the patient care to ensure they get quality service from our qualified dentists.</p>
            </div>
            <div class="facilities-col">
                <img src="../../public/images/facility2.jpg">
                <h3>Comfortable waiting Room.</h3>
                <p>The clinic also have really comfortable waiting room for our patients to relax as they wait to be serviced.</p>
            </div>
            <div class="facilities-col">
                <img src="../../public/images/facility3.jpg">
                <h3>Best Checkup Room.</h3>
                <p>We have the best checkup rooms just for you. The rooms has latest dental machines and tools for patients checkups.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->

    <section class="testimonials">
        <h1>What our Patients Say.</h1>
        <p>Here are some of the comments we have received from our patients.</p>

            <div class="row">
                <div class="testimonials-col">
                    <img src="../../public/images/man2.jpg">
                    <div>
                        <p>Really nice staff and best clinic i've ever went to.</p>
                            <h3>Ian Odhiambo</h3>
                            <!-- <i class="fa fa-star"></i>-->
                    </div>
                </div>
                <div class="testimonials-col">
                    <img src="../../public/images/woman2.jpg">
                    <div>
                        <p>Literaly the best dental clinic in town.</p>
                            <h3>Katnese Everdean.</h3>
                    </div>
                </div>
                <div class="testimonials-col">
                    <img src="../../public/images/petite1.jpg">
                    <div>
                        <p>Really affordable services and quality is just exceptional.</p>
                            <h3>Nathalie Emmanuel.</h3>
                    </div>
                </div>
            </div>
    </section>

    <!-- Call To Action -->

    <section class="cta">
        <h1>Reach us from wherever you are.</h1>
        <a href="contact.php" class="hero-btn">Contact Us.</a>
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
<!DOCTYPE html>
<html lang="en">

<?php

$title = 'Appointments';
$style_path = '../../../public/css/style.css';
require '../../partials/header.php';
include(__DIR__ . '../../../../db_connection/db.php');

// set_page_title('Appointments');

?>


<body>
  <section class="sub-header">
    <nav>
      <a href="../home.php" class="logo">
        <!-- <img src="/Assests/images/dental logo.png" -->
        <img src="../../../public/images/dental logo.png" /></a>
      <div class="nav-links" id="navLinks">
        <i class="fa-regular fa-circle-xmark" onclick="hideMenu()"></i>
        <ul>
          <!-- <li><a href="index.html">HOME</a></li> -->
          <li><a href="../home.php">HOME</a></li>
          <li><a href="#">APPOINTMENTS</a></li>
          <li><a href="../about.php">ABOUT</a></li>
          <li><a href="../blog.php">BLOG</a></li>
          <li><a href="contact.php">CONTACT</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <!-- <h1>Appointment</h1> -->
  </section>

  <!-- Appointment Form -->

  <section class="form">
    <div class="form-back">
      <h2>Transform Your Smile Now</h2>
      <p>
        Book your appointment today and take the first step towards a
        healthier, brighter smile with our expert dental care.
      </p>

      <form action="../../../db_connection/appointment.php" method="post">
        <label for="fname">Full Name:</label><br />
        <input type="text" name="fname" required /><br />
        <label for="email">Email:</label><br />
        <input type="email" name="email" required /><br />
        <label for="phone">Phone Number:</label><br />
        <input type="tel" name="tel" required /><br /><br />

        <p>Select Service You Want;</p>

        <?php $result = $conn->query("SELECT * FROM services"); ?>

        <?php if ($result->num_rows > 0) :
          while ($row = $result->fetch_assoc()) { ?>
            <input id="<?= $row['service_id'] ?>" type="checkbox" name="services[]" value="<?= $row['service_id'] ?>" />
            <label for="<?= $row['service_id'] ?>"><?= $row['service_name'] ?></label><br />
        <?php }
        endif; ?>

        
        <p>Choose Appointment Date</p>
        <input type="datetime-local" name="date" required /><br /><br />
        <input type="submit" value="Schedule Appointment" class="app_btn" />
      </form>
    </div>
  </section>

  <!-- Footer -->

  <section class="foot">
    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->
    <div class="foot-row">
      <div class="foot-col">
        <h3>Business Hours.</h3>
        <ul>
          <ol>
            Mon 7:00am - 7:00pm
          </ol>
          <ol>
            Tue 7:00am - 7:00pm
          </ol>
          <ol>
            Wed 7:00am - 7:00pm
          </ol>
          <ol>
            Thur 7:00am - 7:00pm
          </ol>
          <ol>
            Fri 7:00am - 7:00pm
          </ol>
          <ol>
            Sat 7:00am - 7:00pm
          </ol>
          <ol>
            Sun 8:30am - 5:00pm
          </ol>
        </ul>
      </div>
      <div class="foot-col">
        <h3>Services</h3>
        <ul>
          <ol>
            Teeth Braces.
          </ol>
          <ol>
            Dental Implants.
          </ol>
          <ol>
            Teeth Whitening.
          </ol>
          <ol>
            Teeth Replacement
          </ol>
          <ol>
            Gum Treatment
          </ol>
          <ol>
            Paediatric Dentistry
          </ol>
          <ol>
            Root Canal Treatment
          </ol>
        </ul>
      </div>
      <div class="foot-col">
        <h3 class="foot-head">Contact Us</h3>
        <a href="mailto:reignsdentalclinic@gmail.com" class="email">Email Us</a>
      </div>
    </div>
    <hr />
    <p>Reigns Dental Clinic ©2023 All Rights Reserved | By Antony Ochieng</p>
  </section>

  <!-- ---JavaScript for Toggle Menu--- -->
  <script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
      navLinks.style.right = "0";
    }

    function hideMenu() {
      navLinks.style.right = "-200px";
    }
  </script>
</body>

</html>
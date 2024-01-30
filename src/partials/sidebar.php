 <!-- =============== Navigation ================ -->
 <?php
    $page_name = $page_name ?? '';

    function isPageActive($page_name, $current_page)
    {
        // $className = $page_name === $current_page ? 'nav-active' : '';
        $className = $page_name === $current_page ? '' : '';
        echo $className;
    }
    ?>
    <link rel="stylesheet" href="../../../public/css/dash2.css">

 <div class="">
     <div class="navigation">
         <ul>
             <li>
                 <a href="#">
                     <!-- <span class="icon"> -->
                     <!-- <img src="../../public/images/dental logo.png" alt=""> -->
                     <!-- <ion-icon name="logo-apple"></ion-icon> -->
                     <!-- </span> -->
                     <span class="title">REIGNS DENTAL CLINIC </span>
                 </a>
             </li>

             <li>
                 <a href="../../views/pages/dash2.php">
                     <!-- <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span> -->
                     <span class="title <?= isPageActive($page_name, 'dash2.php') ?>">Dashboard</span>
                 </a>
             </li>

             <li>
                 <a href="../../views/pages/patients.php">
                     <!-- <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span> -->
                     <span class="title">Patients</span>
                 </a>
             </li>

             <li>
                 <a href="../../views/pages/users.php">
                     <!-- <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span> -->
                     <span class="title">Users</span>
                 </a>
             </li>

             <li>
                 <a href="../../views/pages/appoint_dash.php">
                     <!-- <span class="icon">
                            <ion-icon name="appointment"></ion-icon>
                        </span> -->
                     <span class="title <?= isPageActive($page_name, 'appoint_dash.php') ?>">Appointments</span>
                 </a>
             </li>

             <li>
                 <a href="../../views/pages/services.php">
                     <!-- <span class="icon">
                            <ion-icon name="service-outline"></ion-icon>
                        </span> -->
                     <span class="title">Services</span>
                 </a>
             </li>

             <li>
                 <a href="payments.php">
                     <!-- <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon> 
                        </span> -->
                     <span class="title">Payments</span>
                 </a>
             </li>

             <!-- <li> -->
                 <!-- <a href="reports.php"> -->
                     <!-- <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon> 
                        </span> -->
                     <!-- <span class="title">Reports</span>
                 </a>
             </li> -->

             <li>
                 <a href="../views/auth/login.php">
                     <!-- <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span> -->
                     <span class="title">Sign Out</span>
                 </a>
             </li>
         </ul>
     </div>
 </div>
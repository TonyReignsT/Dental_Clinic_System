<?php
$title = 'Administrator';
include(__DIR__ . '../../../../db_connection/db.php');
//Total Patients count
$stmt = $conn->prepare("SELECT COUNT(pat_id) AS pat_count FROM patients");
$execute_result = $stmt->execute();
$stmt->bind_result($pat_count);

$fetch_result = $stmt->fetch();
$stmt->close();

//Total Services Count
$stmt = $conn->prepare("SELECT COUNT(service_id) AS service_count FROM services");
$execute_result = $stmt->execute();
$stmt->bind_result($service_count);

$fetch_result = $stmt->fetch();
$stmt->close();

//Total Appointments Count
$stmt = $conn->prepare("SELECT COUNT(app_id) AS app_count FROM appointments");
$execute_result = $stmt->execute();
$stmt->bind_result($app_count);

$fetch_result = $stmt->fetch();
$stmt->close();

//Total Revenue Count
$stmt = $conn->prepare("SELECT COUNT(service_fee) AS revenue_count FROM services");
$execute_result = $stmt->execute();
$stmt->bind_result($app_count);

$fetch_result = $stmt->fetch();
$stmt->close();


include_once '../../partials/header.php';



?>
<!-- =============== Navigation ================ -->
<div class="">

    <?php
    include_once '../../partials/sidebar.php';
    ?>

    <!-- ========================= Main ==================== -->

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <!-- <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div> -->

            <div class="user">
                <!-- <img src="assets/imgs/customer01.jpg" alt=""> -->
                <a href="#">Admin</a>
            </div>
        </div>

        <!-- ======================= Cards ================== -->

        <div class="cardBox">
            <a href="patients.php" style="text-decoration:none">
                <div class="card">
                    <div>
                        <div class="numbers"><?= $pat_count ?></div>
                        <div class="cardName">Total Patients</div>
                    </div>

                    <!-- <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div> -->
                </div>
            </a>

            <a href="services.php" style="text-decoration:none">
                <div class="card">
                    <div>
                        <div class="numbers"><?= $service_count ?> </div>
                        <div class="cardName">Services</div>
                    </div>

                    <!-- <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div> -->
                </div>
            </a>

            <a href="appoint_dash.php" style="text-decoration:none">
                <div class="card">
                    <div>
                        <div class="numbers"><?= $app_count ?> </div>
                        <div class="cardName">Appointments</div>
                    </div>

                    <!-- <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div> -->
                </div>
            </a>

            <a href="payments.php" style="text-decoration: none;">
            <div class="card">
                <div>
                    <div class="numbers">Ksh. 70,842</div>
                    <div class="cardName">Total Revenue</div>
                </div>

                <!-- <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div> -->
            </div>
            </a>
            
        </div>

        <!-- ================ Order Details List ================= -->

        <!-- <div class="details">
            <div class="recent-bookings">
                <div class="cardHeader">
                    <h2>Recent Bookings</h2>
                    <a href="#" class="btn">View All</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <td>Service</td>
                            <td>Price</td>
                            <td>Appointment</td>
                            <td>Status</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Consultation</td>
                            <td>Ksh.1000</td>
                            <td>Booked</td>
                            <td><span class="status delivered">Delivered</span></td>
                        </tr>

                        <tr>
                            <td>Full Mouth Cleaning</td>
                            <td>Ksh. 5000</td>
                            <td>Due</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>

                        <tr>
                            <td>Dental Braces</td>
                            <td>Ksh. 100,000</td>
                            <td>Paid</td>
                            <td><span class="status return">Return</span></td>
                        </tr>

                        <tr>
                            <td>Root Canal</td>
                            <td>Ksh. 12,000</td>
                            <td>Due</td>
                            <td><span class="status inProgress">In Progress</span></td>
                        </tr>

                        <tr>
                            <td>Teeth Replacement</td>
                            <td>Ksh. 20,000</td>
                            <td>Paid</td>
                            <td><span class="status delivered">Delivered</span></td>
                        </tr>

                        <tr>
                            <td>Teeth Whitening</td>
                            <td>Ksh. 5,000</td>
                            <td>Due</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>

                        <tr>
                            <td>Pediatric Dentistry</td>
                            <td>Ksh. 8,000</td>
                            <td>Paid</td>
                            <td><span class="status return">Return</span></td>
                        </tr>

                        <tr>
                            <td>Dental Implants</td>
                            <td>Ksh. 60,000</td>
                            <td>Due</td>
                            <td><span class="status inProgress">In Progress</span></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

            <!-- ================= Recent Patients ================ -->

            <!-- <div class="dental-table">
                <div class="cardHeader">
                    <h2>Recent Patients</h2>
                </div>

                <table>
                    <tr>
                        <td width="60px"> -->
                            <!-- <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div> -->
                        <!-- </td>
                        <td>
                            <h4>Onana Sishikindukimoto</h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px"> -->
                            <!-- <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div> -->
                        <!-- </td>
                        <td>
                            <h4>Tony Reigns</h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px"> -->
                            <!-- <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div> -->
                        <!-- </td>
                        <td>
                            <h4>Nathalie Petite</h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px"> -->
                            <!-- <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div> -->
                        <!-- </td>
                        <td>
                            <h4>George Bakaz</h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px"> -->
                            <!-- <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Baki Hanma</h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px"> -->
                            <!-- <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div> -->
                        <!-- </td>
                        <td>
                            <h4>Yujiro Hanma</h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px"> -->
                            <!-- <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div> -->
                        <!-- </td>
                        <td>
                            <h4>Mitoma Chumamoto</h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <!<div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div> -->
                        <!-- </td>
                        <td>
                            <h4>Caleb Maplata</h4>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div> --> 

<!-- =========== Scripts =========  -->
<script src="/dash2.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php
include_once '../../partials/footer.php';
?>
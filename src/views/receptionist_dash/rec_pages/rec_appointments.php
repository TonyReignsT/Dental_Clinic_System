<?php
// $columns_arr = ['app_id', 'pat_id', 'service_id', 'app_date', 'payment_status', 'app_status'];
// $column_head = ['Appointment Id', 'Name', 'Service', 'Date', 'Payment Status', 'Appointment_Status'];
$title = 'Appointments';
?>

<?php
include_once '../../../partials/header.php';

$page_name = 'appoint_dash.php';

?>
<!-- =============== Navigation ================ -->
<div class="">
    <?php
    include_once '../../../partials/recep_sidebar.php';
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
                <a href="#">Receptionist</a>
            </div>
        </div>
        <div class="d-flex flex-column px-2">


            <?php
            // Retrieve data from the database
            //$result = $conn->query("SELECT * FROM patients");
            ?>

            <!-- <div class="cardHeader ps-4">
                <h2>Appointment List</h2>
            </div>

            <div class="w-full d-flex justify-content-center mt-5">
                <div class="card shadow-sm w-75 p-3">
                    <table border='1' class='table table-bordered'>
                        <thead>
                            <tr> -->
            <?php //foreach ($column_head as $head) : 
            ?>
            <!-- <th scope="col">
                                        <?= $head ?>
                                    </th> -->
            <?php //endforeach; 
            ?>
            <!-- </tr>
                        </thead>
                        <tbody> -->
            <?php //if ($result->num_rows > 0) : 
            ?>
            <?php //while ($row = $result->fetch_assoc()) { 
            ?>
            <!-- <tr> -->
            <?php //foreach ($columns_arr as $value) : 
            ?>
            <!-- <td>
                                                <?= $row[$value] ?>
                                            </td> -->
            <?php //endforeach; 
            ?>
            <!-- </tr> -->
            <?php //} 
            ?>
            <?php //endif 
            ?>
            <!-- </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div> -->

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "Dental_Clinic";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $columns_arr = ['app_id', 'patient_name', 'service_name', 'app_date', 'payment_status', 'app_status'];
            $column_head = ['Appointment Id', 'Name', 'Service', 'Date', 'Payment Status', 'Appointment_Status'];

            function convertPaymentStatus($pay_status)
            {
                // $new_status = match ($pay_status) {
                //     0 => 'Pending',
                //     1 => 'Paid',
                //     2 => 'Cancelled',
                //     default => 'Pending',
                // };

                $new_status = match ($pay_status) {
                    0 => ['pending', 'Pending'],
                    1 => ['paid', 'Paid'],
                    2 => ['cancelled', 'Cancelled'],
                    default => ['pending', 'Pending']
                };

                return "<span class='status $new_status[0]'>$new_status[1]</span>";
            }

            function convertappstatus($app_status)
            {
                $new_status = match ($app_status) {
                    0 => ['pending', 'Waiting'],
                    1 => ['inProgress', 'In progress'],
                    2 => ['status delivered', 'Serviced'],
                    3 => ['return', 'Cancelled',],
                    default => ['pending', 'Waiting']
                };

                return "<span class='status $new_status[0]'>$new_status[1]</span>";
            }

            // Your SQL query with joins
            $query = "
    SELECT appointments.app_id, patients.patient_name AS patient_name, services.service_name, appointments.app_date, appointments.payment_status, appointments.app_status
    FROM appointments
    LEFT JOIN patients ON appointments.pat_id = patients.pat_id
    LEFT JOIN services ON appointments.service_id = services.service_id;
";

            $result = $connection->query($query);
            ?>

            <!-- HTML part -->
            <div class="cardHeader ps-4">
                <h2>Appointment List</h2>
            </div>

            <div class="d-flex justify-content-center mt-5">
                <div class="card shadow-sm w-75 p-3">
                    <table id="rec_appoint-table" border='1' class='table table-bordered'>
                        <thead>
                            <tr>
                                <?php foreach ($column_head as $head) : ?>
                                    <th scope="col">
                                        <?= $head ?>
                                    </th>
                                <?php endforeach; ?>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) : ?>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <?php foreach ($columns_arr as $value) : ?>
                                            <td>
                                                <?php if ($value === 'payment_status') : ?>
                                                    <?= convertPaymentStatus($row[$value]) ?>
                                                <?php elseif ($value === 'app_status') : ?>
                                                    <?= convertappstatus($row[$value]) ?>
                                                <?php else : ?>
                                                    <?= $row[$value] ?>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; ?>
                                        <td>
                                            <?php if ($row['payment_status'] == 0) : ?>
                                                <a href="http://" class="btn btn-sm btn-success">Pay</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php
            // Close the connection
            $connection->close();
            ?>

            <?php
            include_once '../../../partials/footer.php';
            ?>

<!-- Printing -->
<script>
            $(document).ready(function() {

                $('#rec_appoint-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [

                        {
                            extend: 'colvis',
                            exportOptions: {
                                columns: [0, 1,2,3,4,5]
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 1,2,3,4,5]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1,2,3,4,5]
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0, 1,2,3,4,5]
                            }
                        },

                    ]
                });
            });
        </script>


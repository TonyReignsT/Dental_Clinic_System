<?php
$title = 'Services';
include_once '../../../partials/header.php';
$columns_arr = ['service_name', 'service_fee'];
$column_head = ['Service Name', 'Service Fee'];
include(__DIR__ . '../../../../../db_connection/db.php');

?>
<!-- =============== Navigation ================ -->
<div class="">
    <?php
    include_once '../../../partials/recep_sidebar.php';
    ?>

    <!-- ========================= Main ==================== -->

    <div class="main pb-5">
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

        <!-- Service form  -->

        <div class="w-full d-flex flex-column">
            <!-- <div class="ms-5">
                <h2>Service Action</h2><br>
            </div> -->

            <!-- Retrieving from the database -->
            <!-- <div class="d-flex justify-content-center flex-column align-items-center">

                <div class="w-75 shadow-sm card p-5">
                    <form action="../../../db_connection/service_db.php" method="post">

                        <div class="mb-3">
                            <label for="service_name" class="form-label">Service Name</label>
                            <input type="text" name="service_name" class="form-control" id="service_name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="service_fee" class="form-label">Service Fee</label>
                            <input id="service_fee" type="text" name="service_fee" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary">

                    </form>
                </div>
            </div> -->

            <div class="ms-5 mt-5">
                <h2>Service List</h2><br>
            </div>

            <!-- Querying Db -->
            <div class="d-flex justify-content-center flex-column align-items-center">

                <?php $result = $conn->query("SELECT * FROM services"); ?>

                <div class="w-75 shadow-sm card p-5">

                    <table id="service-table" border='1' class='table table-bordered'>
                        <thead>
                            <tr>
                                <?php foreach ($column_head as $head) : ?>
                                    <th scope="col">
                                        <?= $head ?>
                                    </th>
                                <?php endforeach; ?>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) : ?>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <?php foreach ($columns_arr as $value) : ?>
                                            <td>
                                                <?= $row[$value] ?>
                                            </td>
                                        <?php endforeach; ?>
                                        
                                    </tr>
                                <?php } ?>
                            <?php endif ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <?php
        include_once '../../../partials/footer.php';
        ?>


<!-- Printing -->
<script>
            $(document).ready(function() {

                $('#service-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [

                        {
                            extend: 'colvis',
                            exportOptions: {
                                columns: [0, 1]
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 1]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1]
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0, 1]
                            }
                        },

                    ]
                });
            });
        </script>


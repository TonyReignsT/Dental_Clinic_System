<?php
$title = 'Patients';
include_once '../../partials/header.php';
// $column_head = ['Full Name', 'Email', 'Phone', 'Date'];
// $columns_arr = ['full_name', 'patient_email', 'patient_phone', 'date'];
$columns_arr = ['pat_id', 'patient_name', 'patient_email', 'patient_phone'];
$column_head = ['Id', 'Name', 'Email', 'Phone'];


?>
<!-- =============== Navigation ================ -->
<div class="">
    <?php
    include_once '../../partials/sidebar.php';
    ?>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


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

            <!-- Inside the topbar div -->
            <!-- <div class="search">
                <label>
                    <input type="text" id="searchInput" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div> -->


            <div class="user">
                <!-- <img src="assets/imgs/customer01.jpg" alt=""> -->
                <a href="#">Admin</a>
            </div>
        </div>

        <!-- Retrieving Data from the DB  -->


        <!-- Querying Db -->
        <div class="d-flex justify-content-center flex-column align-items-center m-5 ">
            <h2>Patients Lists</h2>
            <?php $result = $conn->query("SELECT * FROM patients"); ?>

            <div class="w-75 shadow-sm card p-3 m-2">

                <table id="patients-table" border='1' class='table table-bordered'>
                    <thead>
                        <tr>
                            <?php foreach ($column_head as $head) : ?>
                                <th scope="col">
                                    <?= $head ?>
                                </th>
                            <?php endforeach; ?>
                            <th>Actions</th>
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
                                    <td><a href="../pages/pat_actions_btns/edit_p.php?id=<?= $row['pat_id'] ?>" class="btn btn-sm btn-primary">Edit</a> <a href="../pages/pat_actions_btns/delete_p.php?id=<?= $row['pat_id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                </tr>
                            <?php } ?>
                        <?php endif ?>
                    </tbody>
                </table>

            </div>
        </div>


        <!-- Include jQuery -->
        <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->



        <script>
            $(document).ready(function() {

                $('#patients-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [

                        {
                            extend: 'colvis',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },

                    ]
                });
            });
        </script>



        <?php
        include_once '../../partials/footer.php';
        ?>
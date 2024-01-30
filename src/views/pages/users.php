<?php
$columns_arr = ['user_id', 'user_name', 'user_email', 'user_phone', /*'user_password',*/ 'user_role'];
$column_head = ['Id', 'Name', 'Email', 'Phone', /*'Password',*/ 'Role'];

$title = 'Users';
?>

<?php
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

        <div class="d-flex flex-column px-2">

 <!-- Service form  -->

 <div class="w-full d-flex flex-column">
            <div class="ms-5">
                <h2>User Action</h2><br>
            </div>

            <!-- Retrieving from the database -->
            <div class="d-flex justify-content-center flex-column align-items-center">

                <div class="w-75 shadow-sm card p-5">
                    <form action="../../../db_connection/user_db.php" method="post">

                        <div class="mb-3">
                            <label for="user_name" class="form-label">Name</label>
                            <input type="text" name="user_name" class="form-control" id="user_name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input id="user_fee" type="text" name="user_email" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="user_phone" class="form-label">Phone</label>
                            <input type="text" name="user_phone" class="form-control" id="user_phone" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="user_role" class="form-label">Role</label>
                            <input type="text" name="user_role" class="form-control" id="user_role" placeholder="">
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary">

                    </form>
                </div>
            </div>

           <?php

            // Retrieve data from the database
            $result = $conn->query("SELECT * FROM users");


            ?>

            <div class="cardHeader ps-4">
                <h2>User List</h2>
            </div>
            <div class="w-full d-flex justify-content-center mt-5">
                <div class="card shadow-sm w-75 p-3">
                    <table id="user-table" border='1' class='table table-bordered'>
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
                                        <td><a href="../pages/users_action_btns/edit_u.php?id=<?= $row['user_id'] ?>" class="btn btn-sm btn-primary">Edit</a> <a href="../pages/users_action_btns/delete_u.php?id=<?= $row['user_id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>
                                <?php } ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <?php
            include_once '../../partials/footer.php';
            ?>
            <?php
            // Close the database connection
            $conn->close();
            ?>

            <!-- Print Buttons -->
            <script>
                $(document).ready(function() {

                    $('#user-table').DataTable({
                        dom: 'Bfrtip',
                        buttons: [

                            {
                                extend: 'colvis',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },

                        ]
                    });
                });
            </script>
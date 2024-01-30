<?php
$title = 'Payments';
include_once '../../partials/header.php';
?>

<div class="">
    <?php
    include_once '../../partials/sidebar.php';
    ?>
</div>

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

$columns_arr = ['pay_id', 'app_id', 'pay_status', 'amount'];
$column_head = ['Payment Id', 'Name', 'Status', 'Amount'];

//SQL Query

$query = "
    SELECT payments.pay_id, payments.app_id, payments.pay_status, payments.amount
    FROM payments
    LEFT JOIN appointments ON payments.app_id = appointments.app_id
";
$result = $connection->query($query);

?>

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
            <a href="#">Admin</a>
        </div>
    </div>


    <!-- HTML part -->
    <div class="cardHeader ps-4">
        <h2>Payments</h2>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <div class="card shadow-sm w-75 p-3">
            <table id="payments-table" border='1' class='table table-bordered'>
                <thead>
                    <tr>
                        <?php foreach ($column_head as $head) : ?>
                            <th scope="col">
                                <?= $head ?>
                            </th>
                        <?php endforeach; ?>
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
                            </tr>
                        <?php } ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
// Close the connection
$connection->close();
?>
<?php
include_once '../../partials/footer.php';
?>

<!-- Print Buttons -->

<script>
    $(document).ready(function() {

        $('#payments-table').DataTable({
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
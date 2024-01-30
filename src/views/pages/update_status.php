<?php
    require_once '../../../db_connection/db.php';
?>

<?php

if (isset($_POST['update_app_status'])) {
    $app_id = $_POST['app_id'];
    $new_status = $_POST['update_app_status'];

    // Update appointment status in the database
    $updateQuery = "UPDATE appointments SET app_status = '$new_status' WHERE app_id = $app_id";

    if ($connection->query($updateQuery) === TRUE) {
        echo "Appointment status updated successfully";
    } else {
        echo "Error updating appointment status: " . $connection->error;
    }
}

if (isset($_POST['update_payment_status'])) {
    $app_id = $_POST['app_id'];
    $new_status = $_POST['update_payment_status'];

    // Update payment status in the database
    $updateQuery = "UPDATE appointments SET payment_status = '$new_status' WHERE app_id = $app_id";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Payment status updated successfully";
    } else {
        echo "Error updating payment status: " . $connection->error;
    }
}

// Fetch the updated data
$query = "SELECT * FROM appointments WHERE app_id = $app_id";
$result = $conn->query($query);
$updated_row = $result->fetch_assoc();

// Close the connection
$conn->close();

// Display the updated data in a table
?>

<?php
$columns_arr = ['app_id', 'patient_name', 'service_name', 'app_date', 'payment_status', 'app_status'];
?>

<?php 
    include_once '../../partials/header.php';
?>

<!-- Display the updated data in a table -->
<table border='1' class='table table-bordered'>
    <thead>
        <tr>
            <?php foreach ($columns_arr as $head) : ?>
                <th scope="col"><?= $head ?></th>
            <?php endforeach; ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach ($columns_arr as $value) : ?>
                <td>
                    <?php if ($value === 'payment_status') : ?>
                        <span class="badge <?= convertPaymentStatus($updated_row[$value])[0] ?>">
                            <?= convertPaymentStatus($updated_row[$value])[1] ?>
                        </span>
                    <?php elseif ($value === 'app_status') : ?>
                        <span class="badge <?= convertappstatus($updated_row[$value])[0] ?>">
                            <?= convertappstatus($updated_row[$value])[1] ?>
                        </span>
                    <?php elseif (isset($updated_row[$value])) : ?>
                        <?= $updated_row[$value] ?>
                    <?php endif; ?>
                </td>
            <?php endforeach; ?>
            <td class="text-center">
                <?php if (isset($updated_row['payment_status']) && $updated_row['payment_status'] == 0) : ?>
                    <a href="http://" class="btn btn-sm btn-success">Pay</a>
                <?php endif; ?>
                <!-- Add other buttons if needed -->
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>

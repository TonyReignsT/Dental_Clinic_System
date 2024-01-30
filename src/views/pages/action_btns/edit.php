<?php
$title = 'Service Edit';
include_once '../../../../db_connection/db.php';
// include_once '../../partials/header.php';

// Check if the ID is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $service_id = $_GET['id'];

    // Fetch service details from the database
    $select_query = "SELECT * FROM services WHERE service_id = $service_id";
    $result = $conn->query($select_query);

    // Check if the result has rows
    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
    } else {
        // Handle case where service with the given ID is not found
        echo "Service not found";
        exit();
    }
} else {
    // Handle case where ID is not set or not valid
    echo "Invalid ID";
    exit();
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- HTML form for editing service details -->
<div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">
    <form action="update.php" method="post">
        <!-- Populate form fields with service details -->
        <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>">
        <!-- <div class="mb-3">
        <label for="service_name" class="form-label">Service Name</label>
        <input type="text" name="service_name" class="form-control" id="service_name" value="<?= $service['service_name'] ?>">
    </div> -->

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Service Name</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="service_name" id="service_name" value="<?= $service['service_name'] ?>">
        </div><br>

        <!-- <div class="mb-3">
            <label for="service_fee" class="form-label">Service Fee</label>
            <input type="text" name="service_fee" class="form-control" id="service_fee" value="<?= $service['service_fee'] ?>">
        </div><br> -->

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Service Fee</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="service_fee" id="service_fee" value="<?= $service['service_fee'] ?>">
        </div><br>

        <input type="submit" value="Update" class="btn btn-primary">
        <!-- <button type="button" class="btn btn-primary">Update</button> -->
    </form>
</div>


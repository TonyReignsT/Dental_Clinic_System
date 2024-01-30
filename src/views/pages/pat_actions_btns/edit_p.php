<?php
// edit.php

// Include necessary files and database connection

$title = 'Edit Patient';
include_once '../../../partials/header.php';
include_once '../../../../db_connection/db.php';

// Check if the ID is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $patient_id = $_GET['id'];

    // Fetch patient details from the database
    $select_query = "SELECT * FROM patients WHERE pat_id = $patient_id";
    $result = $conn->query($select_query);

    // Check if the result has rows
    if ($result->num_rows > 0) {
        $patient = $result->fetch_assoc();
    } else {
        // Handle case where patient with the given ID is not found
        echo "Patient not found";
        exit();
    }
} else {
    // Handle case where ID is not set or not valid
    echo "Invalid ID";
    exit();
}

// Include your HTML form for editing patient details
// include_once 'edit_p-form.php';

// Include footer
include_once '../../../partials/footer.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- edit_p-form.php -->
<div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">
    <form action="../pat_actions_btns/update_p.php" method="POST">
        <input type="hidden" name="pat_id" value="<?= $patient['pat_id'] ?>">

        <div class="mb-3">
            <label for="patient_name" class="form-label">Patient Name:</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" value="<?= $patient['patient_name'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="patient_email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="patient_email" name="patient_email" value="<?= $patient['patient_email'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="patient_phone" class="form-label">Phone:</label>
            <input type="tel" class="form-control" id="patient_phone" name="patient_phone" value="<?= $patient['patient_phone'] ?>" required>
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
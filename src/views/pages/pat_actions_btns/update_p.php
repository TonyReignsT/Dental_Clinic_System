<?php
include_once '../../../../db_connection/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $pat_id = $_POST['pat_id'];
    $patient_name = $_POST['patient_name'];
    $patient_email = $_POST['patient_email'];
    $patient_phone = $_POST['patient_phone'];

    // Update service details in the database
    $update_query = "UPDATE patients SET patient_name = '$patient_name', patient_email = '$patient_email' WHERE pat_id = $pat_id";

    if ($conn->query($update_query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect back to the service list page
    header("Location: ../patients.php");
    exit();
} else {
    // Handle case where form is not submitted via POST
    echo "Invalid request";
}
?>

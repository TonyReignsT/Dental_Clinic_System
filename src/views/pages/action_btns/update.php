<?php
include_once '../../../../db_connection/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $service_id = $_POST['service_id'];
    $service_name = $_POST['service_name'];
    $service_fee = $_POST['service_fee'];

    // Update service details in the database
    $update_query = "UPDATE services SET service_name = '$service_name', service_fee = '$service_fee' WHERE service_id = $service_id";

    if ($conn->query($update_query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect back to the service list page
    header("Location: ../services.php");
    exit();
} else {
    // Handle case where form is not submitted via POST
    echo "Invalid request";
}
?>

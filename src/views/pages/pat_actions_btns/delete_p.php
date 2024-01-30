<?php
include_once '../../../../db_connection/db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pat_id = $_GET['id'];

    // Perform deletion
    $delete_query = "DELETE FROM patients WHERE pat_id = $pat_id";
    if ($conn->query($delete_query) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid ID";
}

// Redirect back to the service list page
header("Location: ../patients.php");
exit();
?>

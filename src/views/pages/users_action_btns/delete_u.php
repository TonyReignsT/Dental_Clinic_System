<?php
// delete_user.php

// Include necessary files and database connection
include_once '../../../../db_connection/db.php';

// Check if the ID is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete the user from the database
    $delete_query = "DELETE FROM users WHERE user_id = $user_id";

    if ($conn->query($delete_query) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    // Handle case where ID is not set or not valid
    echo "Invalid ID";
}
// Redirect back to the service list page
header("Location: ../users.php");
exit();

// Include footer
include_once '../../partials/footer.php';
?>

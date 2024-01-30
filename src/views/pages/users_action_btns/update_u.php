<?php
// update_u.php

// Include necessary files and database connection
include_once '../../../../db_connection/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_id'], $_POST['user_name'], $_POST['user_email'], $_POST['user_phone'], $_POST['user_role'])) {
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone'];
        $user_role = $_POST['user_role'];
    } else {
        echo "Invalid request";
    }

    // Update the user information in the database
    $update_query = "UPDATE users SET user_name = '$user_name', user_email = '$user_email', user_phone = '$user_phone', user_role = $user_role WHERE user_id = $user_id";

    if ($conn->query($update_query) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . $conn->error;
    }
    // Redirect back to the User list page
    header("Location: ../../users.php");
    exit();
} else {
    // Handle case where form is not submitted via POST
    echo "Invalid request";
}

// // Include footer
// include_once '../../../partials/footer.php';

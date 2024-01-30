<?php
// edit_user.php

// Include necessary files and database connection
include_once '../../../../db_connection/db.php';

// Check if the ID is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database
    $select_query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = $conn->query($select_query);

    // Check if the result has rows
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        // Handle case where user with the given ID is not found
        echo "User not found";
        exit();
    }
} else {
    // Handle case where ID is not set or not valid
    echo "Invalid ID";
    exit();
}

// Include your HTML form for editing user details
// include_once 'edit_user_form.php';

// Include footer
include_once '../../../partials/footer.php';
?>

<!-- Bootstrap url -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- HTML Form -->

<!-- edit_user_form.php -->

<div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">
    <form action="update_user.php" method="POST">
        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

        <div class="mb-3">
            <label for="user_name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="<?= $user['user_name'] ?>" required>
        </div><br>

        <div class="mb-3">
            <label for="user_name" class="form-label">Email:</label>
            <input type="text" class="form-control" id="user_email" name="user_email" value="<?= $user['user_email'] ?>" required>
        </div><br>

        <div class="mb-3">
            <label for="user_name" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="user_phone" name="user_phone" value="<?= $user['user_phone'] ?>" required>
        </div><br>

        <div class="mb-3">
            <label for="user_name" class="form-label">Role:</label>
            <input type="text" class="form-control" id="user_role" name="user_role" value="<?= $user['user_role'] ?>" required>
        </div><br>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php
//include_once '../../partials/header.php';
include_once '../../partials/sidebar.php';


// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();


?>
<?php
    // Redirect to the login page or any other page you prefer
header("Location: ../auth/login.php");
exit();
?>

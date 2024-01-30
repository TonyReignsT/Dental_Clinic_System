<?php
session_start();

$user_name = $_SESSION['username'];
?>

<h1>
    Hello <?= $user_name ?>, Welcome back!!!!
</h1>
<!-- <link href="../src/views/pages/services.php"> -->
<?php

    // $service_name = $_POST['service_name'];
    // $service_fee = $_POST['service_fee'];
$service_name = isset($_POST['service_name']) ? $_POST['service_name'] : null;
$service_fee = isset($_POST['service_fee']) ? $_POST['service_fee'] : null;

echo print_r($_POST);

    require_once 'db.php';

    session_start();
    
    $stmt = $conn -> prepare("INSERT INTO services(service_name, service_fee) values(?,?)");

    //Bind the parameters

    $stmt -> bind_param("ss",$service_name, $service_fee);

    //Execute Statements

    $stmt -> execute();
    echo "Success...";

    //Close statement and connection

    $stmt -> close();
    $conn -> close();

    header('Location: ../src/views/pages/services.php');

    exit;
    
    
    
    
   
?>
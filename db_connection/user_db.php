<?php
include('db.php');
//require 'send_email.php';

function getUserId($phone, $conn)
{
    if (!empty($phone)) {
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_phone = ? LIMIT 1");

        $stmt->bind_param("s", $phone);

        $execute_result = $stmt->execute();

        $user_id = '';

        if ($execute_result) {
            $stmt->bind_result($user_id);

            $fetch_result = $stmt->fetch();

            $stmt->close();

            if ($fetch_result && !empty($user_id)) {
                return $user_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    return false;
}


$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];
$user_password = '1234';
$user_password = password_hash('$user_password', PASSWORD_DEFAULT);
$user_role = $_POST['user_role'];

// Check if the result of the fetch was okay
// Afterwards, check if the patient id is empty
// It is only empty if there isn't a patient with the give phone number
if (!getUserId($user_phone, $conn)) {


    $stmt = $conn->prepare("INSERT INTO users(user_name,user_email,user_phone,user_role) values(?,?,?,?)");
    //binding parameters

    $stmt->bind_param("ssss", $user_name, $user_email, $user_phone, $user_role);
    //Execute
    $execute_result =  $stmt->execute();

    $stmt->close();

    if ($execute_result) {
        $user_id = getUserId($user_phone, $conn);

        $users = $_POST['users'];

        $user_names = [];

        if (!empty($users)) {

            // echo print_r($users);

            foreach ($users as $user_id) {

                //$new_date = date("Y-m-d H:i:s", strtotime($date));
                //$payment_status = 0;
                //$app_status = 0;

                $stmt = $conn->prepare("INSERT INTO users(user_name, user_email, user_phone, user_role) values(?,?,?,?)");

                //bind
                $stmt->bind_param("ssss", $user_name, $user_email, $user_phone, $user_role);

                $execute_result =  $stmt->execute();

                $stmt->close();

                if ($execute_result) {

                    $stmt = $conn->prepare("SELECT user_name FROM users WHERE user_id = ?");

                    $stmt->bind_param("i", $user_id);

                    $execute_result = $stmt->execute();

                    if ($execute_result) {
                        $stmt->bind_result($user_name);

                        $stmt->close();

                        echo $user_id . "\n";

                        array_push($user_names, $user_name);

                        // unset($service_name);
                    } else {
                        echo 'Error while adding!';
                    }
                } else {
                    echo 'Error while adding service';
                }
            }
        }
    }
}

header("Location: ../src/views/pages/users.php");
exit();

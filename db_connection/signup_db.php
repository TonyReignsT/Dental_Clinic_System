<?php
//Database Connection

//$conn = new mysqli('localhost', 'root', 'root', 'dental_clinic');

//check connection

// if ($conn->connect_error) {
//     die('Connection failed : ' . $conn->connect_error);
// }

require_once 'db.php';


session_start();
// rest of your code

$action = $_POST['action'];

if ($action === 'login') {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $stmt = $conn->prepare("select user_email, user_password, user_name, user_phone, user_id from users where user_email = ?");

    //Bind the parameters

    $stmt->bind_param("s", $user_email);

    // Execute the prepared statement
    $execute_result = $stmt->execute();

    if ($execute_result) {
        // We get here if the sql statement was executed without any errors
        $stmt->bind_result($stored_user_email, $stored_user_password, $stored_user_name, $stored_user_phone, $stored_user_id);

        // fetch the values from the db and put them to the bound variables
        $fetch_result = $stmt->fetch();

        if ($fetch_result) {
            // we get here if the fetch was successful

            // now compare the user email that the user entered with the one that
            // we have fetched from the db
            if ($user_email === $stored_user_email) {
                // we get here if the entered and the stored emails match

                // now compare the passwords
                if (password_verify($user_password, $stored_user_password)) {
                    // we get here if the password is correct

                    // redirect the user to the dashboard since the login was successful

                    // Setting a session variable
                    $_SESSION['username'] = $stored_user_name;
                    $_SESSION['phone'] = $stored_user_phone;
                    $_SESSION['email'] = $stored_user_email;
                    $_SESSION['user_id'] = $stored_user_id;

                    echo "TF! WE HERE CAUSE IT WORKED MF!!!";

                    header('Location: ../src/views/pages/dash2.php');
                } else {
                    // we get here if the password is incorrect
                    echo "Invalid email or password";
                }
            } else {
                // we get here if the email entered is incorrect (in short, it's not found in the db)
                echo "Invalid email or password";
            }
        }
    } else {
        echo "failed to fetch the user with the given user email and password";
    }
} else {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_password = $_POST['user_password'];
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_role = $_POST['user_role'];

    $stmt = $conn->prepare("insert into users(user_name, user_email, user_phone, user_password, user_role) values(?, ?, ?, ?, ?)");

    //Bind the parameters

    $stmt->bind_param("sssss", $user_name, $user_email, $user_phone, $user_password, $user_role);

    //Execute statements

    $stmt->execute();

    echo "Success!!";
}

//Close statement and Connection

$stmt->close();
$conn->close();

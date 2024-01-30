    <?php
    include('db.php');
    require 'send_email.php';

    function getPatientId($phone, $conn)
    {
        if (!empty($phone)) {
            $stmt = $conn->prepare("SELECT pat_id FROM patients WHERE patient_phone = ? LIMIT 1");

            $stmt->bind_param("s", $phone);

            $execute_result = $stmt->execute();

            $pat_id = '';

            if ($execute_result) {
                $stmt->bind_result($pat_id);

                $fetch_result = $stmt->fetch();

                $stmt->close();

                if ($fetch_result && !empty($pat_id)) {
                    return $pat_id;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        return false;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $phone = $_POST['tel'];
        $date = $_POST['date'];
        $name = $_POST['fname'];
        $email = $_POST['email'];

        // Check if the result of the fetch was okay
        // Afterwards, check if the patient id is empty
        // It is only empty if there isn't a patient with the give phone number
        if (!getPatientId($phone, $conn)) {


            $stmt = $conn->prepare("INSERT INTO patients(patient_name,patient_email,patient_phone) values(?,?,?)");
            //binding parameters

            $stmt->bind_param("sss", $name, $email, $phone);
            //Execute
            $execute_result =  $stmt->execute();

            $stmt->close();

            if ($execute_result) {
                $pat_id = getPatientId($phone, $conn);

                $services = $_POST['services'];

                $service_names = [];

                if (!empty($services)) {

                    // echo print_r($services);

                    foreach ($services as $service_id) {

                        $new_date = date("Y-m-d H:i:s", strtotime($date));
                        $payment_status = 0;
                        $app_status = 0;

                        $stmt = $conn->prepare("INSERT INTO appointments(app_date, pat_id, service_id, payment_status, app_status) values(?,?,?,?,?)");

                        //bind
                        $stmt->bind_param("siiii", $new_date, $pat_id, $service_id, $payment_status, $app_status);

                        $execute_result =  $stmt->execute();

                        $stmt->close();

                        if ($execute_result) {

                            $stmt = $conn->prepare("SELECT service_name FROM services WHERE service_id = ?");

                            $stmt->bind_param("i", $service_id);

                            $execute_result = $stmt->execute();

                            if ($execute_result) {
                                $stmt->bind_result($service_name);

                                $stmt->close();

                                echo $service_id . "\n";

                                array_push($service_names, $service_name);

                                // unset($service_name);
                            } else {
                                echo 'Error while adding!';
                            }
                        } else {
                            echo 'Error while adding service';
                        }
                    }

                    $count = count($service_names);

                    if ($count === 0) {
                        // Handle the case where the array is empty
                        $formattedString = "";
                    } elseif ($count === 1) {
                        // If there's only one element, no need for commas or "and"
                        $formattedString = $service_names[0];
                    } else {
                        // For more than one element, use commas and "and" for the last element
                        $formattedString = implode(", ", array_slice($service_names, 0, -1)) . " and " . end($service_names);
                    }

                    // Construct the confirmation message
                    $confirmationMessage = "Hello $name, Your Dental appointment for $formattedString service, scheduled on $date, has been successfully confirmed. \n Thank you for choosing Reigns Dental Clinic";

                    // Send the email
                    $to = $email;
                    $subject = "Dental Appointment Confirmation";
                    $headers = "From: reignsdentalclinic@gmail.com"; // Replace with your email address

                    // Use the mail() function to send the email
                    //mail($to, $subject, $confirmationMessage, $headers);

                    //  sendConfirmationEmail($name, $email);

                    if (sendConfirmationEmail($name, $email, $confirmationMessage)) {
                        // You can also display a confirmation message to the user
                        echo "Confirmation email sent to $email. Thank you for choosing Reigns Dental Clinic.";
                    } else {
                        echo 'Failed to send confirmation email. Please try again later.';
                    }
                }
            }
            echo "Success!!!";
            header("Location: ../src/views/appointments/Appointments.php");
        } else {
            $pat_id = getPatientId($phone, $conn);

            $services = $_POST['services'];

            $service_names = [];

            if (!empty($services)) {

                // echo print_r($services);

                foreach ($services as $service_id) {

                    $new_date = date("Y-m-d H:i:s", strtotime($date));
                    $payment_status = 0;
                    $app_status = 0;

                    $stmt = $conn->prepare("INSERT INTO appointments(app_date, pat_id, service_id, payment_status, app_status) values(?,?,?,?,?)");

                    // echo 'Patient id' . $pat_id;
                    //bind
                    $stmt->bind_param("siiii", $new_date, $pat_id, $service_id, $payment_status, $app_status);

                    $execute_result =  $stmt->execute();

                    $stmt->close();

                    if ($execute_result) {

                        $result = $conn->query("SELECT service_name FROM services WHERE service_id = " . $service_id . " LIMIT 1");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $service_name = $row['service_name'];
                            }
                        }

                        array_push($service_names, $service_name);

                        // echo var_dump($service_names, $service_name);

                        // unset($service_name);

                    } else {
                        echo 'Error while adding service';
                    }
                }

                $count = count($service_names);

                if ($count === 0) {
                    // Handle the case where the array is empty
                    $formattedString = "";
                } elseif ($count === 1) {
                    // If there's only one element, no need for commas or "and"
                    $formattedString = $service_names[0];
                } else {
                    // For more than one element, use commas and "and" for the last element
                    $formattedString = implode(", ", array_slice($service_names, 0, -1)) . " and " . end($service_names);
                }

                // Construct the confirmation message
                $confirmationMessage = "Hello $name, Your Dental appointment for $formattedString service, scheduled on $date, has been successfully confirmed. \n Thank you for choosing Reigns Dental Clinic";

                // Send the email
                $to = $email;
                $subject = "Dental Appointment Confirmation";
                $headers = "From: reignsdentalclinic@gmail.com"; // Replace with your email address

                // Use the mail() function to send the email
                //mail($to, $subject, $confirmationMessage, $headers);

                //  sendConfirmationEmail($name, $email);

                if (sendConfirmationEmail($name, $email, $confirmationMessage)) {
                    // You can also display a confirmation message to the user
                    echo "Confirmation email sent to $email. Thank you for choosing Reigns Dental Clinic.";
                } else {
                    echo 'Failed to send confirmation email. Please try again later.';
                }
            }
        }
        // Check if each service checkbox is checked and set a variable accordingly

        // Check if each service checkbox is checked and set a variable accordingly
        // $service = '';

        // $services = $_POST['services'];

        // $count = count($services);

        // if ($count === 0) {
        //     // Handle the case where the array is empty
        //     $formattedString = "";
        // } elseif ($count === 1) {
        //     // If there's only one element, no need for commas or "and"
        //     $formattedString = $services[0];
        // } else {
        //     // For more than one element, use commas and "and" for the last element
        //     $formattedString = implode(", ", array_slice($services, 0, -1)) . " and " . end($services);
        // }


        // // Remove the trailing comma and space from the service string
        // // $service = rtrim($service, ', ');

        // // Construct the confirmation message
        // $confirmationMessage = "Hello $name, Your Dental appointment for $formattedString service, scheduled on $date, has been successfully confirmed. \n Thank you for choosing Reigns Dental Clinic";

        // // Send the email
        // $to = $email;
        // $subject = "Dental Appointment Confirmation";
        // $headers = "From: reignsdentalclinic@gmail.com"; // Replace with your email address

        // Use the mail() function to send the email
        //mail($to, $subject, $confirmationMessage, $headers);

        //  sendConfirmationEmail($name, $email);

        // if (sendConfirmationEmail($name, $email, $confirmationMessage)) {
        //     // You can also display a confirmation message to the user
        //     echo "Confirmation email sent to $email. Thank you for choosing Reigns Dental Clinic.";
        // } else {
        //     echo 'Failed to send confirmation email. Please try again later.';
        // }
    }

    $conn -> close();

    //echo "Hello $name, of $email. Your Dental appointment for $service service, scheduled on $date, has been successfully confirmed. \n Thank you for choosing Reigns Dental Clinic";
    ?>
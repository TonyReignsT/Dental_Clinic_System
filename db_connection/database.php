<!-- Establishing db connection  -->

<!-- Replace "your_server_name", "your_username", "your_password", and "your_database_name" 
with your actual MySQL server details. -->

<?php
$servername = "localhost"; // usually "localhost"
$username = "root";
$password = "root";  //password
$dbname = "dental_clinic";  //database_name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else 
{
    echo "Connection succesful!";
}

// Check if the table exists
$tableName = "users";
$result = $conn->query("SHOW TABLES LIKE '$tableName'");

if ($result->num_rows == 1) {
    // Table exists, perform your query
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Process each row
            // echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
            // echo "ID: " . $row["user_id"]. " - Name: " . $row["user_name"]. " - Email: " . $row["user_email"]. "<br>";
            echo "ID: " . $row["user_id"] . " - Name: " . $row["user_name"] . " - Email: " . $row["user_email"] .
     " - user_phone " . $row["user_phone"] . " - user_password: " . $row["user_password"] . " - role: " . $row["role"] . "<br>";

        }
    } else {
        echo "0 results";
    }
} else {
    echo "The table '$tableName' does not exist.";
}

// Close the result set
$result->close();

// Close the connection
$conn->close();
?>

<!-- Mysql Queries  -->

<!-- Replace "your_table" with the name of your MySQL table. -->
 
 <?php
/*$sql = "SELECT * FROM appointments";  //your table
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close(); // Close the connection when done
?>

<!-- Error Handling -->

<?php
// ...

// Check for errors
 if ($conn->error) {
    die("Query failed: " . $conn->error);
}

// ...     */
?>
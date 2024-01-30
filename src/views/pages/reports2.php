<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Buttons extension -->
<script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
  </head>

  <body>

  <?php
$title = 'Reports';
include_once '../../partials/header.php';

// include_once '../../partials/sidebar.php';


$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

// Check if there is data
if ($result->num_rows > 0) {
    // Fetch the data
    while ($row = $result->fetch_assoc()) {
        // Process the data as needed
        $reportData[] = $row;
    }
}
?>

    <!-- Your PHP and HTML code... -->
     <!-- Reports body -->
     <h1>Patients Reports</h1>
        <div class="w-90 shadow-sm card p-5">
            <table border="1" class='table table-bordered' id="patients">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <!-- Add more columns as needed -->
                </tr>
                <?php
                // Display the data in the HTML table
                foreach ($reportData as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['pat_id'] . "</td>";
                    echo "<td>" . $row['patient_name'] . "</td>";
                    echo "<td>" . $row['patient_email'] . "</td>";
                    echo "<td>" . $row['patient_phone'] . "</td>";
                    // Add more columns as needed
                    echo "</tr>";
                }
                ?>

            </table>

    <script>
$(document).ready(function() {
    $('#patients').DataTable({
        dom: 'Blfrtip',
        buttons: ['print'],
        responsive: true // Optional, for responsiveness
    });
});

    </script>
  </body>
</html>

<?php
$title = 'Reports';
include_once '../../partials/header.php';

include_once '../../partials/sidebar.php';


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
<!-- HTML -->

<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>

        <div class="user">
            <!-- <img src="assets/imgs/customer01.jpg" alt=""> -->
            <a href="#">Admin</a>
        </div>
    </div>
    <div class="d-flex flex-column px-2">

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
            <a class="btn btn-primary" href="#" id="print-btn" role="button">Print</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

<script>
    // const printBtn = $("#print-btn")

    // printBtn.on('click',function (){
    //     console.log ("Printing...");

    //     window.print();
    // })

    $(document).ready(function() {
        $('#patients').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
</script>
<?php
include_once '../../partials/footer.php';
?>
<?php
// search_p.php

include_once '../../../db_connection/db.php';

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$query = "SELECT * FROM patients";

// Add a WHERE clause for search if input is provided
if (!empty($search)) {
    $query .= " WHERE patient_name LIKE '%$search%'";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        foreach ($columns_arr as $value) {
            echo "<td>{$row[$value]}</td>";
        }
        echo "<td><a href='../pages/pat_actions_btns/edit_p.php?id={$row['pat_id']}' class='btn btn-sm btn-primary'>Edit</a> <a href='../pages/pat_actions_btns/delete_p.php?id={$row['pat_id']}' class='btn btn-sm btn-danger'>Delete</a></td></tr>";
    }
} else {
    echo "<tr><td colspan='" . (count($columns_arr) + 1) . "'>No matching records found</td></tr>";
}
?>

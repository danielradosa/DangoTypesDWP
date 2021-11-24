<?php
include('../includes/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM `order` WHERE orderID = $id_to_delete";

    $finalQuery = mysqli_query($conn, $sql);

    if ($finalQuery) {
        header("Location: ?deleted successfully");
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    header("Location: orders.php");
}
<?php
include('../includes/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM `order` WHERE orderID = $id_to_delete";
    $sqlTwo = "DELETE FROM `orderdetails` WHERE orderDetailsID = $id_to_delete";

    $finalQuery1 = mysqli_query($conn, $sql);
    $finalQuery2 = mysqli_query($conn, $sqlTwo);

    if ($finalQuery1 && $finalQuery2) {
        header("Location: ?deleted successfully");
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    header("Location: orders.php");
}
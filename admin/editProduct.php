<?php

include ('../includes/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM product WHERE productID = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header("Location: ?deleted successfully");
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    header("Location: products.php");
}
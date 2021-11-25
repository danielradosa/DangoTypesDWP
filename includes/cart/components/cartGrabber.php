<?php
if (!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

if (!empty($_SESSION['cart'])) {
    $ids = "";
    foreach ($_SESSION['cart'] as $id) {
        $ids = $ids . $id . ",";
    }
    $ids = rtrim($ids, ',');

    $cartQuery = "SELECT * FROM `product` WHERE productID IN (" . implode(',', $_SESSION['cart']) . ") ";
    $resultCart = $conn->query($cartQuery);
}
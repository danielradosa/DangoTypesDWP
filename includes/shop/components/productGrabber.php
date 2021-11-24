<?php
if (!isset($_SESSION)) {
    session_start();
}

$chosenProduct = $_SERVER['QUERY_STRING'];

include('includes/db_connect.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$query = "SELECT * FROM `product` WHERE productID = $chosenProduct";
$result = $conn->query($query);

$relatedK = "SELECT * FROM `diy_keyboardscategory` ORDER BY rand() LIMIT 2";
$relatedKresult = $conn->query($relatedK);

$relatedS = "SELECT * FROM `switchescategory` ORDER BY rand() LIMIT 2";
$relatedSresult = $conn->query($relatedS);
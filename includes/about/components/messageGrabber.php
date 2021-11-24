<?php
if (!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$queryM = "SELECT * FROM `messages`";
$resultM = $conn->query($queryM);
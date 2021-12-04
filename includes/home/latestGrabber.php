<?php
session_start();
include('includes/db_connect.php');
include('includes/functions.php');

$sql = "SELECT * FROM `product` ORDER BY dateCreated DESC LIMIT 1";
$result = $conn->query($sql);
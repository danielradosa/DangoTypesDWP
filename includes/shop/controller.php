<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include('includes/db_connect.php');

$host = $_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'];

$page = '';
$product_per_page = 6;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $product_per_page;

$sqlAll = "SELECT * FROM `product` ORDER BY `dateCreated` DESC LIMIT $start_from, $product_per_page";
$result = $conn->query($sqlAll);


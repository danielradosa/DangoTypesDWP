<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$chosenProduct = $_SERVER['QUERY_STRING'];

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
} 
array_push($_SESSION['cart'], $chosenProduct);
header("Location: shop.php");
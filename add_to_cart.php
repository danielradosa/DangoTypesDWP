<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$chosenProduct = $_SERVER['QUERY_STRING'];
$cart = $_SESSION['cart'];

if (empty($cart)) {
    $cart = array();
} 

if (!in_array($chosenProduct, $cart)) {
    array_push($_SESSION['cart'], $chosenProduct);
}


header("Location: shop.php");
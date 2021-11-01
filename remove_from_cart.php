<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$chosenProduct = $_SERVER['QUERY_STRING'];
$cart = $_SESSION['cart'];

if (in_array($chosenProduct, $cart)) {
    unset($chosenProduct);
}


header("Location: cart.php");
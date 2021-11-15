<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$chosenProduct = $_SERVER['QUERY_STRING'];

$key = array_search($chosenProduct, $_SESSION['cart']);

if ($key !== FALSE) {
    unset($_SESSION['cart'][$key]);
}

header("Location: ../../cart.php");
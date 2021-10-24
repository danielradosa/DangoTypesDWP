<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$chosenProduct = $_SERVER['QUERY_STRING'];

include('includes/db_connect.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php');  ?>

<h1 style="padding-top: 6em;">CART</h1>

<?php var_dump($_SESSION['cart']); ?>

</body>

</html>
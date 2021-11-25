<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<style>
    h1 { margin-top: 3em;  text-align: center; }
    .admin-nav { margin-top: 3em; text-align: center;}
    span {padding: 1em; display:inline-block; font-size: 2em;}
    span a { color: black; text-decoration: none; border: 1px solid black; padding: .5em;}
    span a:hover { background-color: black; color: white;}
</style>

<h1>Hey admin, what do you want to do today?</h1>

<div class="admin-nav">
    <span>View: <a href="orders/orders.php">ORDERS</a></span> <br>
    <span>See: <a href="products/products.php">PRODUCTS</a></span> <br>
    <span>Edit: <a href="other.php">OTHERS</a></span>
    <span><a href="../my_account.php">BACK TO MY ACCOUNT</a></span>
</div>


</body>

</html>
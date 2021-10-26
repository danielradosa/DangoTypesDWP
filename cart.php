<?php
if (!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

//$chosenProduct = $_SERVER['QUERY_STRING'];
//$cartArray = $_SESSION['cart'];

$ids = "";
foreach ($_SESSION['cart'] as $id) {
    $ids = $ids . $id . ",";
}
$ids = rtrim($ids, ',');

$cartQuery = "SELECT * FROM `product` WHERE productID IN (" . implode(',', $_SESSION['cart']) . ") ";
$result = $conn->query($cartQuery);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php');  ?>

<h1 style="padding-top: 2em; padding-bottom: 1em; text-align: center; font-size: 5.1vw;">YOUR CART</h1>

<?php while ($row = $result->fetch_assoc()) { ?>
    <div class="cart-container">
        <div class="left-cart">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <span><?php echo "$ " . $row['price']; ?></span>
            <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 10%; height: 10%;  display: block; margin-top: 3em;' />"; ?>
            <hr>
        </div>
        <div class="right-cart">
            
        </div>
    </div>
<?php } ?>

</body>

</html>
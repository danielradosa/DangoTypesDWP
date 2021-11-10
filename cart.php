<?php
if (!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

if (!empty($_SESSION['cart'])) {
    $ids = "";
    foreach ($_SESSION['cart'] as $id) {
        $ids = $ids . $id . ",";
    }
    $ids = rtrim($ids, ',');

    $cartQuery = "SELECT * FROM `product` WHERE productID IN (" . implode(',', $_SESSION['cart']) . ") ";
    $result = $conn->query($cartQuery);
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php');  ?>

<?php
if (empty($_SESSION['cart'])) {
    echo "<h1 style='padding-top: 2em; padding-bottom: 1em; text-align: center; font-size: 5.1vw;'>YOUR CART IS EMPTY</h1>";
} else if (!empty($_SESSION['cart'])) {
    echo "<h1 style='padding-top: 2em; padding-bottom: 1em; text-align: center; font-size: 5.1vw;'>YOUR CART</h1>";
    if (count($_SESSION['cart']) <= 1) {
        echo "<h1 style='padding-bottom: 3em; text-align: center; font-size: 2.1vw;'>You have " . count($_SESSION['cart']) . " item in your cart</h1>";
    } else {
        echo "<h1 style='padding-bottom: 3em; text-align: center; font-size: 2.1vw;'>You have " . count($_SESSION['cart']) . " items in your cart</h1>";
    }
}
?>

<?php
if (!empty($_SESSION['cart'])) {
    while ($row = $result->fetch_assoc()) {

?>

        <div class="cart-container">
            <div class="left-cart">
                <h2><?php echo $row['title']; ?><a href="remove_from_cart.php?<?php echo $row['productID']; ?>" class="remove-btn">REMOVE-X</a></h2>
                <p><?php echo $row['description']; ?></p>
                <span style="color: blue;"><?php echo "$ " . $row['price']; ?></span>
                <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 20%; height: 20%;  display: block; margin-top: 1em;
            margin-bottom: 3em;' />"; ?>
                <?php
                error_reporting(0);
                ini_set('display_errors', 0);
                    $total += $row['price'];
                ?>
            </div>
        </div>

<?php
    }
}
?>

<div class="checkout">
    <span>
        <?php
           if (!empty($_SESSION['cart'])) {
               echo "Total: $" . $total;
           }
        ?>
    </span>
        <?php if (!empty($_SESSION['cart'])) { ?>
            <a href='checkout.php?<?php echo $total; ?>' style='color: white; background-color: black; text-decoration:none; text-align: center; padding: 1em;'>Checkout</a>
        <?php } ?>
</div>

</body>

</html>
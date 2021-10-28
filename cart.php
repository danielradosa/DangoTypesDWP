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

if (isset($_POST['remove'])) {
    session_unset();
    header("Location: cart.php");
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
        echo "<h1 style='padding-bottom: 3em; text-align: center; font-size: 2.1vw;'>You have ".count($_SESSION['cart'])." items in your cart</h1>";
    }
?>

<?php while ($row = $result->fetch_assoc()) { ?>
    <div class="cart-container">
        <div class="left-cart">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <span><?php echo "$ " . $row['price']; ?></span>
            <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 10%; height: 10%;  display: block; margin-top: 3em;' />"; ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <button type="submit" value="X" name="remove">X</button>
                <button type="submit" value="ADD 1 MORE" name="remove">ADD 1 MORE</button>
            </form>
            <hr>
        </div>
    </div>
<?php } ?>

</body>

</html>
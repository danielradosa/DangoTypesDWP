<?php
include('includes/db_connect.php');

$sql = "SELECT * FROM `product`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php')  ?>

<main>
    <h2 class="latest">SHOP HERE</h2>
    <h4 class="site-desc">You Can Find All Products Here</h4>
</main>

<div class="shop-nav">
    <nav>
        <a href="#">DIY Kits</a>
        <a href="#">Pre-built keyboards</a>
        <a href="#">PCB's</a>
        <a href="#">Cases</a>
        <a href="#">Plates</a>
        <a href="#">Switches</a>
        <a href="#">Keycaps</a>
        <a href="#">Deskmats</a>
    </nav>
</div>

<div class="shop-wrapper">
    <h3 class="most-popular">🌟 Biggest Celebrities 🌟</h3>

    <div class="product-view">

        <?php while ($row = $result->fetch_assoc()) { ?>

            <div class="product">
                <div class="product-image">
                    <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 80%; margin: 0 auto; display: block; margin-top: 3em;' />"; ?>
                </div>
                <h4 class="product-title"><?php echo $row['title'] ?></h4>
                <h5 class="product-price">$ <?php echo $row['price'] ?></h5>
            </div>

        <?php } ?>

    </div>

    <div class="pagination">
        <span class="page">Page 1 / 3 >>></span>
    </div>
</div>

</body>

</html>
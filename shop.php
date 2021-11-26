<?php include('includes/shop/controller.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php')  ?>

<main>
    <h2 class="latest">SHOP HERE</h2>
    <h4 class="site-desc">You Can Find All Products Here</h4>
</main>

<div class="shop-nav">
    <nav>
        <a href="shop.php">All products</a>
    </nav>
</div>

<div class="shop-wrapper">
    <h3 class="most-popular">🌟 All Products 🌟</h3>

    <div class="product-view">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product">
                <a href="<?php echo 'product.php' . '?' . $row['productID']; ?>" class="">
                    <div class="product-image">
                        <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 50%; height: 50%; margin: 0 auto; display: block; margin-top: 3em;' />"; ?>
                    </div>
                </a>
                <h4 class="product-title"><?php echo $row['title'] ?></h4>
                <p class="product-description"><?php echo $row['description'] ?></p>
                <h5 class="product-price">$ <?php echo $row['price'] ?></h5>
            </div>
        <?php } ?>
    </div>

    <div class="pagination">
        <div class="page">
            <span class="page">Page:</span>
            <?php include('includes/shop/components/pagination.php'); ?>
        </div>
    </div>
</div>

</body>

</html>
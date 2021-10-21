<?php
include('includes/db_connect.php');

$page = '';
$product_per_page = 6;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_from = ($page-1)*$product_per_page;

$sql = "SELECT * FROM `product` ORDER BY `dateCreated` DESC LIMIT $start_from, $product_per_page";
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
    <h3 class="most-popular">🌟 All Products 🌟</h3>

    <div class="product-view">

        <?php while ($row = $result->fetch_assoc()) { ?>

            <div class="product">
                <div class="product-image">
                    <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 50%; height: 50%; margin: 0 auto; display: block; margin-top: 3em;' />"; ?>
                </div>
                <h4 class="product-title"><?php echo $row['title'] ?></h4>
                <p class="product-description"><?php echo $row['description'] ?></p>
                <h5 class="product-price">$ <?php echo $row['price'] ?></h5>
            </div>
    
        <?php } ?>

    </div>

    <div class="pagination">
        <div class="page" >
            <span class="page">Page:</span>
            <?php
                $page_query = "SELECT * FROM `product` ORDER BY `dateCreated` DESC";
                $page_result = mysqli_query($conn, $page_query);
                $total_records = mysqli_num_rows($page_result);
                $total_pages = ceil($total_records/$product_per_page);
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='?page=".$i."' style='text-decoration: none; color: blue;'>".$i." "."</a>";
                }
            ?>
        </div>
    </div>
</div>

</body>

</html>
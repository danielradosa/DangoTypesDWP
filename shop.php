<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include('includes/db_connect.php');

$host = $_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'];

$page = '';
$product_per_page = 6;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $product_per_page;

$sqlAll = "SELECT * FROM `product` ORDER BY `dateCreated` DESC LIMIT $start_from, $product_per_page";
$result = $conn->query($sqlAll);
?>

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

<?php if ($host = 'http://localhost/DangoTypesDWP/shop.php') { ?>

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
            <?php
            $page_query = "SELECT * FROM `product` ORDER BY `dateCreated` DESC";
            $page_result = mysqli_query($conn, $page_query);
            $total_records = mysqli_num_rows($page_result);
            $total_pages = ceil($total_records / $product_per_page);
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='?page=" . $i . "' style='text-decoration: none; color: blue;'>" . $i . " " . "</a>";
            }
            ?>
        </div>
    </div>
</div>

<?php } ?>

</body>

</html>
<?php

include('includes/db_connect.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$chosenProduct = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM `product` WHERE productID = $chosenProduct";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php');  ?>

<?php while ($row = $result->fetch_assoc()) { ?>

    <div class="sp-container">

        <div class="left">
            <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 100%; margin: 0 auto; display: block; margin-top: 8em;' />"; ?>
        </div>

        <div class="right">
            <h2 class="sp-name">"<?php echo $row['title']; ?>"</h2>

            <p class="sp-description"><?php echo $row['description']; ?></p>

            <p class="sp-price" style="font-weight: bold; background-color: blue; padding: 0.5em;">$<?php echo $row['price'];  ?></p>

            <div class="sp-actions">
                <a href="javascript:history.back()"><i class="fas fa-chevron-left"></i>BACK</a>
                <button>ADD TO CART</button>
            </div>

        </div>

    </div>

<?php } ?>

</body>

</html>
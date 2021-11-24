<?php include('includes/shop/components/productGrabber.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php');  ?>

<?php while ($row = $result->fetch_assoc()) { ?>

    <div class="sp-container">
        <div class="left">
            <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 100%; margin: 0 auto; display: block; margin-top: 8em;' />"; ?>
        </div>
        <div class="right">
            <h2 class="sp-name">"<?php echo $row['title']; ?>"</h2>
            <p class="sp-description"><?php echo $row['description']; ?></p>
            <p class="sp-description">
                <?php 
                    if ($row['stock'] >= 20) {
                        echo "In stock";
                    }  else if ($row['stock'] < 20) {
                        echo "Last " . $row['stock'] . " in stock";
                    } else {
                        echo "Not in stock";
                    }
                ?>
            </p> <br>
            <hr>
            <ul class="sp-info">
                <li><?php if ($row['type'] === 'switch') {echo "Top Housing: ";} else if ($row['type'] === 'diy_keyboard') {echo "Case Material: ";} ?><?php echo $row['caseMaterial']; ?></li>
                <li><?php if ($row['type'] === 'switch') {echo "Bottom Housing: ";} else if ($row['type'] === 'diy_keyboard') {echo "Plate Material: ";} ?><?php echo $row['plateMaterial']; ?></li>
                <li><?php if ($row['type'] === 'switch') {echo "Color: ";} else if ($row['type'] === 'diy_keyboard') {echo "Color: ";} ?><?php echo $row['color']; ?></li>
                <li><?php if ($row['type'] === 'switch') {echo "Switches: ";} else if ($row['type'] === 'diy_keyboard') {echo "Switches: ";} ?><?php echo $row['switches']; ?></li>
                <li><?php if ($row['type'] === 'diy_keyboard') {echo "PCB: ";} ?>Included</li>
                <li>Accessories: <?php echo $row['accessories']; ?></li>
            </ul>
            <p class="sp-price" style="font-weight: bold; background-color: blue; padding: 0.5em;">$<?php echo $row['price'];  ?></p>
            <div class="sp-actions">
                <a href="javascript:history.back()"><i class="fas fa-chevron-left"></i>BACK</a>
                <a href="includes/cart/add_to_cart.php?<?php echo $chosenProduct; ?>">ADD TO CART</a>
            </div>
        </div>
    </div>

    <?php if ($row['type'] === 'diy_keyboard') { ?>

        <h2 class="related-name"><i class="fas fa-chevron-down"></i> Other Related Products <i class="fas fa-chevron-down"></i></h2>
        <?php while ($row = $relatedKresult->fetch_assoc()) { ?>
            <div class="related-container">
                <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 20%; margin: 0 auto; display: block;' />"; ?>
                <h2>"<?php echo $row['title']; ?>"</h2>
                <div class="sp-actions">
                    <a href="product.php?<?php echo $row['productID']; ?>"><i class="fas fa-chevron-right"></i>VIEW PRODUCT</a>
                    <a href="includes/cart/add_to_cart.php?<?php echo $row['productID']; ?>">ADD TO CART</a>
                </div>
            </div>
        <?php } ?>

    <?php } else if ($row['type'] === 'switch') { ?>

        <h2 class="related-name"><i class="fas fa-chevron-down"></i> Other Related Products <i class="fas fa-chevron-down"></i></h2>
        <?php while ($row = $relatedSresult->fetch_assoc()) { ?>
            <div class="related-container">
                <?php echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 20%; margin: 0 auto; display: block;' />"; ?>
                <h2>"<?php echo $row['title']; ?>"</h2>
                <div class="sp-actions">
                    <a href="product.php?<?php echo $row['productID']; ?>"><i class="fas fa-chevron-right"></i>VIEW PRODUCT</a>
                    <a href="includes/cart/add_to_cart.php?<?php echo $row['productID']; ?>">ADD TO CART</a>
                </div>
            </div>
        <?php } ?>

    <?php } ?>

<?php } ?>

</body>

</html>
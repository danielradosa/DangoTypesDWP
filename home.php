<?php
    session_start();
    include('includes/db_connect.php');
    include('includes/functions.php');

    $sql = "SELECT * FROM `product` ORDER BY dateCreated DESC LIMIT 1";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('public/header.php');  ?>

        <main>
            <h2 class="latest">OUR LATEST DEAL</h2>
            <h4 class="site-desc">The Best Mechanical Keyboards & Accessories</h4>
        </main>

        <img class="arrow" src="public/assets/images/arrows.png" alt="" />

        <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="latest-keebs">
            <div class="one">
                <h3 class="keeb-name">"<?php echo  $row['title'] ?>"</h3>
                <div class="keebord">
                <?php
                        echo "<img src=" . 'database/product-images/' . $row['productImage'] . " style='width: 50%;' />";
                        ?>
                    <p class="keeb-info">
                    <?php echo  $row['description'] ?>
                        <br />
                        <button class="getit">GET IT NOW</button>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>

    </body>
</html>
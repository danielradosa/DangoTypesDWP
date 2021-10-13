<?php
    session_start();
    include('includes/db_connect.php');
    include('includes/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

    <?php require('public/header.php');  ?>

        <main>
            <h2 class="latest">OUR LATEST DEALS</h2>
            <h4 class="site-desc">The Best Mechanical Keyboards & Accessories</h4>
        </main>

        <img class="arrow" src="public/assets/images/arrows.png" alt="" />

        <div class="latest-keebs">
            <div class="one">
                <h3 class="keeb-name">"Chinese Ink"</h3>
                <div class="keebord">
                    <img src="public/assets/images/keyboard.png" width="50%" alt="" />
                    <p class="keeb-info">
                        Complete build for those, who are too bored to build
                        anything, but at the same time want some leeway when
                        they decide to.
                        <br />
                        <button class="getit">GET IT NOW</button>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
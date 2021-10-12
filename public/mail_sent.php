<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    header('location: ../home.php');
    exit;
} else {
    header("refresh:5; url=../home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
   
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/605e9f634b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="actions.css" />
    <title>dango types</title>
</head>

<body>
    <header>
        <div class="mid-line">
            <a href="#" class="lang en">EN | </a>
            <a href="kr" class="lang kr">KR</a>
        </div>
        <div class="nav">
            <div class="logo mobile">
                <h1>당고타입</h1>
            </div>
            <div class="line"></div>
            <div class="menu">
                <a href="../home.php">Home</a>
                <a href="#">Guides</a>
                <a href="#">Archive</a>
            </div>
            <div class="linet"></div>
            <div class="menu">
                <a href="../shop.php">Shop</a>
                <a href="../contact.php">Contact</a>
                <a href="#">Account</a>
            </div>
            <div class="line"></div>
            <div class="icons">
                <i class="fab fa-youtube"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
        </div>
    </header>

        <main>
            <h2 class="latest">YOU HAVE SENT US A MAIL</h2>
            <h4 class="site-desc">In 5 Seconds You Will Be Automatically Redirected Back To Homepage</h4>
        </main>

    </body>
</html>

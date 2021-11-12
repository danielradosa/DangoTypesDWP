<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include('includes/db_connect.php');
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/496d8d4e8f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/style.css" />
    <link rel="stylesheet" href="actions.css" />
    <title>dango types</title>
</head>

<body>
    <header>
        <div class="mid-line">
            <a href="home.php" class="lang en">EN | </a>
            <a href="kr" class="lang kr">KR</a>
        </div>
        <div class="nav">
            <div class="logo mobile">
                <h1>당고타입</h1>
            </div>
            <div class="line"></div>
            <div class="menu">
                <a href="home.php">Home</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="linet"></div>
            <div class="menu">
                <a href="shop.php">Shop</a>
                <a href="cart.php">Cartㅤ<span style="color: blue;">[<?php if (empty($_SESSION['cart'])) { echo '0'; } else { echo count($_SESSION['cart']);}?>]</span></a>
                <a href="account.php">Account</a>
            </div>
            <div class="line"></div>
            <div class="icons">
                <i class="fab fa-youtube"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
        </div>
    </header>
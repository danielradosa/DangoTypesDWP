<?php

session_start();

if (isset($_SESSION['userID'])) {
    unset($_SESSION['userID']);
}

header("Location: ../account.php");
die;
<?php
session_start();
include('includes/db_connect.php');
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $regMail = htmlspecialchars($_POST['registerMail']);
    $regPass = htmlspecialchars($_POST['registerPassword']);
    $regPassTwo = htmlspecialchars($_POST['registerPassTwo']);
    $defaultUserType = 0;

    if ($regPass !== $regPassTwo) {
        echo "<div class='error' >Passwords do not match</div>";
    }
    if ($regPass === $regPassTwo) {
        if (!empty($regMail) && !empty($regPass) && !empty($regPassTwo)) {
            $hashed_password = password_hash($regPass, PASSWORD_BCRYPT);
            $query = $conn->prepare("INSERT INTO `user` (userEmail, userPass, userType) VALUES (?, ?, ?)");
            $query->bind_param('ssi', $regMail, $hashed_password, $defaultUserType);
            $query->execute();
            header("Location: account.php");
            die;
        } else {
            echo "<div class='error' >Fields cannot be empty</div>";
        }
    }
}


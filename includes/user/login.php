<?php
session_start();
include('includes/db_connect.php');
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $loginMail = htmlspecialchars($_POST['loginMail']);
    $loginPass = htmlspecialchars($_POST['loginPassword']);

    if (!empty($loginMail) && !empty($loginPass)) {
        $query = "SELECT * FROM `user` WHERE userEmail = '$loginMail' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($loginPass, $user_data['userPass'])) {
                    $_SESSION['userID'] = $user_data['userID'];
                    header("Location: my_account.php?".$user_data['userID']);
                    die;
                } else {
                    echo "<div class='error'>Wrong e-mail or password</div>";
                }
            }
        } 
        echo "<div class='error'>Wrong e-mail or password</div>";
    } else {
        echo "<div class='error'>Please fill out everything</div>";
    }
}
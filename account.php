<?php
session_start();
include('includes/db_connect.php');
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $loginMail = $_POST['loginMail'];
    $loginPass = $_POST['loginPassword'];

    if (!empty($loginMail) && !empty($loginPass)) {
        $query = "SELECT * FROM `user` WHERE userEmail = '$loginMail' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($loginPass, $user_data['userPass'])) {
                    $_SESSION['userID'] = $user_data['userID'];
                    header("Location: my_account.php");
                    die;
                } else {
                    echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Wrong e-mail or password</div>";
                }
            }
        } 
        echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Wrong e-mail or password</div>";
    } else {
        echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Please fill out everything</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php'); ?>

<main>
    <h2 class="latest">LOGIN</h2>
    <h4 class="site-desc">Login By Filling Out Your Account Information</h4>
</main>

<div class="form-wrapper">
    <form method="POST">
        <label for="loginMail">E-mail</label> <br />
        <input type="email" id="loginMail" name="loginMail" placeholder="Your E-Mail" required />
        <br />
        <label for="yourEmail">Password</label> <br />
        <input type="password" id="loginPassword" name="loginPassword" placeholder="Your Password" required />
        <br />
        <label for="subject">Do not have an account yet? <a href="register.php">Sign up here.</a></label>
        <br />
        <div class="form-buttons">
            <button type="submit" name="login" class="send" value="LOGIN">LOG IN</button>
            <button type="reset" class="messup">Ooopsie, I forgot my password...</button>
        </div>
    </form>
</div>
</body>

</html>
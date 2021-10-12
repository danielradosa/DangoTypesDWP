<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php'); ?>

<main>
    <h2 class="latest">LOGIN</h2>
    <h4 class="site-desc">Login By Filling Out Your Account Information</h4>
</main>

<div class="form-wrapper">
    <form action="public/login_pro.php" method="POST">
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
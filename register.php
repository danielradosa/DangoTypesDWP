<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php'); ?>

<main>
    <h2 class="latest">SIGN UP</h2>
    <h4 class="site-desc">Sign Up By Filling Out This Form</h4>
</main>

<div class="form-wrapper">
    <form action="public/register_pro.php" method="POST">
        <label for="registerMail">Your E-mail</label> <br />
        <input type="email" id="registerMail" name="registerMail" placeholder="Your E-Mail" required />
        <br />
        <label for="registerPassword">Password</label> <br />
        <input type="password" id="registerPassword" name="registerPassword" placeholder="Your Password" required />
        <br />
        <label for="registerPasswordTwo">Repeat Password</label> <br />
        <input type="password" id="registerPasswordTwo" name="registerPasswordTwo" placeholder="Repeat Password" required />
        <br />
        <label for="subject">Already have an account? <a href="account.php">Log in here.</a></label>
        <br />
        <div class="form-buttons">
            <button type="submit" name="login" class="send" value="LOGIN">SIGN UP</button>
            <button type="reset" class="messup">Reset form please, forgot what password I used...</button>
        </div>
    </form>
</div>
</body>

</html>
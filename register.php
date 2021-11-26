<?php include('includes/account/registerScript.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php'); ?>

<main>
    <h2 class="latest">SIGN UP</h2>
    <h4 class="site-desc">Sign Up By Filling Out This Form</h4>
</main>

<div class="form-wrapper">
    <form method="POST">
        <label for="registerMail">E-mail</label> <br />
        <input type="email" id="registerMail" name="registerMail" placeholder="Your E-Mail" required />
        <br />
        <label for="registerPassword">Password</label> <br />
        <input type="password" id="registerPassword messup" name="registerPassword" placeholder="Your Password" required />
        <br />
        <label for="registerPassword">Repeat Password</label> <br />
        <input type="password" id="registerPassword messup" name="registerPassTwo" placeholder="Your Password" required />
        <br />
        <label for="subject">Already have an account? <a href="account.php" >Log in here.</a></label>
        <br />
        <div class="form-buttons">
            <button type="submit" name="login" class="send" value="LOGIN">SIGN UP</button>
        </div>
    </form>
</div>

</body>

</html>
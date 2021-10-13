<?php 
    session_start();
    include('includes/db_connect.php');
    include('includes/functions.php');
   
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $regMail = $_POST['registerMail'];
        $regPass = $_POST['registerPassword'];
    
        if (!empty($regMail) && !empty($regPass)) {
            $query = "INSERT INTO `user` (userEmail, userPass) VALUES ('$regMail', '$regPass')";
            mysqli_query($conn, $query);
            header("Location: account.php");
            die;
        } else {
            echo "Please check your details again";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php'); ?>

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
        <label for="subject">Already have an account? <a href="account.php" >Log in here.</a></label>
        <br />
        <div class="form-buttons">
            <button type="submit" name="login" class="send" value="LOGIN">SIGN UP</button>
            <button type="reset" class="messup">Reset form, I need to retype my password...</button>
        </div>
    </form>
</div>

</body>

</html>
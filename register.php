<?php 
    session_start();
    include('includes/db_connect.php');
    include('includes/functions.php');
   
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $regMail = $_POST['registerMail'];
        $regPass = $_POST['registerPassword'];
        $regPassTwo = $_POST['registerPassTwo'];

        if ($regPass !== $regPassTwo) {
            echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Passwords do not match</div>";
        }
        if ($regPass === $regPassTwo) {
            if  (!empty($regMail) && !empty($regPass) && !empty($regPassTwo)) {
                $hashed_password = password_hash($regPass, PASSWORD_BCRYPT);
                $query = "INSERT INTO `user` (userEmail, userPass, userType) VALUES ('$regMail', '$hashed_password', 0)";
                mysqli_query($conn, $query);
                header("Location: account.php");
                die;
            } else {
                echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Fields cannot be empty</div>";
            }
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
        <label for="registerPassword">Repeat Password</label> <br />
        <input type="password" id="registerPassword messup" name="registerPassTwo" placeholder="Your Password" required />
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
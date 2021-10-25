<?php
$fullName = $customerEmail =  $message = '';
$errors = array('fullName' => '', 'customerEmail' => '', 'message' => '');

if (isset($_POST['submit'])) {
    $myEmail = "danysko5@gmail.com";
    $timeStamp = date("dd/M/YY HH:i:s");
    $body = "";

    $fullName = htmlspecialchars($_POST['fullName']);
    $customerEmail = htmlspecialchars($_POST['customerEmail']);
    $chosenSubject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $body .= "From: " . $fullName . " at $timeStamp" . "\r\n";
    $body .= "Customer Email: " . $customerEmail . "\r\n";
    $body .= "Subject: " . $chosenSubject . "\r\n";
    $body .= "Message: " . $message . "\r\n";

    if (empty($fullName)) {
        $errors['fullName'] = "Full name is required. <br>";
    } else {
        if (!preg_match("/^([a-zA-Z' ]+)$/", $fullName)) {
            $errors['fullName'] = "Your name must be a valid name.";
        }
    }

    if (empty($customerEmail)) {
        $errors['customerEmail'] = "An email is required. <br>";
    } else {
        if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
            $errors['customerEmail'] = "Email must be a valid email address.";
        }
    }

    if (empty($message)) {
        $errors['message'] = "A message is required.";
    } 
    
    if(!empty($fullName) && !empty($customerEmail) && !empty($message)) {
        mail($myEmail, $chosenSubject, $body);
        header("Location: public/mail_sent.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php'); ?>

<main>
    <h2 class="latest">HAVE A QUESTION?</h2>
    <h4 class="site-desc">Please Do Contact Us By Filling Out This Form</h4>
</main>

<div class="form-wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="name">Full Name ✍🏻</label>  <span class="error"><?php echo $errors['fullName'] ?></span><br />
        <input type="text" id="fullName" name="fullName" placeholder="Full Name" required/>
        <br />
        
        <label for="yourEmail">Your Email 📧</label><span class="error"><?php echo $errors['customerEmail'] ?></span> <br />
        <input type="email" id="customerEmail" name="customerEmail" placeholder="Your Email" required/>
        <br />
        <label for="subject">What is your reason for contacting us? 🧐</label>
        <br />
        <select id="subject" name="subject" required>
            <option value="basic">Pick a subject</option>
            <option value="general">I have a question</option>
            <option value="collaboration">
                I want to offer a collaboration
            </option>
            <option value="other">
                I have something else on my mind
            </option>
        </select>
        <br />
        <label for="message">Your message to us 👨🏻‍💻</label> <span class="error"><?php echo $errors['message'] ?></span> <br />
        <textarea name="message" id="message" cols="40" rows="6" required></textarea><br />
        <div class="form-buttons">
            <button type="submit" name="submit" class="send" value="SEND">SEND</button>
            <button type="reset" class="messup">Wait, I messed up...</button>
        </div>
    </form>
</div>
</body>

</html>
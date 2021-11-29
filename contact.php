<?php include('includes/contact/contactUs.php'); ?>

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
        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
        <div class="form-buttons">
            <button type="submit" name="submit" class="send" value="SEND">SEND</button>
        </div>
    </form>
</div>

<script>
    window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if ($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
</script>
</body>

</html>
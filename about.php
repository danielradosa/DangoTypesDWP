<?php include('includes/about/components/messageGrabber.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php'); ?>

<main>
    <h2 class="latest">ABOUT US</h2>
    <h4 class="site-desc">Learn About Some Things About Us</h4>
</main>

<div class="form-wrapper">
    <?php while ($row = $resultM->fetch_assoc()) { ?>
    <p style="color: white; padding: 2em; font-size: 3vw; text-align: center;">
        <?php echo $row['companyDescription']; ?>
        <span style="font-size: 2vw; padding: 2em; display: block; color: gray;">
            If you need any guidance please, <br> contact us either through our <a href="contact">contact form</a> <br>
            or call us here: <?php echo $row['contactNumber']; ?>
        </span>
    </p>
    <?php } ?>
</div>

</body>

</html>
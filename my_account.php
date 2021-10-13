<?php 
    session_start();
    include('includes/db_connect.php');
    include('includes/functions.php');
    $user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php'); ?>

<main>
<h1>Hello, you are logged in as: <?php echo $user_data['userEmail']; ?></h1>

<a href="public/logout.php">Log out</a>
</main>


</body>

</html>
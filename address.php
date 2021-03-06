<?php include('includes/account/addressScript.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php'); ?>

<main>
    <h1>Hello, you are logged in as: <?php echo $user_data['userEmail']; ?></h1>
    <?php
    if ($user_data['userType'] === '1') {
        echo "<a href='admin/admin_panel.php' style='color: white; background-color: black; padding: 1em; text-decoration: none;'>ADMIN PANEL</a>";
    }
    ?>
    <a href="includes/user/logout.php" style="color: black; font-size: 2em;">Log out</a>
</main>

<div class="section">
    <h2 style="text-align: center; margin-top: 2em; font-size: 3em;">Your address:</h2> <br>
    <p style='text-align: center; font-size: 2em;'>Create New Address. <br> Fill out form:</p>
    <div style="display: flex;">
        <form action="<?php echo $_SERVER['PHP_SELF'].'?'.$id_to_create; ?>" method="POST">
            <input type="text" placeholder="First Name" name="firstName" style="width: 360px;" required>
            <input type="text" placeholder="Last Name" name="lastName" style="width: 360px;" required>
            <br>
            <input type="tel" pattern="^[0-9-+\s()]*$" placeholder="Phone +xxxxxxxxx" name="phoneNum" style="width: 360px;" required>
            <input type="street" placeholder="Street Name" name="streetName" style="width: 300px;" required>
            <input type="text" placeholder="Street Number" name="streetNum" style="width: 300px;" required>
            <br>
            <input type="number" placeholder="Postal Code: xxxxx" name="postalCode" style="width: 300px;" required>
            <input type="city" placeholder="City" name="city" style="width: 300px;" required>
            <select type="country" name="country" id="country" style="width: 300px;" required>
                <option value="Denmark">Denmark</option>
                <option value="France">France</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Germany">Germany</option>
                <option value="Italy">Italy</option>
            </select>
            <br>
            <input type="reset" name="reset" value="Reset Form" style="color: red; border: none;">
            <input type="submit" name="create" value="Create Address" style="color: white; background-color: blue;">
        </form>
    </div>
</div>

</body>

</html>
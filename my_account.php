<?php include('includes/account/updateAddress.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php require('public/header.php'); ?>

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

    <?php
    if ($addCheck['customerForeign'] !== NULL) {
        echo "<p style='text-align: center; font-size: 2em;'>This is your currently used address. <br>
        If you would like to edit it change inserted values and press Update Address.</p>";
    } else {
        echo "<p style='text-align: center; font-size: 2em;'>You have no address yet. <br>
        Create one now by clicking here otherwise you won't be able to check out:</p>";
        echo "<div style='display: flex; margin-top: 3em;'><a href='address.php?$currentUserID' 
        style='text-align: center; color: white; background-color: black; font-size: 2em; text-decoration: none; padding: 0.7em;'>ADD ADDRESS</a></div>";
    }
    ?>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <div style="display: flex;">
        <form action="<?php echo $_SERVER['PHP_SELF'] . "?" . $user_to_update ?>" method="POST">
            <input type="text" placeholder="First Name" name="firstNameU" style="width: 360px;" value="<?php echo $row['firstName'] ?>" required>
            <input type="text" placeholder="Last Name" name="lastNameU" style="width: 360px;" value="<?php echo $row['lastName'] ?>" required>
            <br>
            <input type="tel" pattern="^[0-9-+\s()]*$" placeholder="Phone +xxxxxxxxx" name="phoneNumU" style="width: 360px;" value="<?php echo $row['phoneNum'] ?>" required>
            <input type="street" placeholder="Street Name" name="streetNameU" style="width: 300px;" value="<?php echo $row['streetName'] ?>"  required>
            <input type="text" placeholder="Street Number" name="streetNumU" style="width: 300px;" value="<?php echo $row['streetNum'] ?>"  required>
            <br>
            <input type="number" placeholder="Postal Code: xxxxx" name="postalCodeU" style="width: 300px;" value="<?php echo $row['postalCode'] ?>" required>
            <input type="city" placeholder="City" name="cityU" style="width: 300px;" value="<?php echo $row['city'] ?>" required>
            <select type="country" name="countryU" id="countryU" style="width: 300px;"  required>
                <option value="<?php echo $row['country'] ?>"><?php echo $row['country'] ?></option>
                <option value="France">France</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Denmark">Denmark</option>
                <option value="Germany">Germany</option>
                <option value="Italy">Italy</option>
            </select>
            <br>
            <input type="reset" name="clear" value="Clear Fields" style="color: white; background-color: red; float: left; border: none; width: 300px;">
            <input type="submit" name="update" value="Update Address" style="color: white; background-color: blue; float: right;">
        </form>
    </div>
    <?php } ?>

</div>


</body>

</html>
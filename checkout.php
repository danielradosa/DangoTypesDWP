<?php include('includes/account/checkoutScript.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php'); ?>

<h1 style='padding-top: 2em; padding-bottom: .3em; text-align: center; font-size: 4.1vw;'>ORDER BELOW</h1>
<h2 style='text-align: center; font-size: 1.9vw;'>Your address:</h2>

<?php while ($row = $result->fetch_assoc()) { ?>
    
<div class="section">
<div style="display: flex;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" placeholder="First Name" name="orderNameA" style="width: 360px;" value="<?php echo $row['firstName']; ?>" required>
        <input type="text" placeholder="Last Name" name="orderLastNameA" style="width: 360px;" value="<?php echo $row['lastName']; ?>" required>
        <?php while ($row2 = $result2->fetch_assoc()) { ?>
        <input type="text" placeholder="Your E-mail" name="orderMailA" style="width: 360px;" value="<?php echo $row2['userEmail']; ?>" required>
        <?php } ?>
        <br>
        <input type="tel" pattern="^[0-9-+\s()]*$" placeholder="Phone +xxxxxxxxx" name="orderPhoneNumA" style="width: 360px;" value="<?php echo $row['phoneNum']; ?>" required>
        <input type="street" placeholder="Street Name" name="orderStreetNameA" style="width: 300px;" value="<?php echo $row['streetName']; ?>" required>
        <input type="text" placeholder="Street Number" name="orderStreetNumA" style="width: 300px;" value="<?php echo $row['streetNum']; ?>" required>
        <br>
        <input type="number" placeholder="Postal Code: xxxxx" name="orderPostalCodeA" style="width: 300px;" value="<?php echo $row['postalCode']; ?>" required>
        <input type="city" placeholder="City" name="orderCityA" style="width: 300px;" value="<?php echo $row['city']; ?>" required>
        <select type="country" name="orderCountryA" id="country" style="width: 300px;"  required>
            <option value="<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
        </select>
        <br>
        <input type="submit" name="order" value="Order Now" style="color: white; background-color: blue; display: flex; justify-content: center;">
    </form>
    </div>
</div>

<?php } ?>

</body>

</html>
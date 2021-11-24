<?php
if (!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');

$userAdd = $_SESSION['userID'];

$sql = "SELECT * FROM address WHERE addrID = $userAdd";
$result = $conn->query($sql);
$sql2 = "SELECT userEmail FROM `user` WHERE userID = $userAdd";
$result2 = $conn->query($sql2);

if (isset($_POST["order"])) {
    if (empty($_POST['orderNameA'])) {
        echo "First name is required";
    }
    if (empty($_POST['orderLastNameA'])) {
        echo "Last name is required";
    }
    if (empty($_POST['orderMailA'])) {
        echo "Mail is required";
    }
    if (empty($_POST['orderPhoneNumA'])) {
        echo "Phone is required";
    }
    if (empty($_POST['orderStreetNameA'])) {
        echo "Street name is required";
    }
    if (empty($_POST['orderStreetNumA'])) {
        echo "Street number is required";
    }
    if (empty($_POST['orderPostalCodeA'])) {
        echo "Postal code is required";
    }
    if (empty($_POST['orderCityA'])) {
        echo "City is required";
    } 
    if (!empty($_POST['orderNameA']) && !empty($_POST['orderLastNameA']) && !empty($_POST['orderMailA']) && !empty($_POST['orderPhoneNumA']) && !empty($_POST['orderStreetNameA']) 
    && !empty($_POST['orderStreetNumA']) && !empty($_POST['orderPostalCodeA']) && !empty($_POST['orderCityA']) && !empty($_POST['orderCountryA'])) {
        $orderMail = mysqli_real_escape_string($conn, $_POST['orderMailA']);
        $orderName = mysqli_real_escape_string($conn, $_POST['orderNameA']);
        $orderLastName = mysqli_real_escape_string($conn, $_POST['orderLastNameA']);
        $orderPhoneNum = mysqli_real_escape_string($conn, $_POST['orderPhoneNumA']);
        $orderStreetName = mysqli_real_escape_string($conn, $_POST['orderStreetNameA']);
        $orderStreetNum = mysqli_real_escape_string($conn, $_POST['orderStreetNumA']);
        $orderCountry = mysqli_real_escape_string($conn, $_POST['orderCountryA']);
        $orderCity = mysqli_real_escape_string($conn, $_POST['orderCityA']);
        $orderPostalCode = mysqli_real_escape_string($conn, $_POST['orderPostalCodeA']);
        $order_number = rand(1000, 9999);
        $priceToPay = $_SERVER['QUERY_STRING'];
        $defaultStatus = 'accepted';
        $itemsOrdered = $_SESSION['cart'];

        $sqlOrder = "INSERT INTO `order`(orderItems, orderMail, orderName, orderLastName, orderPhoneNum, orderStreetName, orderStreetNum, orderCountry, orderCity, orderPostalCode, orderNumber, orderPrice, orderStatus) 
                VALUES ('$itemsOrdered', '$orderMail', '$orderName', '$orderLastName', '$orderPhoneNum', '$orderStreetName', '$orderStreetNum', '$orderCountry, '$orderCity', '$orderPostalCode', '$order_number', '$priceToPay', '$defaultStatus')";
        if (mysqli_query($conn, $sqlOrder)) {
            header('Location: ?succesfully ordered');
        } else {
            echo 'query error: ' . mysqli_errno($conn);
        }
        header("Location: ?order $order_number complete");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php'); ?>

<h1 style='padding-top: 2em; padding-bottom: .3em; text-align: center; font-size: 4.1vw;'>ORDER BELOW</h1>
<h2 style='text-align: center; font-size: 1.9vw;'>Fill Out Your Address</h2>

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
        <select type="country" name="orderCountryA" id="country" style="width: 300px;"  required disabled>
            <option value="<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
        </select>
        <br>
        <input type="reset" name="reset" value="Reset Form" style="color: red; border: none; cursor: pointer;">
        <input type="submit" name="order" value="Order Now" style="color: white; background-color: blue;">
    </form>
    </div>
</div>
<?php } ?>


</body>

</html>
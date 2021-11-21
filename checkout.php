<?php
if (!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');

$priceToPay = $_SERVER['QUERY_STRING'];
$itemsOrdered = $_SESSION['cart'];
$userAdd = $_SESSION['userID'];

$sql = "SELECT * FROM address WHERE addrID = $userAdd";
$result = $conn->query($sql);
$sql2 = "SELECT userEmail FROM `user` WHERE userID = $userAdd";
$result2 = $conn->query($sql2);

if (isset($_POST["order"])) {
    if (empty($_POST['orderName'])) {
        echo "First name is required";
    }
    if (empty($_POST['orderLastName'])) {
        echo "Last name is required";
    }
    if (empty($_POST['orderMail'])) {
        echo "Mail is required";
    }
    if (empty($_POST['orderPhoneNum'])) {
        echo "Phone is required";
    }
    if (empty($_POST['orderStreetName'])) {
        echo "Street name is required";
    }
    if (empty($_POST['orderStreetNum'])) {
        echo "Street number is required";
    }
    if (empty($_POST['orderPostalCode'])) {
        echo "Postal code is required";
    }
    if (empty($_POST['orderCity'])) {
        echo "City is required";
    } 
    if (!empty($_POST['orderName']) && !empty($_POST['orderLastName']) && !empty($_POST['orderMail']) && !empty($_POST['orderPhoneNum']) && !empty($_POST['orderStreetName']) 
    && !empty($_POST['orderStreetNum']) && !empty($_POST['orderPostalCode']) && !empty($_POST['orderCity']) && !empty($_POST['orderCountry'])) {
        $orderMail = mysqli_real_escape_string($conn, $_POST['orderMail']);
        $orderName = mysqli_real_escape_string($conn, $_POST['orderName']);
        $orderLastName = mysqli_real_escape_string($conn, $_POST['orderLastName']);
        $orderPhoneNum = mysqli_real_escape_string($conn, $_POST['orderPhoneNum']);
        $orderStreetName = mysqli_real_escape_string($conn, $_POST['orderStreetName']);
        $orderStreetNum = mysqli_real_escape_string($conn, $_POST['orderStreetNum']);
        $orderCountry = mysqli_real_escape_string($conn, $_POST['orderCountry']);
        $orderCity = mysqli_real_escape_string($conn, $_POST['orderCity']);
        $orderPostalCode = mysqli_real_escape_string($conn, $_POST['orderPostalCode']);
        $order_number = rand(1000, 9999);

        $sql = "INSERT INTO `order`(orderMail, orderName, orderLastName, orderPhoneNum, orderStreetName, orderStreetNum, orderCountry, orderCity, orderPostalCode, orderNumber, orderPrice) 
                VALUES ('$orderMail', '$orderName', '$orderLastName', '$orderPhoneNum', '$orderStreetName', '$orderStreetNum', '$orderCountry, '$orderCity', '$orderPostalCode', '$order_number', '$priceToPay')";
        if (mysqli_query($conn, $sql)) {
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
    <form action="" method="POST">
        <input type="text" placeholder="First Name" name="orderName" style="width: 360px;" value="<?php echo $row['firstName']; ?>" required>
        <input type="text" placeholder="Last Name" name="orderLastName" style="width: 360px;" value="<?php echo $row['lastName']; ?>" required>
        <?php while ($row2 = $result2->fetch_assoc()) { ?>
        <input type="text" placeholder="Your E-mail" name="orderMail" style="width: 360px;" value="<?php echo $row2['userEmail']; ?>" required>
        <?php } ?>
        <br>
        <input type="tel" pattern="^[0-9-+\s()]*$" placeholder="Phone +xxxxxxxxx" name="orderPhoneNum" style="width: 360px;" value="<?php echo $row['phoneNum']; ?>" required>
        <input type="street" placeholder="Street Name" name="orderStreetName" style="width: 300px;" value="<?php echo $row['streetName']; ?>" required>
        <input type="text" placeholder="Street Number" name="orderStreetNum" style="width: 300px;" value="<?php echo $row['streetNum']; ?>" required>
        <br>
        <input type="number" placeholder="Postal Code: xxxxx" name="orderPostalCode" style="width: 300px;" value="<?php echo $row['postalCode']; ?>" required>
        <input type="city" placeholder="City" name="orderCity" style="width: 300px;" value="<?php echo $row['city']; ?>" required>
        <select type="country" name="orderCountry" id="country" style="width: 300px;"  required disabled>
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
<?php
if(!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');
include('includes/functions.php');
$user_data = check_login($conn);
$currentUserID = $user_data['userID'];

$query = "SELECT * FROM `address` WHERE customerForeign = $currentUserID";
$result = $conn->query($query);
$addRes = $conn->query($query);
$addCheck = mysqli_fetch_assoc($addRes);

$user_to_update = $_SERVER['QUERY_STRING'];
$sql = "SELECT * FROM `address` WHERE addrID = $user_to_update"; 
$resultTwo = $conn->query($sql);

if (isset($_POST['update'])) {
    if (!empty($_POST['firstNameU']) && !empty($_POST['lastNameU']) && !empty($_POST['phoneNumU']) && !empty($_POST['streetNameU']) && !empty($_POST['streetNumU']) && !empty($_POST['postalCodeU']) && !empty($_POST['countryU']) && !empty($_POST['cityU'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstNameU']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastNameU']);
        $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNumU']);
        $streetName = mysqli_real_escape_string($conn, $_POST['streetNameU']);
        $streetNum = mysqli_real_escape_string($conn, $_POST['streetNumU']);
        $postalCode = mysqli_real_escape_string($conn, $_POST['postalCodeU']);
        $city = mysqli_real_escape_string($conn, $_POST['cityU']);
        $country = mysqli_real_escape_string($conn, $_POST['countryU']);

        $updateQuery = "UPDATE `address` SET `firstName` = '$firstName', `lastName` = '$lastName', `phoneNum` = '$phoneNum', `streetName` = '$streetName', `streetNum` = '$streetNum', `country` = '$country', `city` = '$city', `postalCode` = '$postalCode' 
        WHERE `customerForeign` = $currentUserID";

        $updateResult = mysqli_query($conn, $updateQuery);
        if ($updateResult) {
            header('Location: ?succesfully updated');
        } else {
            echo 'query error: ' . mysqli_errno($conn);
        }
        header("Location: account.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('public/header.php'); ?>

<main>
    <h1>Hello, you are logged in as: <?php echo $user_data['userEmail']; ?></h1>

    <?php

    if ($user_data['userType'] === '1') {
        echo "<a href='admin_panel.php' style='color: white; background-color: black; padding: 1em; text-decoration: none;'>ADMIN PANEL</a>";
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
    } else if ($user_data['addressForeign'] === NULL) {
        echo "<p style='text-align: center; font-size: 2em;'>You have no address yet. <br>
        Create one now by clicking here:</p>";
        echo "<div style='display: flex; margin-top: 3em;'><a href='includes/user/create_address.php?$currentUserID' 
        style='text-align: center; color: white; background-color: black; font-size: 2em; text-decoration: none; padding: 0.7em;'>ADD ADDRESS</a></div>";
    }
    ?>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <div style="display: flex;">
        <form action="<?php echo $_SERVER['PHP_SELF'] . "?" . $user_to_update ?>" method="POST">
            <input type="text" placeholder="First Name" name="firstNameU" style="width: 360px;" value="<?php echo $row['firstName'] ?>" required>
            <input type="text" placeholder="Last Name" name="lastNameU" style="width: 360px;" value="<?php echo $row['lastName'] ?>" required>
            <br>
            <input type="tel" pattern="^[0-9-+\s()]*$" placeholder="Phone +xxxxxxxxx" name="phoneNum" style="width: 360px;" value="<?php echo $row['phoneNum'] ?>" required>
            <input type="street" placeholder="Street Name" name="streetNameU" style="width: 300px;" value="<?php echo $row['streetName'] ?>"  required>
            <input type="text" placeholder="Street Number" name="streetNumU" style="width: 300px;" value="<?php echo $row['streetNum'] ?>"  required>
            <br>
            <input type="number" placeholder="Postal Code: xxxxx" name="postalCodeU" style="width: 300px;" value="<?php echo $row['postalCode'] ?>" required>
            <input type="city" placeholder="City" name="cityU" style="width: 300px;" value="<?php echo $row['city'] ?>" required>
            <select type="country" name="countryU" id="countryU" style="width: 300px;"  required>
                <option value="<?php echo $row['country'] ?>"><?php echo $row['country'] ?></option>
                <option value="France">France</option>
                <option value="France">Slovakia</option>
                <option value="France">Denmark</option>
                <option value="France">Germany</option>
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
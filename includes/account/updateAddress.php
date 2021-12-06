<?php
if(!isset($_SESSION)) 
{ 
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

        $updateQuery = $conn->prepare("UPDATE `address` SET `firstName` = ?, `lastName` = ?, `phoneNum` = ?, 
        `streetName` = ?, `streetNum` = ?, `country` = ?, `city` = ?, `postalCode` = ? WHERE `customerForeign` = ?");
        $updateQuery->bind_param('sssssssii', $firstName, $lastName, $phoneNum, $streetName, $streetNum, $country, $city, $postalCode, $currentUserID);
        $updateQuery->execute();
        header("Location: ?succesfully updated.php");
        die;
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}
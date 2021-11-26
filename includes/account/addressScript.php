<?php
session_start();
include('includes/db_connect.php');
include('includes/functions.php');
$user_data = check_login($conn);
$id_to_create = $_SERVER['QUERY_STRING'];

if (isset($_POST['create'])) {
    if (empty($_POST['firstName'])) {
        echo "First name is required";
    }
    if (empty($_POST['lastName'])) {
        echo "Last name is required";
    }
    if (empty($_POST['phoneNum'])) {
        echo "Phone is required";
    }
    if (empty($_POST['streetName'])) {
        echo "Street name is required";
    }
    if (empty($_POST['streetNum'])) {
        echo "Street number is required";
    }
    if (empty($_POST['city'])) {
        echo "City is required";
    }
    if (empty($_POST['postalCode'])) {
        echo "Postal code is required";
    }
    if (empty($_POST['country'])) {
        echo "Choosing country is required";
    }
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['phoneNum']) && !empty($_POST['streetName']) && !empty($_POST['streetNum']) && !empty($_POST['postalCode']) && !empty($_POST['country']) && !empty($_POST['city'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);
        $streetName = mysqli_real_escape_string($conn, $_POST['streetName']);
        $streetNum = mysqli_real_escape_string($conn, $_POST['streetNum']);
        $postalCode = mysqli_real_escape_string($conn, $_POST['postalCode']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);

        $sql = $conn->prepare("INSERT INTO address(firstName, lastName, phoneNum, streetName, streetNum, country, city, postalCode, customerForeign) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('sssssssii', $firstName, $lastName, $phoneNum, $streetName, $streetNum, $country, $city, $postalCode, $id_to_create);
        $sql->execute();
        header("Location: my_account.php");
        die;
    } else {
        echo 'query error: ' . mysqli_errno($conn);
    }
}

<?php
if (!isset($_SESSION)) {
    session_start();
}

include('includes/db_connect.php');
include('includes/cart/components/cartGrabber.php');

$userAdd = $_SESSION['userID'];
$cart = $_SESSION['cart'];

if (isset($_GET['total']) && isset($_GET['items'])) {
    $_SESSION['price'] = $_GET['total'];
    $_SESSION['checkout'] = $_GET['items'];
}

$chItems = $_SESSION['checkout'];
$totalPrice = '$'.$_SESSION['price'];

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
        $defaultStatus = 'accepted';
        $placedAt = date("Y-m-d H:i:s");   
        $defaultQuantity = 1;

        $orderQuery = "INSERT INTO `order`(`orderItems`, `orderMail`, `orderName`, `orderLastName`, `orderPhoneNum`, `orderStreetName`, `orderStreetNum`, `orderCountry`, `orderCity`, `orderPostalCode`, `orderNumber`, `orderPrice`, `orderStatus`, `placedAt`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sqlOrder = $conn->prepare($orderQuery);
        $sqlOrder->bind_param('sssssssssiisss', $chItems, $orderMail, $orderName, $orderLastName, $orderPhoneNum, $orderStreetName, $orderStreetNum, $orderCountry, $orderCity, $orderPostalCode, $order_number, $totalPrice, $defaultStatus, $placedAt);
        $sqlOrder->execute();

        $orderDetails = "INSERT INTO `orderDetails` (`orderDetailsProductID`, `orderDetailsQuantity`, `orderDetailsForeign`) VALUES (?, ?, ?)";
        $sqlDetails = $conn->prepare($orderDetails);
        $sqlDetails->bind_param('iii', $id, $defaultQuantity, $order_number);
        $sqlDetails->execute();

        $msg = "Hello $orderName,\nWe have received your order #$order_number\nAfter we receive your money, 
        the order will be shipped to your address: \n\n Name: $orderName $orderLastName\n Your Phone: $orderPhoneNum\n Street: $orderStreetName $orderStreetNum\n City: $orderPostalCode, $orderCity\n Country: $orderCountry
        \n\n Price to pay: $totalPrice\n Send money to this account: DK7250518331878966 and put your order number into comments of the transaction.";
        mail("$orderMail", "We accepted your order: #$order_number", $msg);

        header("Location: checkoutComplete.php?order=$order_number");

        unset($_SESSION['cart']);  
        die;
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}
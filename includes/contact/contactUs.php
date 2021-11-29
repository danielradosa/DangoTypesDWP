<?php
$fullName = $customerEmail =  $message = '';
$errors = array('fullName' => '', 'customerEmail' => '', 'message' => '');

$siteKey = ''; 
$secretKey = ''; 

if (isset($_POST['submit'])) {
    $myEmail = "danysko5@gmail.com";
    $timeStamp = date("dd/M/YY HH:i:s");
    $body = "";

    $fullName = htmlspecialchars($_POST['fullName']);
    $customerEmail = htmlspecialchars($_POST['customerEmail']);
    $chosenSubject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $body .= "From: " . $fullName . " at $timeStamp" . "\r\n";
    $body .= "Customer Email: " . $customerEmail . "\r\n";
    $body .= "Subject: " . $chosenSubject . "\r\n";
    $body .= "Message: " . $message . "\r\n";

    if (empty($fullName)) {
        $errors['fullName'] = "Full name is required. <br>";
    } else {
        if (!preg_match("/^([a-zA-Z' ]+)$/", $fullName)) {
            $errors['fullName'] = "Your name must be a valid name.";
        }
    }

    if (empty($customerEmail)) {
        $errors['customerEmail'] = "An email is required. <br>";
    } else {
        if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
            $errors['customerEmail'] = "Email must be a valid email address.";
        }
    }

    if (empty($message)) {
        $errors['message'] = "A message is required.";
    } 
    
    if(!empty($fullName) && !empty($customerEmail) && !empty($message)) {
        mail($myEmail, $chosenSubject, $body);
        header("Location: public/mail_sent.php");
    }
}


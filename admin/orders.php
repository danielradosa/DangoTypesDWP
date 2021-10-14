<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    header('location: ../home.php');
    exit;
}

?>
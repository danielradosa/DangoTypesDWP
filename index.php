<?php

session_start();
include('includes/db_connect.php');
include('includes/functions.php');

$user_data = check_login($conn);
<?php

$conn = mysqli_connect('localhost', 'root', '', 'dangotypesdb');

//check connection
if (!$conn) {
    echo 'connection error: ' . mysqli_connect_error();
}
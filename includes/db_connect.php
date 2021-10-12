<?php

$conn = mysqli_connect('localhost', 'dangotypes.admin', '4TPxJSvoSJ.39w)G', 'dangotypesdb');

//check connection
if (!$conn) {
    echo 'connection error: ' . mysqli_connect_error();
}
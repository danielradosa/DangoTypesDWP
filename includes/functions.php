<?php

function check_login($conn) {
   if (isset($_SESSION['userID'])) {
       $id = $_SESSION['userID'];
       $query = "SELECT * FROM `user` WHERE userID = '$id limit 1'";
       $result = mysqli_query($conn, $query);
       if($result && mysqli_num_rows($result) > 0) {
           $user_data = mysqli_fetch_assoc($result);
           return $user_data;
       }
   } else {
       header("Location: account.php");
       die;
   }
}
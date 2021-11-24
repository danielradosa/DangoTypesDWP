<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    header('location: ../home.php');
    exit;
}

include('../includes/db_connect.php');

$queryMe = "SELECT * FROM `messages`";
$resultMe = $conn->query($queryMe);

if (isset($_POST['update'])) {
    $companyDescription = mysqli_real_escape_string($conn, $_POST['about']);
    $contactNumber = mysqli_real_escape_string($conn, $_POST['number']);

    $sql = "UPDATE `messages` SET `companyDescription` = '$companyDescription', `contactNumber` = '$contactNumber' WHERE messageID = 1";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: ?succesfully updated');
    } else {
        echo 'query error: ' . mysqli_errno($conn);
    }
    header("Location: other.php");
}

?>

<a href="admin_panel.php">Go Back</a>
<h1>Edit Messages / Contact</h1>

<?php while ($row = $resultMe->fetch_assoc()) { ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="about">About Company</label>
    <input type="text" name="about" value="<?php echo $row['companyDescription']; ?>">
    <label for="number">Contact Number</label>
    <input type="text" name="number" value="<?php echo $row['contactNumber']; ?>">
    <input type="submit" value="update" name="update">
</form>
<?php } ?>

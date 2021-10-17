<?php

include('../includes/db_connect.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$id_to_update = $_SERVER['QUERY_STRING'];
$query = "SELECT * FROM `product` WHERE productID = $id_to_update";
$result = $conn->query($query);

if (isset($_POST['update'])) {
    if (empty($_POST['titleU'])) {
        echo "Title is required. <br>";
    }
    if (empty($_POST['priceU'])) {
        echo "Price is required. <br>";
    }
    if (empty($_POST['descriptionU'])) {
        echo "Description is required. <br>";
    }
    if (empty($_POST['colorU'])) {
        echo "Color is required. <br>";
    }
    if (empty($_POST['typeU'])) {
        echo "Type is required. <br>";
    } else {
        $title = mysqli_real_escape_string($conn, $_POST['titleU']);
        $price = mysqli_real_escape_string($conn, $_POST['priceU']);
        $description = mysqli_real_escape_string($conn, $_POST['descriptionU']);
        $caseMaterial = mysqli_real_escape_string($conn, $_POST['caseMaterialU']);
        $plateMaterial = mysqli_real_escape_string($conn, $_POST['plateMaterialU']);
        $color = mysqli_real_escape_string($conn, $_POST['colorU']);
        $switches = mysqli_real_escape_string($conn, $_POST['switchesU']);
        $type = mysqli_real_escape_string($conn, $_POST['typeU']);
        $accessories = mysqli_real_escape_string($conn, $_POST['accessoriesU']);

        $filename = $_FILES['imageU']['name'];
        $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES["imageU"]["tmp_name"], '../database/product-images/' . $filename)) {
                echo "image uploaded";
                header("Location: products.php");
            } else {
                echo "error";
            }
        }

        $sql = "UPDATE `product` SET `title` = '$title', `price` = '$price', `description` = '$description', `caseMaterial` = '$caseMaterial', `plateMaterial` = '$plateMaterial', 
        `color` = '$color', `switches` = '$switches', `type` = '$type', `accessories` = '$accessories', `productImage` = '$filename'  WHERE productID = '$id_to_update'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: ?succesfully updated');
        } else {
            echo 'query error: ' . mysqli_errno($conn);
        }

        header("Location: products.php");
    }
}

?>

<!DOCTYPE html>
<html lang='en'>

<h2>Update a product with ID: <?php echo $id_to_update; ?></h2>

<?php while ($row = $result->fetch_assoc()) { ?>
<form action='<?php echo $_SERVER['PHP_SELF'] . "?" . $id_to_update ?>' method='POST' enctype='multipart/form-data'>
    <label for='title'>Title</label>
    <input type='text' name='titleU' value="<?php echo  $row['title'] ?>"> <br> <br>

    <label for='price'>Price</label>
    <input type='number' name='priceU' value="<?php echo  $row['price'] ?>"> <br> <br>

    <label for='description'>Description</label>
    <input type='text' name='descriptionU' value="<?php echo  $row['description'] ?>"> <br> <br>

    <label for='case'>Case Material</label>
    <input type='text' name='caseMaterialU' value="<?php echo  $row['caseMaterial'] ?>"> <br> <br>

    <label for='plate'>Plate Material</label>
    <input type='text' name='plateMaterialU' value="<?php echo  $row['plateMaterial'] ?>"> <br> <br>

    <label for='color'>Color</label>
    <input type='text' name='colorU' value="<?php echo  $row['color'] ?>"> <br> <br>

    <label for='switches'>Switches</label>
    <input type='text' name='switchesU' value="<?php echo  $row['switches'] ?>"> <br> <br>

    <label for='type'>Type</label>
    <input type='text' name='typeU' value="<?php echo  $row['type'] ?>"> <br> <br>

    <label for='accessories'>Accessories</label>
    <input type='text' name='accessoriesU' value="<?php echo  $row['accessories'] ?>"> <br> <br>

    <label for='image'>Add image</label>
    <input type='file' name='imageU' />

    <input type='submit' name='update' value='Update'>
</form>
<?php } ?>

</html>
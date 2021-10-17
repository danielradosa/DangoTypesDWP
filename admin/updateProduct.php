<?php

include('../includes/db_connect.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$id_to_update = $_SERVER['QUERY_STRING'];
$sql = "SELECT * FROM `product` WHERE productID = $id_to_update";
$result = $conn->query($sql);

if (isset($_POST['update'])) {
    $title = $price = $description = $color = $type = '';
    $errors = array('title' => '', 'price' => '', 'description' => '', 'color' => '', 'type' => '');

    if (empty($_POST['title'])) {
        $errors['title'] = "A title is required <br>";
    }
    if (empty($_POST['price'])) {
        $errors['price'] = "A price is required <br>";
    }
    if (empty($_POST['description'])) {
        $errors['description'] = "A description is required <br>";
    }
    if (empty($_POST['color'])) {
        $errors['color'] = "A color is required <br>";
    }
    if (empty($_POST['type'])) {
        $errors['type'] = "A type is required <br>";
    }

    if (array_filter($errors)) {
    } else {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $caseMaterial = mysqli_real_escape_string($conn, $_POST['caseMaterial']);
        $plateMaterial = mysqli_real_escape_string($conn, $_POST['plateMaterial']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $switches = mysqli_real_escape_string($conn, $_POST['switches']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $accessories = mysqli_real_escape_string($conn, $_POST['accessories']);

        $filename = $_FILES['image']['name'];
        $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], '../database/product-images/' . $filename)) {
                echo "image uploaded";
                header("Location: products.php");
            } else {
                echo "error";
            }
        }

        $sql = "UPDATE product SET title = '$title', price = '$price', description = '$description', caseMaterial = '$caseMaterial', plateMaterial = '$plateMaterial', 
                color = '$color', switches = '$switches', `type` = '$type', accessories = '$accessories' WHERE productID = '$id_to_update'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: ?succesfully updated');
        } else {
            echo 'query error: ' . mysqli_errno($conn);
        }
        
    }
}

?>

<!DOCTYPE html>
<html lang='en'>
<?php while ($row = $result->fetch_assoc()) { ?>
    <section>
        <h2>Update a product with ID: <?php echo $id_to_update; ?></h2>
        <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST' enctype='multipart/form-data'>
            <label for='title'>Title</label>
            <input type='text' name='title' value="<?php echo $row['title'] ?>"> <br> <br>

            <label for='price'>Price</label>
            <input type='number' name='price' value="<?php echo $row['price'] ?>"> <br> <br>

            <label for='description'>Description</label>
            <input type='text' name='description' value="<?php echo $row['description'] ?>"> <br> <br>

            <label for='case'>Case Material</label>
            <input type='text' name='caseMaterial' value="<?php echo $row['caseMaterial'] ?>"> <br> <br>

            <label for='plate'>Plate Material</label>
            <input type='text' name='plateMaterial' value="<?php echo $row['plateMaterial'] ?>"> <br> <br>

            <label for='color'>Color</label>
            <input type='text' name='color' value="<?php echo $row['color'] ?>"> <br> <br>

            <label for='switches'>Switches</label>
            <input type='text' name='switches' value="<?php echo $row['switches'] ?>"> <br> <br>

            <label for='type'>Type</label>
            <input type='text' name='type' value="<?php echo $row['type'] ?>"> <br> <br>

            <label for='accessories'>Accessories</label>
            <input type='text' name='accessories' value="<?php echo $row['accessories'] ?>"> <br> <br>

            <label for='image'>Add image</label>
            <input type='file' name='image' />

            <input type='submit' name='update' value='Update'>
        </form>
    </section>
<?php } ?>
</html>
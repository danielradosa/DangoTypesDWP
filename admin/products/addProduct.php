<?php

include('../../includes/db_connect.php');

$title = $price = $description = $color = $type = '';
$errors = array('title' => '', 'price' => '', 'description' => '', 'color' => '', 'type' => '');

if (isset($_POST['submit'])) {

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
        $stock = 100;

        $filename = $_FILES['image']['name'];
        $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], '../../database/product-images/' . $filename)) {
                echo "image uploaded";
                header("Location: products.php");
            } else {
                echo "error";
            }
        }

        $sql = $conn->prepare("INSERT INTO `product` (title, price, description, caseMaterial, plateMaterial, color, switches, `type`, accessories, productImage, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('sisssssssbi', $title, $price, $description, $caseMaterial, $plateMaterial, $color, $switches, $type, $accessories, $filename, $stock);
        $sql->execute();
        header('Locaiton: ?succesfully added');
        echo $title;

        echo 'query error: ' . mysqli_errno($conn);
        header("Location: products.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<section>
    <h2>Add a new product</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title"> <br> <br>

        <label for="title">Price</label>
        <input type="number" name="price"> <br> <br>

        <label for="description">Description</label>
        <input type="text" name="description"> <br> <br>

        <label for="case">Case Material</label>
        <input type="text" name="caseMaterial"> <br> <br>

        <label for="plate">Plate Material</label>
        <input type="text" name="plateMaterial"> <br> <br>

        <label for="color">Color</label>
        <input type="text" name="color"> <br> <br>

        <label for="switches">Switches</label>
        <input type="text" name="switches"> <br> <br>

        <label for="type">Type</label>
        <input type="text" name="type"> <br> <br>

        <label for="accessories">Accessories</label>
        <input type="text" name="accessories"> <br> <br>

        <label for="image">Add image</label>
        <input type="file" name="image" value="" />

        <input type="submit" name="submit" value="Add">
    </form>
</section>

</html>
<?php

include ('../includes/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM product WHERE productID = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header("Location: ?deleted successfully");
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    header("Location: products.php");
}

if (isset($_POST['update'])) {
    $id_to_update = mysqli_real_escape_string($conn, $_POST['id_to_update']);

    $sql = "SELECT FROM product WHERE productID = $id_to_update";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<section>
    <h2>Update a product</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title"> <br> <br>

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

        <input type="submit" name="update" value="Update">
    </form>
</section>


</html>
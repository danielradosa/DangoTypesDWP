<?php

include('../../includes/db_connect.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$sql = "SELECT * FROM `product`";
$result = $conn->query($sql);

?>

<html>

<head>
    <script src="https://kit.fontawesome.com/496d8d4e8f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../products.css">
    <title>Product Admin View</title>
</head>

<body>
    <h1>All Products</h1>
    <span><a href="../admin_panel.php"> <i class="fas fa-chevron-left"></i> BACK TO ADMIN PANEL</a></span><br>
    <span><a href="addProduct.php">CREATE A NEW PRODUCT <i class="fas fa-chevron-right"></i></a></span>

    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Case Material</th>
                <th scope="col">Plate Material</th>
                <th scope="col">Color</th>
                <th scope="col">Switches</th>
                <th scope="col">Type</th>
                <th scope="col">Accesories</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td style="font-weight: bold;">#<?php echo $row['productID'] ?></td>
                    <td><?php echo  $row['title'] ?></td>
                    <td>$<?php echo  $row['price'] ?></td>
                    <td><?php echo  $row['description'] ?></td>
                    <td><?php echo  $row['caseMaterial'] ?></td>
                    <td><?php echo  $row['plateMaterial'] ?></td>
                    <td><?php echo  $row['color'] ?></td>
                    <td><?php echo  $row['switches'] ?></td>
                    <td><?php echo  $row['type'] ?></td>
                    <td><?php echo  $row['accessories'] ?></td>
                    <td>
                        <?php
                        echo "<img src=" . '../../database/product-images/' . $row['productImage'] . " style='width: 30%;' />";
                        ?>
                    </td>
                    <td>
                        <span style="font-size: 1.3em;">Product ID: <?php echo $row['productID'] . " "; ?></span>
                        <form action="deleteProduct.php" method="POST">
                            <div class="edit">
                            <input type="hidden" name="id_to_delete" value="<?php echo $row['productID']; ?>">
                            <input type="hidden" name="id_to_update" value="<?php echo $row['productID']; ?>">
                            <input type="submit" name="update" value="Update" style="color: blue;">
                            <input type="submit" name="delete" value="Delete" style="color: red;">
                            </div>
                        </form> <br>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
<?php

include('../includes/db_connect.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$sql = "SELECT * FROM `product`";
$result = $conn->query($sql);

?>

<html>

<head>
    <title>Product Admin View</title>
</head>

<style>
span a {
    color: black;
    text-decoration: none;
    border: 1px solid black;
    text-align: center;
    padding: 1em;
    margin: 3em;
    display: block;
    width: 300px;
    margin: 0 auto;
    font-weight: bold;
}

span a:hover {
    color: white;
    background-color: black;
}

table, td, th {
  border: 1px solid black;
  padding: 1em;
  text-align: center;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 3em;
}

h1 {
    text-align: center;
    margin-top: 3em;
}
</style>

<body>
    <h1>All Products</h1>
    <span><a href="../admin_panel.php">BACK TO ADMIN PANEL</a></span>

    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Case Material</th>
                <th scope="col">Plate Material</th>
                <th scope="col">Color</th>
                <th scope="col">Switches</th>
                <th scope="col">Type</th>
                <th scope="col">Accesories</th>
                <th scope="col">Change</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                
                    <td><?php echo $row['productID'] ?></td>
                    <td><?php echo  $row['title'] ?></td>
                    <td><?php echo  $row['description'] ?></td>
                    <td><?php echo  $row['caseMaterial'] ?></td>
                    <td><?php echo  $row['plateMaterial'] ?></td>
                    <td><?php echo  $row['color'] ?></td>
                    <td><?php echo  $row['switches'] ?></td>
                    <td><?php echo  $row['type'] ?></td>
                    <td><?php echo  $row['accesories'] ?></td>
                    <td>
                        <a href="updateUser.php?Id=<?php echo $row['productID'] ?>" >Update</a>
                        <a href="delete.php?delete=<?php echo $row['productID'] ?>" style="color: red;">Delete</a>
                    </td>
               
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
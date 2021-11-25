<?php
include('../../includes/db_connect.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

$sql = "SELECT * FROM `order`";
$result = $conn->query($sql);
?>

<html>

<head>
    <script src="https://kit.fontawesome.com/496d8d4e8f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../products.css">
    <title>Product Admin View</title>
</head>

<body>
    <h1>All Orders</h1>
    <span><a href="../admin_panel.php"> <i class="fas fa-chevron-left"></i> BACK TO ADMIN PANEL</a></span><br>

    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Items Ordered</th>
                <th scope="col">Customer Mail</th>
                <th scope="col">Customer Last Name</th>
                <th scope="col">Customer Phone</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td style="font-weight: bold;"><?php echo $row['orderNumber'] ?></td>
                    <td><?php echo  $row['orderItems'] ?></td>
                    <td><?php echo  $row['orderMail'] ?></td>
                    <td><?php echo  $row['orderLastName'] ?></td>
                    <td><?php echo  $row['orderPhoneNum'] ?></td>
                    <td><?php echo  $row['orderPrice'] ?></td>
                    <td>
                        <span style="font-size: 1.3em;">Order ID: <?php echo $row['orderID'] . " "; ?></span>
                        <form action="deleteOrder.php" method="POST">
                            <div class="edit">
                            <input type="hidden" name="id_to_delete" value="<?php echo $row['orderID']; ?>">
                            <input type="hidden" name="id_to_update" value="<?php echo $row['orderID']; ?>">
                            <input type="submit" name="delete" value="Cancel" style="color: red;">
                            </div>
                        </form> <br>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
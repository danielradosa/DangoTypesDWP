<?php
$page_query = "SELECT * FROM `product` ORDER BY `dateCreated` DESC";
$page_result = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $product_per_page);
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=" . $i . "' style='text-decoration: none; color: blue;'>" . $i . " " . "</a>";
}


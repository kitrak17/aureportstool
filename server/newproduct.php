<?php
include("config.php");
$new_prod = mysqli_query($con,"SELECT products.product, count(indialm.id) as counts FROM `products`
LEFT JOIN indialm ON indialm.target_product LIKE concat('%',products.product,'%')
WHERE indialm.int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."' "); 
$rows = mysqli_fetch_all($new_prod);
array_unshift($rows, array("SMB", ""));
echo json_encode($rows);
?>
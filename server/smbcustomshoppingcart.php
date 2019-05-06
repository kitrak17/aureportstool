<?php
include("config.php");
$new_prod = mysqli_query($con,"SELECT 
	CASE WHEN shopping_cart = 'Custom' THEN 'Custom' ELSE 'Shopping Cart' END AS shopping_cart
	,count(aucases.id) as counts FROM `aucases`
WHERE int_stage LIKE '%complete%'
AND lts_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
GROUP BY aucases.shopping_cart LIKE '%custom%',
aucases.shopping_cart NOT LIKE '%custom%'"); 
$rows = mysqli_fetch_all($new_prod);
array_unshift($rows, array("Shopping Carts", "No. of Shopping Carts"));
echo json_encode($rows);
?>
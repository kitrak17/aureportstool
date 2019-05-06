<?php
include("config.php");
$new_prod = mysqli_query($con,"SELECT shopping_cart,count(aucases.id) as counts FROM `aucases`
WHERE int_stage LIKE '%complete%'
AND lts_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
AND aucases.shopping_cart!=''
GROUP BY aucases.shopping_cart
ORDER BY counts DESC LIMIT 0,10"); 
$rows = mysqli_fetch_all($new_prod);
array_unshift($rows, array("Shopping Carts", "No. of Shopping Carts"));
echo json_encode($rows);
?>
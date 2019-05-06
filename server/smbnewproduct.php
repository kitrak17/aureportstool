<?php
include("config.php");
$new_prod = mysqli_query($con,"SELECT CASE 
	WHEN products.product = 'Subscriptions' THEN 'WPS'
	WHEN products.product = 'Smart Payment Button' THEN 'Express Checkout'  
	ELSE products.product END AS product_name, 
	count(DISTINCT aucases.id) as counts, products.group_no FROM `aucases`
INNER JOIN products WHERE 
aucases.lts_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
AND products.status != 0 
AND aucases.target_product LIKE concat('%',products.product,'%')
AND products.product !='In-Context'
AND int_stage = '6. Code Complete'
GROUP BY products.group_no
ORDER BY counts DESC, products.product ASC") or die(mysqli_error($con)); 
$rows = mysqli_fetch_all($new_prod) or die(mysqli_error($con)); 
array_unshift($rows, array("Products", "No. of LTS"));
echo json_encode($rows);
// AND products.product !='EC Recurring'
?>
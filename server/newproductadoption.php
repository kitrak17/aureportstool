<?php
include("config.php");
$new_prod = mysqli_query($con,"SELECT products.product AS product_type, count(aucases.id) as counts FROM `products`
LEFT JOIN aucases 
ON aucases.target_product LIKE concat('%',products.product,'%') OR aucases.api_used LIKE concat('%',products.product,'%')
WHERE  aucases.int_stage = '6. Code Complete' AND products.status = 2 AND
aucases.lts_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
AND aucases.int_stage = '6. Code Complete'
GROUP BY products.group_new
ORDER BY counts DESC"); 
$rows1 = mysqli_fetch_all($new_prod);

$classic = mysqli_query($con,"SELECT CASE WHEN t.product_type = 'Pro' THEN 'Classic' ELSE 'Classic' END AS prod_type, SUM(t.classic) FROM (SELECT products.product AS product_type, COUNT(aucases.int_name) as classic FROM `products`
LEFT JOIN aucases 
ON aucases.target_product LIKE concat('%',products.product,'%') AND aucases.api_used NOT LIKE concat('%',products.product,'%')
WHERE  aucases.int_stage = '6. Code Complete'  
AND aucases.lts_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
AND products.group_new = 0 
ORDER BY `aucases`.`int_name` ASC) as t"); 
$rows2 = mysqli_fetch_row($classic);

 array_push($rows1, $rows2);
 array_unshift($rows1, array("Products", "No. of LTS"));
echo json_encode($rows1);


?>
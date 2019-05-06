<?php
include("config.php");
$new_prod = mysqli_query($con,"select
  case 
    when target_product like '%ECS%' then 'ECS'
    when target_product like '%ECM%' then 'ECM'end as ecsvsecm,
  count(*) as count
from (
      select concat(' ', target_product, ' ') as target_product
      from aucases WHERE int_stage LIKE '%Code Complete%'
      AND int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
    ) T
group by ecsvsecm
HAVING ecsvsecm = 'ecs' OR ecsvsecm = 'ecm'"); 
$rows = mysqli_fetch_all($new_prod);
array_unshift($rows, array("ECS vs ECM", "No. of EC"));
echo json_encode($rows);
?>
<?php
include("config.php");
$new_prod = mysqli_query($con,"SELECT target_market, count(*) FROM indiasmb
WHERE indiasmb.int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."' 
AND opp_record_type = 'APAC Telesales'
GROUP BY target_market"); 
$rows = mysqli_fetch_all($new_prod);
array_unshift($rows, array("SMB", "No. of Cases"));
echo json_encode($rows);
?>
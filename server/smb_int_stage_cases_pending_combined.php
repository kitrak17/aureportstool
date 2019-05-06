<?php
include("config.php");
$new_prod = mysqli_query($con,"SELECT target_market, opp_record_type, count(*) FROM `indiasmb` 
	WHERE target_market in ('Both','Domestic','Global') AND ( int_stage LIKE '%accepted%' OR  int_stage LIKE '%integration%')
	AND opp_record_type IN ('APAC AM & RM Upsells', 'APAC Telesales', 'APAC SMB RM') 
	AND indiasmb.int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."' 
	GROUP by target_market,opp_record_type
	ORDER BY opp_record_type DESC"); 
$rows = mysqli_fetch_all($new_prod);
array_unshift($rows, array("All", "Type", "No. of Cases"));
echo json_encode($rows);
?>


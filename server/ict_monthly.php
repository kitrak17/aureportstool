<?php
include("config.php");
$year = explode('-', $_REQUEST['fromDate']);
$int_stage = mysqli_query($con,"SELECT LEFT(MONTHNAME(STR_TO_DATE(id, '%m')),3) AS `week`, COALESCE(n, 0) AS `counts`
     FROM (
     	SELECT id FROM weeks  WHERE id BETWEEN 
     		(SELECT MONTH(MIN(int_start_date)) FROM aucases LIMIT 1)  
     		AND  
     		(SELECT MONTH(MAX(int_start_date)) FROM aucases WHERE lts_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31'  LIMIT 1)
     	)
     week_ranges
	 LEFT JOIN (  SELECT  ROUND(AVG(datediff(lts_date, int_start_date))) as n, MONTH(lts_date) AS weeknum
               FROM aucases WHERE int_stage = '6. Code Complete' 
               AND int_health != 'Inactive'
               AND lts_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31' GROUP BY weeknum) weekly_tallies
       ON week_ranges.id = weekly_tallies.weeknum");
$rows = mysqli_fetch_all($int_stage);
//array_unshift($rows, array("Element", "Total"));
echo json_encode($rows);
?>
<?php
include("config.php");
$int_cases = mysqli_query($con,"SELECT id AS `week`, COALESCE(n, 0) AS `counts`
     FROM (SELECT id FROM weeks  WHERE id BETWEEN (SELECT WEEK(MIN(int_created_date)) FROM indialm LIMIT 1)  AND  (SELECT WEEK(MAX(int_created_date)) FROM indialm LIMIT 1))
     week_ranges
	 LEFT JOIN (  SELECT count(id) AS n, WEEK(int_created_date) AS weeknum
               FROM indialm WHERE int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
           GROUP BY weeknum) weekly_tallies
       ON week_ranges.id = weekly_tallies.weeknum"); 
$rows = mysqli_fetch_all($int_cases);

$int_cases2 = mysqli_query($con,"SELECT id AS `week`, COALESCE(n, 0) AS `counts`
     FROM (SELECT id FROM weeks  WHERE id BETWEEN (SELECT WEEK(MIN(int_created_date)) FROM indialm LIMIT 1)  AND  (SELECT WEEK(MAX(int_created_date)) FROM indialm LIMIT 1))
     week_ranges
	 LEFT JOIN (  SELECT count(id) AS n, WEEK(int_created_date) AS weeknum
               FROM indialm WHERE int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."' AND int_stage LIKE '%Code Complete%'
           GROUP BY weeknum) weekly_tallies
       ON week_ranges.id = weekly_tallies.weeknum"); 
$rows2 = mysqli_fetch_all($int_cases2);

$newArr = array();
$i = 0;
foreach($rows as $row) {
	// /echo '<pre>'; print_r($rows2); echo '</pre>';
	$newArr[] = array($row[0],$row[1],$rows2[$i][1]);
	$i++; 
}
//array_unshift($newArr, array("Element", "Total", "LTS"));
echo json_encode($newArr);
?>
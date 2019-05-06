<?php
include("config.php");
$year = explode('-', $_REQUEST['fromDate']);
$int_cases = mysqli_query($con,"SELECT LEFT(MONTHNAME(STR_TO_DATE(id, '%m')),3) AS `week`, COALESCE(n, 0) AS `counts`
     FROM (
          SELECT id FROM weeks  WHERE id BETWEEN 
            (SELECT MONTH(MIN(int_created_date)) FROM aucases WHERE int_created_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31' LIMIT 1)  
            AND  
            (SELECT MONTH(MAX(int_created_date)) FROM aucases WHERE int_created_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31' LIMIT 1)
      )
     week_ranges
	 LEFT JOIN (  SELECT count(id) AS n, MONTH(int_created_date) AS weeknum
               FROM aucases WHERE int_created_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31'
           GROUP BY weeknum) weekly_tallies
       ON week_ranges.id = weekly_tallies.weeknum"); 
$rows = mysqli_fetch_all($int_cases);

$int_cases2 = mysqli_query($con,"SELECT LEFT(MONTHNAME(STR_TO_DATE(id, '%m')),3) AS `week`, COALESCE(n, 0) AS `counts`
     FROM (
          SELECT id FROM weeks  WHERE id BETWEEN 
            (SELECT MONTH(MIN(lts_date)) FROM aucases WHERE lts_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31'  AND int_stage LIKE '%Code Complete%' LIMIT 1)  
            AND  
            (SELECT MONTH(MAX(lts_date)) FROM aucases WHERE lts_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31' AND int_stage LIKE '%Code Complete%' LIMIT 1)
      )
     week_ranges
	 LEFT JOIN (  SELECT count(id) AS n, MONTH(lts_date) AS weeknum
               FROM aucases WHERE lts_date BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31' AND int_stage LIKE '%Code Complete%'
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
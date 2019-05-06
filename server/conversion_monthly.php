<?php
include("config.php");
$year = explode('-', $_REQUEST['fromDate']);
$int_stage = mysqli_query($con,"SELECT LEFT(MONTHNAME(STR_TO_DATE(id, '%m')),3) AS `week`,  ROUND(avg)
     FROM (
          SELECT id FROM weeks  WHERE id BETWEEN 
               (SELECT MONTH(MIN(ytm)) FROM conversion WHERE ytm BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31'  LIMIT 1)  
               AND  
               (SELECT MONTH(MAX(ytm)) FROM conversion WHERE ytm BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31'  LIMIT 1)
          )
     week_ranges
     LEFT JOIN (SELECT (SUM(dones)/SUM(starts)*100) as avg, MONTH(ytm) AS weeknum
               FROM conversion 
               WHERE ytm BETWEEN '".$year[0]."-01-01' AND '".$year[0]."-12-31'
               GROUP BY weeknum ) weekly_tallies
               ON week_ranges.id = weekly_tallies.weeknum");
$rows = mysqli_fetch_all($int_stage);
//array_unshift($rows, array("Element", "Total"));
echo json_encode($rows);
?>
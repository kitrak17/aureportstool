<?php
include("config.php");
$int_stage = mysqli_query($con,"SELECT id AS `week`, COALESCE(n, 0) AS `counts`
     FROM (SELECT id FROM weeks  WHERE id BETWEEN (SELECT WEEK(MIN(int_created_date)) FROM indialm LIMIT 1)  AND  (SELECT WEEK(MAX(int_created_date)) FROM indialm LIMIT 1))
     week_ranges
	 LEFT JOIN (  SELECT count(id) AS n, WEEK(int_created_date) AS weeknum
               FROM indialm WHERE int_created_date BETWEEN '2018-01-01' AND '2018-07-31'
           GROUP BY weeknum) weekly_tallies
       ON week_ranges.id = weekly_tallies.weeknum"); 
$rows = mysqli_fetch_all($int_stage);
array_unshift($rows, array("Element", "Total"));
echo json_encode($rows);
?>
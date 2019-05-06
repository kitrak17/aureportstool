<?php
include("config.php");
$dashboad = mysqli_query($con,"select id,
    count(*) total_yr,
    sum(case when int_stage = '6. Code Complete' then 1 else 0 end) lts_yr,
    sum(case when int_stage != '6. Code Complete' then 1 else 0 end) pending_yr
from indialm WHERE int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
");
$row = mysqli_fetch_assoc($dashboad);
$arr = ["lts_yr"=>$row['lts_yr'],"pending_yr"=>$row['pending_yr'],"total_yr"=>$row['total_yr']];
//print_r($arr);
echo json_encode($arr);
?>
<?php
include("config.php");
$dashboad_total = mysqli_query($con,"select id,
    count(*) total_yr,
    sum(case when int_stage != '6. Code Complete' then 1 else 0 end) pending_yr
from aucases WHERE int_created_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
");
$row1 = mysqli_fetch_assoc($dashboad_total);

$dashboad_lts = mysqli_query($con,"select id,
    sum(case when int_stage = '6. Code Complete' then 1 else 0 end) lts_yr
from aucases WHERE lts_date BETWEEN '".$_REQUEST['fromDate']."' AND '".$_REQUEST['toDate']."'
");
$row2 = mysqli_fetch_assoc($dashboad_lts);

$arr = ["lts_yr"=>$row2['lts_yr'],"pending_yr"=>$row1['pending_yr'],"total_yr"=>$row1['total_yr']];
//print_r($arr);
echo json_encode($arr);
?>
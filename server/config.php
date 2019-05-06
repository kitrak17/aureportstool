<?php
$con = mysqli_connect("localhost","root","") or die(mysql_error());
$db = mysqli_select_db($con,"salesforce") or die(mysql_error());
?>
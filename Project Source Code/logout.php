<?php
session_start();
include 'conn.php';
date_default_timezone_set('Asia/Karachi');
 $logout_time = date("Y-m-d h:i:s");
 $id=$_SESSION["id"];
 $time_log=$_SESSION["time"];
 mysqli_query($con,"UPDATE emp_history SET logout_date_time='$logout_time' WHERE id='$id' AND log_date_time='$time_log'");
$_SESSION = array();
session_destroy();
header("location: index.php");
exit;
?>
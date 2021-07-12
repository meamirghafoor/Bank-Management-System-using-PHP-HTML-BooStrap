<?php
session_start();
 include '../conn.php';
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $_SESSION["status"]="Please login your account here";
    $_SESSION["code"]="warning";
    header("location: ../index.php");
    exit;
}
$sqli = "UPDATE users set status='".$_GET['type']."' WHERE id = '" . $_GET['id']. " ' ";
if(mysqli_query($con,$sqli))
{
	$_SESSION["title"]="Done";
    if($_GET['type']=="Block"){
    $_SESSION["status"]="Account blocked successfully";
    }else{
        $_SESSION["status"]="Account activate successfully";
    }
    $_SESSION["code"]="success";
    header("location: emp_list.php");
    exit;
}
else
{
	$_SESSION["title"]="Done";
    if($GET['type']=="Block"){
    $_SESSION["status"]="Account not blocked";
    }else{
        $_SESSION["status"]="Account not activate";
    }
    $_SESSION["code"]="error";
    header("location: emp_list.php");
    exit;
}

?>
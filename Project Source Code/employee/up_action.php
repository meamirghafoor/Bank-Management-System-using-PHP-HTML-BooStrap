<?php
session_start();
 include '../conn.php';
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $_SESSION["status"]="Please login your account here";
    $_SESSION["code"]="warning";
    header("location: ../index.php");
    exit;
}
 if (isset($_POST['insert'])){
        $name=$_POST['name'];
        $fname=$_POST['fname'];
        $cnic=$_POST['cnic'];
        $contect=$_POST['contect'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $postal=$_POST['postal'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $title=$_POST['title'];
        $type=$_POST['type'];
        $sql1="UPDATE accountsholder as a,accounts_info as c set a.name='$name',a.fname='$fname',a.cnic='$cnic',a.contect='$contect',a.dob='$dob',a.gender='$gender',a.email='$email',a.postal='$postal',a.city='$city',a.houseaddress='$address',c.account_type='$type',c.account_title='$title' where a.account=c.account and a.account='$id'";
        $rs=mysqli_query($con,$sql1)or die(mysqli_error($con));
        if($rs){
          if(empty($_FILES['userImage']['tmp_name']) || !is_uploaded_file($_FILES['userImage']['tmp_name'])){}else{
          $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
           mysqli_query($con,"UPDATE accountsholder set image='$imgData' where account='$id'");
          }
          $_SESSION["title"]="Done";
          $_SESSION["status"]="Account Update Successfully";
             $_SESSION["code"]="success";
             header("location: search.php");
             exit();
        }
 }
?>
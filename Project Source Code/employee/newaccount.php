<?php
session_start();
 include '../conn.php';
include '../email.php';
 include 'library.php';
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $_SESSION["status"]="Please login your account here";
    $_SESSION["code"]="warning";
    header("location: ../index.php");
    exit;
}
 $sql_qery="SELECT acc_count from counting";
        $rslt = mysqli_query($con,$sql_qery);
        $rzst = mysqli_fetch_array($rslt,MYSQLI_ASSOC);
        $acc_num=$rzst["acc_count"];
        $acc_num=$acc_num+1;
        $acc_full="PKR10".$acc_num;
 if (isset($_POST['insert'])){
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
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
        $balance=$_POST['balance'];
        date_default_timezone_set('Asia/Karachi');
        $regisdate=date("Y-m-d");
        $sqli_qery="SELECT cnic,email from accountsholder where cnic='$cnic' or email='$email'";
        $dupli = mysqli_query($con,$sqli_qery);
        $duplicate = mysqli_fetch_array($dupli,MYSQLI_ASSOC);
        $dup_cnic=$duplicate ["cnic"];
        $dup_email=$duplicate ["email"];
        if($dup_cnic==$cnic){
          $_SESSION["title"]="Error";
          $_SESSION["status"]="Duplicate account entry";
          $_SESSION["code"]="error";
          header("location: newaccount.php");
          exit;
        }else if($dup_email==$email){
          $_SESSION["title"]="Error";
          $_SESSION["status"]="Duplicate email entry";
          $_SESSION["code"]="error";
          header("location: newaccount.php");
          exit;
        }
        else{
        $sql= "INSERT INTO accountsholder(account,name,fname,cnic,contect,dob,gender,email,image,postal,city,houseaddress) VALUES ('$acc_full','$name','$fname','$cnic','$contect','$dob','$gender','$email','$imgData','$postal','$city','$address')";
        $current_id = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
        if (isset($current_id)) {
             mysqli_query($con,"UPDATE counting set acc_count='$acc_num'");
             $sqli = "INSERT INTO accounts_info(account,account_title,account_type,balance,registerdate) VALUES ('$acc_full','$title','$type','$balance','$regisdate')" or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
             mysqli_query($con, $sqli);
             date_default_timezone_set('Asia/Karachi');
             $regisdate=date("Y-m-d");
            $tms = date("h:i:s");
           $tms1 = date("Y-m-d h:i:s");
            mysqli_query($con,"INSERT INTO account_history(account,sender,s_name,reciever,r_name,dt,tm,type,amount) VALUES('$acc_full','$acc_full','$name','null','null','$regisdate','$tms','Deposit','$balance')");
    $connected = @fsockopen("www.google.com", 80); 
       if ($connected){
        $msg="Hello dear ".$name."! Your have deposit balance on opening new SKY BANK account  on ".$tms1.". Amount ".$balance.".00PKR deposit successfully. Your current account balance is ".$balance.".00PKR. Thank you for joining SKY BANK service.";
        email_send($email,"Account created successfully",$msg);
       }
             $_SESSION["title"]="Done";
             $_SESSION["status"]="Account register successfully";
             $_SESSION["code"]="success";
             header("location: newaccount.php");
             exit;
        }else{
          $_SESSION["title"]="Error";
          $_SESSION["status"]="Account not register";
          $_SESSION["code"]="error";
          header("location: newaccount.php");
          exit;
        }
      }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .footer-basic {
  padding:40px 0;
  background-color:brown;
  color:white;
}

.footer-basic ul {
  padding:0;
  list-style:none;
  text-align:center;
  font-size:18px;
  line-height:1.6;
  margin-bottom:0;
}

.footer-basic li {
  padding:0 10px;
}

.footer-basic ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.8;
}

.footer-basic ul a:hover {
  opacity:1;
}

.footer-basic .social {
  text-align:center;
  padding-bottom:25px;
}

.footer-basic .social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin:0 8px;
  color:inherit;
  opacity:0.75;
}

.footer-basic .social > a:hover {
  opacity:0.9;
}

.footer-basic .copyright {
  text-align:center;
  font-size:16px;
  color:#aaa;
  margin-bottom:-25px;
}
html {
  scroll-behavior: smooth;
}
#profileDisplay { display: block; height: 130px; width: 130px; margin: 0px auto; border-radius: 50%; }
.img-placeholder {
  width: 130px;
  color: white;
  background: black;
  opacity: .7;
  height: 130px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}
.img-placeholder h6 {
  margin-top: 45%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}
::-webkit-file-upload-button {
  display: none;
}
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Choose Image';
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #C0C0C0;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
<body class="theme-red">
    <div class="overlay"></div>
<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../dashboard.php" style="font-size: 18px;">SKY BANK LIMITED PAKISTAN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                <li class="pull-right" ><a href="logout.php"><i class="fa fa-fw fa-sign-out fa-lg"></i> LogOut</a></li>
                   <li class="pull-right"><a href="#bot"><i class="fa fa-fw fa-envelope fa-lg"></i> Contact</a></li>
                    <!-- #END# Tasks -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
           <div class="user-info">
                <div class="image">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['img']) .'" width="50" height="50" alt="User"/>' ?>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?></div>
                    <div class="email"><?php echo $_SESSION['email'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">more_vert</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="user_profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="change_pin.php"><i class="material-icons">lock</i>Change Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="../dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                   <?php 
                   if($_SESSION['type']=="Admin" || $_SESSION["type"]=="Default"){
                   ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group</i>
                            <span>Manage Employees</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="new_emp.php">Add Employee</a>
                            </li>
                            <li>
                                <a href="emp_list.php">Block Account</a>
                            </li>
                            <li>
                                <a href="emp_list.php">Employees List</a>
                            </li>
                            <li>
                                <a href="emp_list.php">Delete Employee</a>
                            </li>
                            <li>
                                <a href="emp_list.php">Search Employee</a>
                            </li>
                            <li>
                                <a href="emp_list.php">Activate Account</a>
                            </li>
                            <li>
                                <a href="emp_list.php">Update Employee</a>
                            </li> 
                        </ul>
                    </li>
                   <?php 
               }
                    ?>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group</i>
                            <span>Manage Accounts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="newaccount.php">New Account</a>
                            </li>
                            <li>
                                <a href="search.php">Accounts List</a>
                            </li>
                            <li>
                                <a href="search.php">Delete Account</a>
                            </li>
                            <li>
                                <a href="search.php">Search Account</a>
                            </li>
                            <li>
                                <a href="search.php">Update Account</a>
                            </li> 
                        </ul>
                    </li>
                   <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">manage_accounts</i>
                            <span>Account Operations</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                    <a href="transfer.php">Transection</a>
                                </li>
                                <li>
                                    <a href="deposit.php">Deposit Balance</a>
                                </li>
                                <li>
                                    <a href="withdraw.php">Withdraw Balance</a>
                                </li>   
                            </ul>
                    </li>
                  
                  <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person_add</i>
                            <span>Account Queries</span>
                        </a>
                        <ul class="ml-menu">
                                
                                <li>
                                    <a href="history.php?id=">Transection History</a>
                                </li>
                                <li>
                                    <a href="check_balance.php">Check Current Balance</a>
                                </li>
                                <li>
                                    <a href="history.php?id=">Deposit Balance History</a>
                                </li>
                                <li>
                                    <a href="history.php?id=">Withdraw Balance History</a>
                                </li>
                            </ul>
                    </li>
                    <li>
                        <a href="bank_balance.php">
                            <i class="material-icons">account_balance</i>
                            <span>Bank Balance</span>
                        </a>
                    </li>
                   <li>
                        <a href="user_profile.php">
                            <i class="material-icons">person</i>
                            <span>Account Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="change_pin.php">
                            <i class="material-icons">lock</i>
                            <span>Change Passowrd</span>
                        </a>
                    </li>
    
                </ul>
            </div>
        </aside>
    </section>
    <section class="content" id="top">
       <div class="container-fluid">
            <div class="block-header">
                <div  class="col-sm-8">
                <p style="margin-left: -15px; font-size: 17px; font-weight: bold;">Registration form</p>
            </div>
            <div  class="col-sm-4">
                <input type="text" class="form-control" name="gender" value="<?php echo $acc_full ?>" readonly>
            </div>
            </div>
            <!-- Widgets -->
            
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!--  -->
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
              </div>
                    <form id="form" method = "post" enctype="multipart/form-data">
                    <hr style="height:1px;border-width:0; width: 100%; margin-bottom:  -5px; margin-top: 20px; color:red;background-color:gray;">
                    <br>
                   <p style="text-align: left; font-weight: bold;">Personal Information</p>
                   <div class="box-body">
                        <div class="row">
                            <div  class="col-lg-4">
                                <p for="exampleInputEmail1" style="margin-bottom: 1px; margin-top: 8px;">Name</p>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                             </div>
                             <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Father Name</p>
                                <input type="text" class="form-control" name="fname" placeholder="Enter father name" required>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">DateOfBirth</p>
                                <input type="date" class="form-control" name="dob" placeholder="Enter date of birth" required>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-lg-4">
                                <p for="exampleInputEmail1" style="margin-bottom: 1px; margin-top: 8px;">CNIC Number</p>
                                <input type="number" name="cnic" class="form-control" placeholder="Enter CNIC number" required>
                             </div>
                             <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Mobile Number</p>
                                <input type="number" class="form-control" name="contect" placeholder="Enter contect number" required>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Email Account</p>
                                <input type="email" class="form-control" name="email" placeholder="Enter email account" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Gender</p>
                                <select class="form-control" name="gender" required>
                                  <option selected disabled hidden value="">Select gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px;color:red;background-color:gray;">
                        <br>
                         <p style="text-align: left; font-weight: bold;">Profile Image</p>
                        <div class="row">
                            <div class="col-lg-12">
                                 <span class="img-div">
                                 <div class="text-center img-placeholder"  onClick="triggerClick()">
                                 <h6 id="imagetitle"> Select Image</h6>
                                 </div>
                                 <img src="../images/avater.png" onClick="triggerClick()" id="profileDisplay">
                                 </span>
                                <input  type="file" name="userImage" onChange="displayImage(this)" id="profileImage" style="margin-bottom: -10px; " class="custom-file-input" required>
                           </div>
                        </div>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px; color:red;background-color:gray;">
                        <br>
                        <p style="text-align: left; font-weight: bold;">Address</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Postal Code</p>
                                <input type="number" class="form-control" name="postal" placeholder="Enter postal code" required>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Home Address</p>
                                <input type="text" class="form-control" name="address" placeholder="Enter home address" required>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">City</p>
                                <input type="text" class="form-control" name="city" placeholder="Enter city name" required>
                            </div>
                        </div>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px; color:red;background-color:gray;">
                        <br>
                        <p style="text-align: left; font-weight: bold;">Account Information</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Account Title</p>
                                <input type="text" class="form-control" name="title" placeholder="Enter account title" required>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Account Balance</p>
                                <input type="number" class="form-control" id="blnc" name="balance" min="2000" placeholder="Enter minimum 2000 account balance" required>
                            </div>
                           <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Account Type</p>
                                <select class="form-control" name="type" required>
                                  <option selected disabled hidden value="">Select account type</option>
                                  <option value="Saving">Saving account</option>
                                  <option value="Current">Current account</option>
                                </select>
                            </div>
                        </div>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px; color:red;background-color:gray;">
                        <br>
                        <div class="row">
                         <div class="col-sm-12">
                          <center>
                           <button type="submit" style="width: 40%; padding: 10px; border-radius: 10px; font-size: 15px;" class="btn btn-primary" name="insert">Register</button>
                          </center>
                        </div>
                       </div>
                      </div>
                    </form>
            </div>
            </div>
        </div>
        <br>
<div class="row clearfix" id="not">
    <div class="footer-basic" id="bot">
        <footer>
            <center><h4 style="margin-top: -15px;">Contact Us</h4></center>
            <div class="social"><a href="https://www.instagram.com/amirghafoor786/"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-skype"></i></a><a href="https://twitter.com/AmirGha59143587"><i class="icon ion-social-twitter"></i></a><a href="https://web.facebook.com/amirghafoor.chaudhry/"><i class="icon ion-social-facebook"></i></a></div>
          <hr style="height:1px;border-width:0; margin-top: -10px; color:gray;background-color:gray">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="../dashboard.php">Home</a></li>
                <li class="list-inline-item"><a href="about.php?type=Services">Services</a></li>
                <li class="list-inline-item"><a href="about.php?type=About">About</a></li>
                <li class="list-inline-item"><a href="about.php?type=Privacy">Privacy Notice</a></li>
            </ul>
            <hr style="height:1px;border-width:0; color:gray;background-color:gray">
            <p class="copyright" style="margin-top: 0px;">SKY BANK LIMITED PAKISTAN © DeepAI 2021</p>
        </footer>
    </div>
</div>
    </section>
    <script type="text/javascript">
    function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      document.getElementById("imagetitle").innerHTML = "Update Image";
    }
    reader.readAsDataURL(e.files[0]);
  }
}
  </script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status']!=''){
?>
<script type="text/javascript">
  Swal.fire({
  position: 'top-center',
  icon: '<?php echo $_SESSION['code']?>',
  title: '<?php echo $_SESSION['status']?>',
  showConfirmButton: false,
  timer: 4000
});
</script>
<?php
 unset($_SESSION['status']);
}
?>
</body>

</html>

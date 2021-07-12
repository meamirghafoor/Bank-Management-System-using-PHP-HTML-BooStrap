<?php
session_start();
include '../conn.php';
include 'library.php';
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $_SESSION["status"]="Please login your account here";
    $_SESSION["code"]="warning";
    header("location: ../index.php");
    exit;
}
$id=$_SESSION["id"];
$sql="SELECT c.* , p.* FROM users c, emp_details p WHERE c.id=p.id and p.id='$id'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
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
#profileDisplay { display: block; height: 150px; width: 150px; margin: 0px auto; border-radius: 50%; }
    </style>
</head>

<body class="theme-red">
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
                    <li>
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
                   <li class="active">
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
                <p style="margin-left: -15px; font-size: 17px; font-weight: bold;">Account Detail</p>
            </div>
            <div  class="col-sm-4">
                <input type="text" class="form-control" name="gender" placeholder="Account number" value="<?php echo $row['id'];?>" readonly>
            </div>
            </div>
            <!-- Widgets -->
            
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!--  -->
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
              </div>
                    <form  id="form"method = "post">
                    <hr style="height:1px;border-width:0; width: 100%; margin-bottom:  -5px; margin-top: 20px; color:red;background-color:gray;">
                    <br>
                     <p style="text-align: left; font-weight: bold;">Profile Image</p>
                        <div class="row">
                            <div class="col-lg-12" >
                                 <span class="img-div">
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']) .'" id="profileDisplay"/>'  ?>
                                 </span>
                           </div>
                        </div>
                        <center>
                     </center>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px; color:red;background-color:gray;">
                        <br>
                   <p style="text-align: left; font-weight: bold;">Personal Information</p>
                   <div class="box-body">
                        <div class="row">
                            <div  class="col-lg-4">
                                <p for="exampleInputEmail1" style="margin-bottom: 1px; margin-top: 8px;">Name</p>
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" readonly>
                             </div>
                             <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Father Name</p>
                                <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">DateOfBirth</p>
                                <input type="text" class="form-control" name="dob" value="<?php echo $row['dob'];?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-lg-4">
                                <p for="exampleInputEmail1" style="margin-bottom: 1px; margin-top: 8px;">CNIC Number</p>
                                <input type="number" name="cnic" class="form-control" value="<?php echo $row['cnic'];?>" readonly>
                             </div>
                             <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Mobile Number</p>
                                <input type="number" class="form-control" name="contect" value="<?php echo $row['contect'];?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Email Account</p>
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Gender</p>
                                <input type="text" class="form-control" name="gender" value="<?php echo $row['gender'];?>" readonly>
                            </div>
                        </div>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px;color:red;background-color:gray;">
                        <br>
                        <p style="text-align: left; font-weight: bold;">Address</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Postal Code</p>
                                <input type="number" class="form-control" name="postal" value="<?php echo $row['postal'];?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Home Address</p>
                                <input type="text" class="form-control" name="address" value="<?php echo $row['houseaddress'];?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">City</p>
                                <input type="text" class="form-control" name="city" value="<?php echo $row['city'];?>" readonly>
                            </div>
                        </div>
                        <?php 
                        if($_SESSION['type']!="Default"){
                        ?>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px; color:red;background-color:gray;">
                        <br>
                        <p style="text-align: left; font-weight: bold;">Education & Experience</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Education Level</p>
                                <input type="text" class="form-control" name="title" value="<?php echo $row['edu'];?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Current Job</p>
                                <input type="text" class="form-control"  name="acc_type" value="<?php echo $row['title'];?> " readonly>
                            </div>
                             <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Experience</p>
                                <input type="text" class="form-control"  name="reg" value="<?php echo $row['exp'];?>" readonly>
                            </div>
                        </div>
                        <hr style="height:1px;border-width:0; width: 100%; margin-bottom:-5px; color:red;background-color:gray;">
                        <br>
                        <p style="text-align: left; font-weight: bold;">Account Details</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Username</p>
                                <input type="text" class="form-control"  name="bnc"value="<?php echo $row['username'];?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">User Type</p>
                                <input type="text" class="form-control" value="<?php echo $row['role'];?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <p for="exampleInputPassword1" style="margin-bottom: 1px; margin-top: 8px;">Registered Date</p>
                                <input type="text" class="form-control" value="<?php echo $row['hier_date'];?>" readonly>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
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
                <li class="list-inline-item"><a href="dashboard.php">Home</a></li>
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

</body>

</html>

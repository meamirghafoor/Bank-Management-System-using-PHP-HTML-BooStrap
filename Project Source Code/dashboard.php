<?php
session_start();
 include 'conn.php';
 include 'number_fomt.php';
 include 'strength.php';
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $_SESSION["status"]="Please login your account here";
    $_SESSION["code"]="warning";
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sky Bank Limited</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="icon" href="images/icc.ico" type="image/x-icon">
    <!-- fontawesome-->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
     <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
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
#myTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#myTable td, #myTable th {
  border: 1px solid #ddd;
  padding: 8px;
}
#myTable tr:nth-child(even){background-color: #f2f2f2;}

#myTable tr:hover {background-color: #ddd;}

#myTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  color: black;
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
    <div class="overlay"></div>
<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="dashboard.php" style="font-size: 18px;">SKY BANK LIMITED PAKISTAN</a>
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
                            <li><a href="employee/user_profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="employee/change_pin.php"><i class="material-icons">lock</i>Change Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="dashboard.php">
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
                                <a href="employee/new_emp.php">Add Employee</a>
                            </li>
                            <li>
                                <a href="employee/emp_list.php">Block Account</a>
                            </li>
                            <li>
                                <a href="employee/emp_list.php">Employees List</a>
                            </li>
                            <li>
                                <a href="employee/emp_list.php">Delete Employee</a>
                            </li>
                            <li>
                                <a href="employee/emp_list.php">Search Employee</a>
                            </li>
                            <li>
                                <a href="employee/emp_list.php">Activate Account</a>
                            </li>
                            <li>
                                <a href="employee/emp_list.php">Update Employee</a>
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
                                <a href="employee/newaccount.php">New Account</a>
                            </li>
                            <li>
                                <a href="employee/search.php">Accounts List</a>
                            </li>
                            <li>
                                <a href="employee/search.php">Delete Account</a>
                            </li>
                            <li>
                                <a href="employee/search.php">Search Account</a>
                            </li>
                            <li>
                                <a href="employee/search.php">Update Account</a>
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
                                    <a href="employee/transfer.php">Transection</a>
                                </li>
                                <li>
                                    <a href="employee/deposit.php">Deposit Balance</a>
                                </li>
                                <li>
                                    <a href="employee/withdraw.php">Withdraw Balance</a>
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
                                    <a href="employee/history.php?id=">Transection History</a>
                                </li>
                                <li>
                                    <a href="employee/check_balance.php">Check Current Balance</a>
                                </li>
                                <li>
                                    <a href="employee/history.php?id=">Deposit Balance History</a>
                                </li>
                                <li>
                                    <a href="employee/history.php?id=">Withdraw Balance History</a>
                                </li>
                            </ul>
                    </li>
                    <li>
                        <a href="employee/bank_balance.php">
                            <i class="material-icons">account_balance</i>
                            <span>Bank Balance</span>
                        </a>
                    </li>
                   <li>
                        <a href="employee/user_profile.php">
                            <i class="material-icons">person</i>
                            <span>Account Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="employee/change_pin.php">
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
                <h2>DASHBOARD</h2>
            </div>
            <?php if($_SESSION["type"]=="Employee"){
            ?>
            <div class="row clearfix">
                
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <a href="employee/account_details.php?id=Current">
                            <i class="material-icons">business_center</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">CURRENT ACCOUNTS </div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo r_format("SELECT count(account_type) as total FROM accounts_info where account_type='Current'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <a href="employee/account_details.php?id=Saving">
                            <i class="material-icons">store</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">SAVING ACCOUNTS</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo r_format("SELECT count(account_type) as total FROM accounts_info where account_type='Saving'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <a href="employee/bank_balance.php">
                            <i class="material-icons">account_balance</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">BANK BALANCE</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(balance) as total FROM accounts_info") ?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--ddsds-->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <a href="employee/history_details.php?ty=Withdraw">
                            <i class="material-icons">publish</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">WITHDRAW MONEY</div>
                           <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(amount) as total FROM account_history where type='Withdraw'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                             <a href="employee/history_details.php?ty=Deposit">
                            <i class="material-icons">how_to_vote</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">DEPOSIT MONEY</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(amount) as total FROM account_history where type='Deposit'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <a href="employee/history_details.php?ty=Transection">
                            <i class="material-icons">swap_horiz</i>
                        </a>
                        </div>
                        <div class="content" id="bnk">
                            <div class="text">TRANSECTION MONEY</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(amount) as total FROM account_history where type='Transection'") ?></h4></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }else if($_SESSION["type"]=="Admin" || $_SESSION["type"]=="Default"){
            ?>
            <div class="row clearfix">
                <?php
                if($_SESSION["type"]=="Default"){
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-brown hover-expand-effect">
                        <div class="icon">
                            <a href="employee/emp_details.php?type=Admin">
                            <i class="material-icons">groups</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">CO-ADMINS</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo r_format("SELECT count(role) as total FROM users WHERE role='Admin'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <?php
               }
            ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <a href="employee/emp_details.php?type=Employee">
                            <i class="material-icons">how_to_reg</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">EMPLOYEES</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo r_format("SELECT count(role) as total FROM users WHERE role='Employee'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <a href="employee/account_details.php?id=Current">
                            <i class="material-icons">business_center</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">CURRENT ACCOUNTS </div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo r_format("SELECT count(account_type) as total FROM accounts_info where account_type='Current'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <a href="employee/account_details.php?id=Saving">
                            <i class="material-icons">store</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">SAVING ACCOUNTS</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo r_format("SELECT count(account_type) as total FROM accounts_info where account_type='Saving'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <?php
                if($_SESSION["type"]=="Admin"){
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <a href="employee/bank_balance.php">
                            <i class="material-icons">account_balance</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">BANK BALANCE</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(balance) as total FROM accounts_info") ?></h4></div>
                        </div>
                    </div>
                </div>
                <?php
                  }
                ?>
            </div>
            <!--ddsds-->
            <div class="row clearfix">
                <?php
                if($_SESSION["type"]=="Default"){
                ?>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <a href="employee/bank_balance.php">
                            <i class="material-icons">account_balance</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">BANK BALANCE</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(balance) as total FROM accounts_info") ?></h4></div>
                        </div>
                    </div>
                </div>
                <?php
                  }
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <a href="employee/history_details.php?ty=Withdraw">
                            <i class="material-icons">publish</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">WITHDRAW MONEY</div>
                           <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(amount) as total FROM account_history where type='Withdraw'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                             <a href="employee/history_details.php?ty=Deposit">
                            <i class="material-icons">how_to_vote</i>
                        </a>
                        </div>
                        <div class="content">
                            <div class="text">DEPOSIT MONEY</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(amount) as total FROM account_history where type='Deposit'") ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <a href="employee/history_details.php?ty=Transection">
                            <i class="material-icons">swap_horiz</i>
                        </a>
                        </div>
                        <div class="content" id="bnk">
                            <div class="text">TRANSECTION MONEY</div>
                            <div ><h4 style="margin-top: 5px; font-size: 20px;"><?php echo rup_format("SELECT SUM(amount) as total FROM account_history where type='Transection'") ?></h4></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!--  -->
            <!-- #END# CPU Usage -->
            <div></div>
            <?php
            if($_SESSION["type"]=="Admin" || $_SESSION["type"]=="Default"){
            ?>
            <div class="row clearfix" >
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="header">
                            <h2>EMPLOYEES INFO BOARD</h2>                        
                        </div>
                        <div  class="table-responsive"style="overflow:auto; max-height: 475px;">
                    <table class="table table-striped" id="myTable">
                       <?php
                       if($_SESSION['type']=="Default"){
                        $sql="SELECT c.* , p.* FROM users c,emp_details p WHERE c.id=p.id ORDER BY p.hier_date DESC";
                        }else{
                            $sql="SELECT c.* , p.* FROM users c,emp_details p WHERE c.id=p.id and c.role='Employee' ORDER BY p.hier_date DESC";
                        }
                        $result = mysqli_query($con,$sql);
                        $num = (mysqli_query($con,$sql));
                      ?>
                      <thead>
                        <tr style="text-align: center;">
                          <th style="text-align: center; width: 10%;" >Employee ID</th>
                          <th style="text-align: center; width: 17%;">Employee Name </th>
                          <th style="text-align: center;width: 17%;">Father Name</th>
                          <th style="text-align: center;width: 22%;">Email</th>
                          <th style="text-align: center; width: 17%;">CNIC Number</th>
                          <th style="text-align: center; width: 11%;"> Register Date</th>
                          <th style="text-align: center; width: 6%;">Type</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(mysqli_num_rows($num)>0){
                        while($row=mysqli_fetch_array ($result)){
                            if($_SESSION['id']!=$row['id']){
                        ?>
                        <tr>
                           <td style="text-align: center;"><?php echo $row['id'];?></td>
                           <td style="text-align: center;"><?php echo $row['name'];?></td>
                           <td style="text-align: center;"><?php echo $row['fname'];?></td>
                           <td style="text-align: center;"><?php echo $row['email'];?></td>
                           <td style="text-align: center;"><?php echo $row['cnic'];?></td>
                           <td style="text-align: center;"><?php echo $row['hier_date'];?></td>
                           <td style="text-align: center;"><?php echo $row['role'];?></td>
                        </tr>
                        <?php
                        }
                        }
                        }else{
                        ?>
                        <tr>
                        <td style="text-align: center;padding-top: 25px; font-size: 20px;" colspan="7">No any history found</td>
                        </tr>
                        <?php 
                         }
                         ?>
                       </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <?php
            }
            ?>
            <div class="row clearfix" >
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="header">
                            <h2>ACCOUNTS INFO BOARD</h2>                        
                        </div>
                        <div  class="table-responsive"style="overflow:auto; max-height: 475px;">
                    <table class="table table-striped" id="myTable">
                       <?php
                        $sql="SELECT c.* , p.* FROM accounts_info c,accountsholder p WHERE c.account=p.account ORDER BY c.registerdate DESC";
                        $result = mysqli_query($con,$sql);
                        $num = (mysqli_query($con,$sql));
                      ?>
                      <thead>
                        <tr style="text-align: center;">
                          <th style="text-align: center; width: 14%;" >Account Number</th>
                          <th style="text-align: center; width: 16%;">Name </th>
                          <th style="text-align: center;width: 16%;">Father Name</th>
                          <th style="text-align: center;width: 19%;">Email</th>
                          <th style="text-align: center; width: 15%;">CNIC Number</th>
                          <th style="text-align: center; width: 10%;"> Register Date</th>
                          <th style="text-align: center; width: 10%;">Account Type</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(mysqli_num_rows($num)>0){
                        while($row=mysqli_fetch_array ($result)){
                        ?>
                        <tr>
                           <td style="text-align: center;"><?php echo $row['account'];?></td>
                           <td style="text-align: center;"><?php echo $row['name'];?></td>
                           <td style="text-align: center;"><?php echo $row['fname'];?></td>
                           <td style="text-align: center;"><?php echo $row['email'];?></td>
                           <td style="text-align: center;"><?php echo $row['cnic'];?></td>
                           <td style="text-align: center;"><?php echo $row['registerdate'];?></td>
                           <td style="text-align: center;"><?php echo $row['account_type'];?></td>
                        </tr>
                        <?php
                        }
                        }else{
                        ?>
                        <tr>
                        <td style="text-align: center;padding-top: 25px; font-size: 20px;" colspan="7">No any history found</td>
                        </tr>
                        <?php 
                         }
                         ?>
                       </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            <div class="row clearfix" >
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="header">
                            <h2>ACCOUNTS HISTORY INFO BOARD</h2>                        
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="employee/history_details.php?ty=Transection">Transection history</a></li>
                                        <li><a href="employee/history_details.php?ty=Recieved">Recieved history</a></li>
                                        <li><a href="employee/history_details.php?ty=Withdraw">Withdrawal history</a></li>
                                        <li><a href="employee/history_details.php?ty=Deposit">Deposit history</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div  class="table-responsive"style="overflow:auto; max-height: 475px;">
                    <table class="display table table-bordered" id="myTable" cellspacing="0">
                       <?php
                        $sql="SELECT c.* , p.* FROM accountsholder c,account_history p WHERE c.account=p.account ORDER BY no DESC";
                        $result = mysqli_query($con,$sql);
                        $num = (mysqli_query($con,$sql));
                      ?>
                      <thead>
                        <tr style="text-align: center;">
                          <th style="text-align: center;" > No </th>
                          <th style="text-align: center;">Account Holder Name </th>
                          <th style="text-align: center;">Account Number </th>
                          <th style="text-align: center;"> History Type </th>
                          <th style="text-align: center;"> Amount </th>
                          <th style="text-align: center;"> Date</th>
                          <th style="text-align: center;">Time </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(mysqli_num_rows($num)>0){
                            $numb=1;
                        while($row=mysqli_fetch_array ($result)){
                        ?>
                        <tr>
                           <td style="text-align: center;"><?php echo $numb;?></td>
                           <td style="text-align: center;"><?php echo $row['name'];?></td>
                           <td style="text-align: center;"><?php echo $row['account'];?></td>
                           <td style="text-align: center;"><?php echo $row['type'];?></td>
                           <td style="text-align: center;"><?php echo $row['amount'].".00PKR";?></td>
                           <td style="text-align: center;"><?php echo $row['dt'];?></td>
                           <td style="text-align: center;"><?php echo $row['tm'];?></td>
                        </tr>
                        <?php
                        $numb=$numb+1;
                        }
                        }else{
                        ?>
                        <tr>
                        <td style="text-align: center;padding-top: 25px; font-size: 20px;" colspan="7">No any history found</td>
                        </tr>
                        <?php 
                         }
                         ?>
                       </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
<div class="row clearfix" id="not">
    <div class="footer-basic" id="bot">
        <footer>
            <center><h4 style="margin-top: -15px;">Contact Us</h4></center>
            <div class="social"><a href="https://www.instagram.com/amirghafoor786/"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-skype"></i></a><a href="https://twitter.com/AmirGha59143587"><i class="icon ion-social-twitter"></i></a><a href="https://web.facebook.com/amirghafoor.chaudhry/"><i class="icon ion-social-facebook"></i></a></div>
          <hr style="height:1px;border-width:0; margin-top: -10px; color:gray;background-color:gray">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="dashboard.php">Home</a></li>
                <li class="list-inline-item"><a href="employee/about.php?type=Services">Services</a></li>
                <li class="list-inline-item"><a href="employee/about.php?type=About">About</a></li>
                <li class="list-inline-item"><a href="employee/about.php?type=Privacy">Privacy Notice</a></li>
            </ul>
            <hr style="height:1px;border-width:0; color:gray;background-color:gray">
            <p class="copyright" style="margin-top: 0px;">SKY BANK LIMITED PAKISTAN © DeepAI 2021</p>
        </footer>
    </div>
</div>
</section>
<script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#myTable').dataTable();
    });
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

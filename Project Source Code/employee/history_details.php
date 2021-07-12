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
.cs {
  background-image: url('images/srch2.png');
  background-position: 8px 5px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 7px 16px 7px 36px;
  border: 1px solid #ddd;
}
.cs::placeholder{
    font-size: 13px;
}
#profileDisplay { display: block; height: 150px; width: 150px; margin: 0px auto; border-radius: 50%; }
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
  background-color: #4CAF50;
  color: white;
}
input[type="date"]::before {
    color: #999999;
    font-size: 13px;
    content: attr(placeholder);
}
input[type="date"] {
    color: #ffffff;
    font-size: 13px;
}
input[type="date"]:focus,
input[type="date"]:valid {
    color: #666666;
}
input[type="date"]:focus::before,
input[type="date"]:valid::before {
    font-size: 13px;
    content: "" !important;
}
    </style>
</head>
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
                <p style="margin-left: -15px; font-size: 17px; font-weight: bold;"><?php echo $_GET["ty"]." Balance History"?></p>
            </div>
            <div class="col-sm-4">
              <?php 
              $type2=$_GET["ty"];
              $sl = mysqli_query($con,"SELECT SUM(amount) as total FROM account_history where type='$type2'");
              $r = mysqli_fetch_array($sl);
              $number = $r['total'].".00 PKR";
              if (isset($number)) {
                # code...
              }else {
                $number="0.00 PKR";
              }
               ?>
              <input type="text" name="pt" value="<?php echo $number ?>" readonly class="form-control">
            </div>
            </div>
            <br>
            <div class="row clearfix">
              <hr style="height:1px;border-width:0; width: 100%; margin-bottom:  -5px;  color:red;background-color:gray;">
              <br>
                <div class="row">
                  <div class="col-sm-4">
                    <input type="text" id="myInput" class="cs form-control" onkeyup="myFunction()" placeholder="Search with name or account number" title="Type in a name">
                </div>
                <form method="post" id="form_id">
                <div class="col-sm-3">
                    <input type="date" name="date_start" class="form-control" placeholder="Enter start date" required>
                    <input type="hidden" name="sd" class="form-control" value="<?php echo $sender ?>">
                </div>
                <div class="col-sm-3">
                    <input type="date" name="date_end" class="form-control" placeholder="Enter end date" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit"  class="btn btn-primary" style="font-size: 17px; width: 120px; height: 32px; border-radius: 5px;" name="dt" value="Filter">
                </div>
                </form>
                </div>
                <br>
              </div>
              <div class="row clearfix" >
                <div  class="table-responsive"style="overflow:auto; min-height: 300px;" id="customers">
                  <table class="table" id="myTable">
                    <thead>
                      <tr style="text-align: center;" class="tb">
                          <th style="text-align: center; width: 15%;">Name</th>
                          <th style="text-align: center; width: 13%;">Account Number</th>
                          <?php
                          if ($_GET["ty"]=="Transection") {
                            ?>
                          <th style="text-align: center; width: 17%;">Reciever Account Number</th>
                          <th style="text-align: center; width: 17%;">Reciever Name</th>
                          <?php
                          }
                          ?>
                          <th style="text-align: center; width: 13%;">Date & Time</th>
                          <th style="text-align: center; width: 12%;">History Type</th>
                          <th style="text-align: center;width: 13%;">Amount</th>
                        </tr>
                    </thead>
                    <tbody id="body">
                      <?php
                      $type1=$_GET["ty"];
                      if (isset($_POST['dt'])){
                        $st=$_POST['date_start'];
                        $et=$_POST['date_end'];
                        $sql="SELECT c.* , p.* FROM accountsholder c,account_history p WHERE c.account=p.account and p.type='$type1' and p.dt between '$st' and '$et' ORDER BY no DESC";
                        }else{
                        $sql="SELECT c.* , p.* FROM accountsholder c,account_history p WHERE c.account=p.account and p.type='$type1' ORDER BY no DESC";
                        }
                      $result = mysqli_query($con,$sql);
                      $num = (mysqli_query($con,$sql));
                      if(mysqli_num_rows($num)>0){
                      while($row=mysqli_fetch_array ($result)){
                      ?>
                       <tr>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['name'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['account'];?></td>
                          <?php
                          if ($row['type']=="Transection" && $_GET["ty"]=="Transection") {
                          ?>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['reciever'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['r_name'];?></td>
                          <?php
                          }
                          ?>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['dt']." ".$row['tm'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['type'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['amount'].".00";?></td>
                      <?php
                         }
                         }else{
                        ?>
                         <td style="text-align: center;padding-top: 25px; font-size: 20px;" colspan="7">No record found</td>
                         </tr>
                         <?php
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
    </section>
    <script type="text/javascript">
      function myFunction() {
  var input, filter, table, tr, td, i, txtValue,cn;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    cn = tr[i].getElementsByTagName("td")[1];
    if (td || cn) {
      txtValue = td.textContent || td.innerText;
      var txtValue1 = cn.textContent || cn.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
    </script>

</body>

</html>

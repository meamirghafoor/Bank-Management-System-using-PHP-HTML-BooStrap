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
                  <?php
                  if($_GET["id"]==""){
                  ?>
                  <li class="active">

                  <?php }else{
                    ?>
                    <li >
                    <?php }?>
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
                <p style="margin-left: -15px; font-size: 17px; font-weight: bold;">History Board</p>
            </div>
            </div>
              <hr style="height:1px;border-width:0; width: 100%; margin-bottom:  -5px; margin-top: 20px; color:red;background-color:gray;">
                    <br>
                    <?php
                    if($_GET['id']==""){
                    ?>
                   <p style="text-align: left; font-weight: bold;">Search Board</p>
              <form id="form" method = "post" enctype="multipart/form-data">
                    <div class="row">
                        <div  class="col-sm-8">
                             <input type="text" class="form-control" name="sender" placeholder="Enter account number for history" id="snd" required>
                        </div>
                        <div  class="col-sm-2">
                        <input type="submit"  class="btn btn-primary form-control" style=" font-size: 17px; width: 120px; border-radius: 5px;" name="filter" id="sbtn" value="Search">
                       </div>
                    </div>
                </form>
                <hr style="height:1px;border-width:0; width: 100%; margin-bottom:  -5px; margin-top: 20px; color:red;background-color:gray;">
                <br>
            <?php
            }
            $dd=$_GET['id'];
            if (isset($_POST['filter']) || isset($_POST['dt']) || $dd!=""){
              if (isset($_POST['filter'])) {
                $sender=$_POST['sender'];
              }
              else if(isset($_POST['dt'])){
              $sender=$_POST['sd'];
              $st=$_POST['date_start'];
              $et=$_POST['date_end'];
            }else if(isset($dd)){
                $sender=$dd;
            }
                  $sql1="SELECT * FROM accountsholder  WHERE account='$sender'";
                  $result1 = mysqli_query($con,$sql1);
                  $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                  $nm1 = (mysqli_query($con,$sql1));
                  if(mysqli_num_rows($nm1)>0){
              ?>
                <div class="row">
                <div  class="col-sm-4">
                <select class="form-control" onchange="myfun()" id="tp">
                    <option selected disabled hidden value="">Select history type</option>
                    <option value="Transection">Transection</option>
                    <option value="Recieved">Recieved</option>
                    <option value="DEPOSIT">Deposit</option>
                    <option value="Withdraw">Withdraw</option>
                    <option value="All">All</option>
                </select>
               </div>
                <form method="post"  enctype="multipart/form-data">
                <div class="col-sm-3">
                    <input type="date" name="date_start" class="form-control" placeholder="Enter starting date" required>
                    <input type="hidden" name="sd" value="<?php echo $row1['account'];?>">
                </div>
                <div class="col-sm-3">
                    <input type="date" name="date_end" class="form-control" placeholder="Enter ending date" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit"  class="btn btn-primary" style="font-size: 17px; width: 120px; height: 32px; border-radius: 5px;" name="dt" value="Filter">
                </div>
                </form>
                </div>
            <br>
                <div class="box-body">
                <?php
                    if (isset($_POST['filter'])) {
                      $sql="SELECT c.* , p.* FROM accountsholder c,account_history p WHERE c.account=p.account and p.account='$sender' ORDER BY p.no DESC";
                    }
                    else if(isset($_POST['dt'])){
                      $sql="SELECT c.* , p.* FROM accountsholder c,account_history p WHERE c.account=p.account and p.account='$sender' and p.dt between '$st' and '$et' ORDER BY p.no DESC";
                    }else if(isset($dd)){
                      $sql="SELECT c.* , p.* FROM accountsholder c,account_history p WHERE c.account=p.account and p.account='$sender' ORDER BY p.no DESC";
                    }
                  $result = mysqli_query($con,$sql);
                  $nm= (mysqli_query($con,$sql));
                        ?>
                        <div  class="table-responsive"style="overflow:auto; min-height: 300px;" id="customers">
                    <table class="table" id="myTable">
                      <thead>
                        <tr style="text-align: center;" class="tb">
                          <th style="text-align: center; width: 15%;">Name</th>
                          <th style="text-align: center; width: 12%;">Account Number</th>
                          <th style="text-align: center; width: 19%;">Sender / Reciever Account</th>
                          <th style="text-align: center; width: 17%;">Sender / Reciever Name</th>
                          <th style="text-align: center; width: 13%;">Date & Time</th>
                          <th style="text-align: center; width: 11%;">History Type</th>
                          <th style="text-align: center;width: 13%;">Amount</th>
                        </tr>
                      </thead>
                      <tbody id="body">
                        <?php
                        if(mysqli_num_rows($nm)>0){
                           while($row=mysqli_fetch_array ($result)){
                        ?>
                        <tr>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['name'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['account'];?></td>
                          <?php
                          if ($row['type']=="Transection") {
                          ?>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['reciever'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['r_name'];?></td>
                          <?php
                          }else if($row['type']=="Recieved"){
                          ?>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['sender'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['s_name'];?></td>
                          <?php
                          }else{
                            ?>
                           <td style="text-align: center;padding-top: 25px;" colspan="2">-  -  -</td>
                          <?php
                          }
                          ?>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['dt']." ".$row['tm'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['type'];?></td>
                          <td style="text-align: center;padding-top: 25px;"><?php echo $row['amount'].".00";?></td>

                        </tr>
                       <?php
                      }
                      }else{
                        ?>
                        <tr>
                          <td style="text-align: center;padding-top: 25px; font-size: 20px;" colspan="7">No account history found</td>
                        </tr>
                        <?php
                         }?>
                         <tr class='no-records' style="display: none; text-align: center;padding-top: 25px; font-size: 20px;">
                         <td colspan='7'>No record found</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>

                    <?php
                  }else{
                    //sender
                    $_SESSION["title"]="Error";
                    $_SESSION["status"]="User account not found";
                    $_SESSION["code"]="error";
                  }
                }
                ?>
                </div>
          </div>
    </section>
    <script type="text/javascript">
      function myfun() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("tp");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    var td1 = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      var txtValue1 = td1.textContent || td1.innerText;
      if(filter=="TRANSECTION" || filter=="RECIEVED" || filter=="DEPOSIT" || filter=="WITHDRAW"){
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
    else if(filter=="ALL"){
    if (txtValue.toUpperCase().indexOf("TRANSECTION") > -1 || txtValue.toUpperCase().indexOf("RECIEVED") > -1 || txtValue1.toUpperCase().indexOf("DEPOSIT") > -1 || txtValue1.toUpperCase().indexOf("WITHDRAW") > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
    }else{
       var trSel = $("#myTable tr:not('.no-records, .tb'):visible");
          if (trSel.length == 0) {

            $("#myTable").find('.no-records').show();
          }
          else {
            $("#myTable").find('.no-records').hide();
          }
    }
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

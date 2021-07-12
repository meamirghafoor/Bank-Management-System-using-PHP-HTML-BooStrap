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
        .success {
    background-color: #24b96f !important;
}

.warning {
    background-color: #ebba33 !important;
}

.primary {
    background-color: #259dff !important;
}

.secondery {
    background-color: #00bcd4 !important;
}

.danger {
    background-color: #ff5722 !important;
}


.action_btn {
    display: inline-flex;
    align-items: center;
}

.action_btn>* {
    border: none;
    outline: none;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    padding: 8px 14px;
    position: relative;
    transition: 0.3s ease-in-out;
}

.action_btn>*+* {
    border-left: 1px solid #0003;
}

.action_btn>*:hover {
    filter: hue-rotate(-20deg) brightness(0.97);
    transform: scale(1.05);
    border-color: transparent;
    box-shadow: 0 2px 10px #0004;
    border-radius: 4px;
}

.action_btn>*:active {
    transform: scale(1);
    box-shadow: 0 2px 5px #0004;
}

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
  margin-bottom: 12px;
}
.cs::placeholder{
    font-size: 13px;
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

#myTable tr:nth-child(even){background-color: #f2f2f2;}

#myTable tr:hover {background-color: #ddd;}

#myTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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
                <p style="margin-left: -15px; font-size: 17px; font-weight: bold;"><?php echo $_GET["type"]." List"?></p>
            </div>
            <div class="row clearfix">
            <hr style="height:1px;border-width:0; width: 100%; margin-bottom:  -5px; margin-top: 5px; color:red;background-color:gray;">
            <br>
                <div class="row">
                <div class="col-sm-4">
                    <input type="text" id="myInput" class="cs form-control" onkeyup="myFunction()" placeholder="Search with id, name, cnic, contect" title="Type in a name">
                </div>
                <form method="post" id="form_id">
                <div class="col-sm-3">
                    <input type="date" name="date_start" class="form-control" placeholder="Enter starting date" required>
                </div>
                <div class="col-sm-3">
                    <input type="date" name="date_end" class="form-control" placeholder="Enter ending date" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit"  class="btn btn-primary" style="font-size: 17px; width: 120px; height: 32px; border-radius: 5px;" name="filter" value="Filter">
                </div>
                </form>
                </div>
            </div>
            <!-- Widgets -->
            
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!--  -->
            <!-- #END# CPU Usage -->
            <div class="row clearfix" >
                    <div  class="table-responsive"style="overflow:auto; min-height: 300px; max-height: 1000px;" id="customers">
                    <table class="table" id="myTable">
                      <thead>
                        <tr style="text-align: center;" class="tb">
                          <th style="text-align: center; width: 7%;" >Image</th>
                          <th style="text-align: center; width: 15%;">Employee Id</th>
                          <th style="text-align: center; width: 18%;">Name</th>
                          <th style="text-align: center; width: 18%;">Father Name</th>
                          <th style="text-align: center; width: 15%;">CNIC Number</th>
                          <th style="text-align: center; width: 15%;">Contect</th>
                          <th style="text-align: center; width: 12%;">Register Date</th>
                        </tr>
                      </thead>
                      <tbody id="body">
                        <?php
                        if(isset($_POST['filter'])){
                            $startdt=$_POST['date_start'];
                            $enddt=$_POST['date_end'];
                        $sql="SELECT u.*,e.* from users u, emp_details e where u.id=e.id and u.role='".$_GET['type']."' AND e.hier_date between '$startdt' and '$enddt' order by e.hier_date DESC";
                        $result = mysqli_query($con,$sql);
                        $num = (mysqli_query($con,$sql));
                         if(mysqli_num_rows($num)>0){
                         while($row=mysqli_fetch_array ($result)){
                          if($_SESSION['id']!=$row['id']){
                         ?>
                        <tr style="height: 50px;">
                           <td style="text-align: center; padding: 2px 2px 2px 2px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']) .'" style="width:60px; height:60px;"/>'  ?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['id'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['name'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['fname'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['cnic'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['contect'];?></td>
                           <td style="text-align: center;padding-top: 25px;" title="Date format[YY-MM-DD]"><?php echo $row['hier_date'];?></td>
                        <?php
                         }
                         }
                         }else{
                        ?>
                        <td style="text-align: center;padding-top: 25px; font-size: 20px;" colspan="7">No record found</td>
                        </tr>
                        <?php
                        }
                    }else{
                        $sql="SELECT u.*,e.* from users u, emp_details e where u.id=e.id and u.role='".$_GET['type']."' order by e.hier_date DESC";
                        $result = mysqli_query($con,$sql);
                        $num = (mysqli_query($con,$sql));
                         if(mysqli_num_rows($num)>0){
                         while($row=mysqli_fetch_array ($result)){
                          if($_SESSION['id']!=$row['id']){
                         ?>
                        <tr style="height: 50px;">
                           <td style="text-align: center; padding: 2px 2px 2px 2px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']) .'" style="width:60px; height:60px;"/>'  ?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['id'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['name'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['fname'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['cnic'];?></td>
                           <td style="text-align: center;padding-top: 25px;"><?php echo $row['contect'];?></td>
                           <td style="text-align: center;padding-top: 25px;" title="Date format[YY-MM-DD]"><?php echo $row['hier_date'];?></td>
                        <?php
                         }
                         }
                         }else{
                        ?>
                        <td style="text-align: center;padding-top: 25px; font-size: 20px;" colspan="7">No record found</td>
                        </tr>
                        <?php
                        }

                    }
                        ?>
                        <tr class='no-records' style="display: none; text-align: center;padding-top: 25px; font-size: 20px;">
                         <td colspan='7'>No record found</td>
                        </tr>
                       </tbody>
                    </table>
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
    <script type="text/javascript">
        $('.danger').on('click', function(e){
        e.preventDefault();
        const href=$(this).attr('href');
        Swal.fire({
  title: 'Confirm to delete account?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    document.location.href=href;

  }
})
    })
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue,cn,acc,tle;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    cn = tr[i].getElementsByTagName("td")[2];
    acc = tr[i].getElementsByTagName("td")[4];
    tle = tr[i].getElementsByTagName("td")[5];
    if (td || cn || acc || tle) {
      txtValue = td.textContent || td.innerText;
      var txtValue1 = cn.textContent || cn.innerText;
      var txtValue2 = acc.textContent || acc.innerText;
      var txtValue3 = tle.textContent || tle.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
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
</body>

</html>

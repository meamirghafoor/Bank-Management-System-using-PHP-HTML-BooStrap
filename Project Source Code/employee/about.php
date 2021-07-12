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
        <?php if ($_GET['type']=="Services") {
         ?>
        <div class="container-fluid">
            <div class="block-header">
                <h2 style="font-size: 20px; color: black; font-weight: bold;"><?php echo $_GET['type']; ?></h2>
            </div>
                <p style="font-size: 17px;">The nature and variety of dealings, of course, depend upon the activities and expanse of business. It is against this backdrop that banking-related correspondence assumes significance.</p>
                <br>
                <p style="font-size: 17px;">
                    Generally speaking, some common services provided by banks include the following:
                </p>
                <ul>
                    <li style="font-size: 17px; font-weight: bold;">Deposit facilities</li>
                    <li style="font-size: 17px; font-weight: bold;">Withdraw facilities</li>
                    <li style="font-size: 17px; font-weight: bold;">Transfer facilities</li>
                    <li style="font-size: 17px; font-weight: bold;">History facilities</li>
                </ul>
                <h4>Deposit facilities</h4>
                <p style="font-size: 17px;">Current and saving account would involve account opening and would be able to deposit amount in his account.</p>
                <h4>Withdraw facilities</h4>
                <p style="font-size: 17px;">Current and saving account would involve account opening and would be able to withdraw amount from his account.</p>
                <h4>Transfer facilities</h4>
                <p style="font-size: 17px;">Current and saving account would involve account opening and would be able to transfer amount from his account to another same bank account.</p>
                <h4>History facilities</h4>
                <p style="font-size: 17px;">Current and saving account would involve account opening and would be able to get his account history from opening to close time with date and time. Account holder will see all amount that he is deposit, withdraw, trasfer or received by date and time.</p>
        </div>
    <?php }
    if ($_GET['type']=="Privacy") {
    ?>
     <div class="container-fluid">
            <div class="block-header">
                <h2 style="font-size: 20px; color: black; font-weight: bold;"><?php echo $_GET['type']; ?></h2>
           </div>
           <p style="font-size: 17px;">Data privacy concerns are particularly paramount for companies in the financial and healthcare sectors. Banks and other financial institutions manage a large volume of sensitive information about their customers, and the breach of such data can have dire consequences. As we increasingly depend on the cloud to store information and conduct financial transactions online, data privacy concerns continue to grow.</p>
         <p style="font-size: 17px;">A consumer cannot opt out of all information sharing. First, the privacy rule does not govern information sharing among affiliated parties. Second, the rule contains exceptions to allow transfers of nonpublic personal information to unaffiliated parties to process and service a consumer's transaction, and to facilitate other normal business transactions. For example, consumers cannot opt out when nonpublic personal information is shared with a nonaffiliated third party to:</p>
         <ul>
             <li style="font-size: 16px;">Market the bank's own financial products or services</li>
             <li style="font-size: 16px;">Market financial products or services offered by the bank and another financial institution (joint marketing)</li>
             <li style="font-size: 16px;">Process and service transactions the consumer requests or authorizes</li>
             <li style="font-size: 16px;">Protect against potential fraud or unauthorized transactions</li>
             <li style="font-size: 16px;">Comply with federal, state, or local legal requirements</li>
         </ul>
         <p style="font-size: 17px;">The privacy rule prohibits a bank from disclosing an account number or access code for credit card, deposit, or transaction accounts to any nonaffiliated third party for use in marketing. The rule contains two narrow exceptions to this general prohibition. A bank may share account numbers in conjunction with marketing its own products as long as the service provider is not authorized to directly initiate charges to the accounts. A bank may also disclose account numbers to a participant in a private label or affinity credit card program when the participants are identified to the customer. An account number does not include a number or code in encrypted form as long as the bank does not also provide a means to decode the number.</p>
         <p style="font-size: 17px;">A provision under a State law that provides greater consumer protection than provided under the GLBA privacy provisions will supercede the Federal privacy rule. The bank will be obligated to comply with the provisions of that State law to the extent those provisions provide greater consumer protection than the Federal privacy rule. The Federal Trade Commission determines whether a particular State law provides greater protection.</p>
       </div>
     <?php }
    if ($_GET['type']=="About") {
    ?>
     <div class="container-fluid">
            <div class="block-header">
                <h2 style="font-size: 20px; color: black; font-weight: bold;"><?php echo $_GET['type']; ?></h2>
           </div>
    <p style="font-size: 17px;">A bank is a financial institution licensed to receive deposits and make loans. Two of the most common types of banks are commercial/retail and investment banks.  Depending on type, a bank may also provide various financial services ranging from providing safe deposit boxes and currency exchange to retirement and wealth management.</p>
    <br><br>
    <p style="font-size: 17px;">But why is this important? because those who are unbanked or underbanked are hindering their financial lives from enjoying services that lead to financial well-being. Many must resort to services outside the banking system to cash checks or borrow loans and incur higher transaction fees and interest unnecessarily.   Here are some of the reasons why banking tops the list of pillars required in financial literacy.</p>
    <br>
    <ul style="font-size: 16px;">
        
        <li>Safeguard your cash</li>
        <li>Manage your finances – record keeping and budgeting</li>
        <li>Receive your paycheck quickly using direct deposit</li>
        <li>Facilitate financial transactions</li>
        <li>Invest your money</li>
        <li>Establish a credit history to generate a FICO credit score instrumental in borrowing funds and building wealth</li>
    </ul>
    <br><br><br>
     </div>
    <?php
    }
    ?>
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

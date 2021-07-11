<?php
session_start();
include 'conn.php';
include 'email.php';
function OTP($n) {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
}
if(isset($_POST['log']))
{
$email = $_POST["email"];
$sql ="SELECT u.*, e.* FROM users u,emp_details e WHERE e.email='$email' AND e.id=u.id";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $x = (mysqli_query($con,$sql));
if(mysqli_num_rows($x)>0){
if($row["email"]==$email)
{
    $id=$row["id"];
    $nm=$row["name"];
    $pass=OTP(8);
     $connected = @fsockopen("www.google.com", 80); 
    if ($connected){
    $query="UPDATE users set password='$pass' where id='$id'";
    $rs1=mysqli_query($con,$query);
    if($rs1){
    date_default_timezone_set('Asia/Karachi');
        $tms1 = date("Y-m-d h:i:s");
      $msg="Hello dear ".$nm."! Your SKY BANK account new password is ".$pass.". Use this password for login. Thank you for joining SKY BANK service.";
      email_send($email,"New Password",$msg);
     $_SESSION["status"]="New password sent on your email";
    $_SESSION["code"]="success";
    header("Location: index.php");
      exit();

    }else{
    $_SESSION["status"]="Something went wrong";
    $_SESSION["code"]="error";
    header("Location: forget.php");
      exit();
    }
}else{
    $_SESSION["status"]="Please make sure internet connection";
    $_SESSION["code"]="error";
    header("Location: forget.php");
      exit();
}
}
else{
    $_SESSION["status"]="User email not exist in record";
    $_SESSION["code"]="error";
    header("Location: forget.php");
      exit();
}
}
else{
    $_SESSION["status"]="User email not exist in record";
    $_SESSION["code"]="error";
    header("Location: forget.php");
    exit();
}
}
?>
<!DOCTYPE html>
<html>
    <head>
         <title>SKY BANK | Forget Password</title>
         <link rel="icon" href="images/icc.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/native-toast.css">
        <meta charset="utf-8">
        <style type="text/css">
          @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=swap');

body {
    background: url('images/ub.jpg');
    margin: 15px;
    margin-top: 80px;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #464646;
}

.login-form,
.login-form * {
    box-sizing: border-box;
    font-family: 'Source Sans Pro';
}

.login-form {
    max-width: 350px;
    margin: 0 auto;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
}

.login-form__logo-container {
    padding: 30px;
    background: rgba(0, 0, 0, 0.25);
}

.login-form__logo {
    display: block;
    max-width: 125px;
    margin: 0 auto;
}

.login-form__content {
    padding: 30px;
    background: #eeeeee;
}

.login-form__header {
    margin-bottom: 15px;
    text-align: center;
    color: #333333;
}

.login-form__input {
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
    border: 2px solid #dddddd;
    background: #ffffff;
    outline: none;
    transition: border-color 0.5s;
}

.login-form__input:focus {
    border-color: #009578;
}

.login-form__input::placeholder {
    color: #aaaaaa;
}

.login-form__button {
    padding: 10px;
    color: #ffffff;
    font-weight: bold;
    background: #009578;
    width: 100%;
    border: none;
    outline: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-form__button:active {
    background: #008067;
}

.login-form__links {
    margin-top: 15px;
    text-align: center;
}

.login-form__link {
    font-size: 0.9em;
    color: #008067;
    text-decoration: none;
}

        </style>
    </head>
    <body>
        <form class="login-form"  method="POST">
            <div class="login-form__logo-container">
                <h3 style="color: white; text-align: center;">SKY BANK LIMITED PAKISTAN</h3>
            </div>
            <div class="login-form__content">
                <div class="login-form__header">New Password will be send on your email</div>
                <input class="login-form__input" type="email" name="email" placeholder="Enter your email" required autofocus>
                <br><br>
                <button class="login-form__button" type="submit" name="log">Send</button>
                <div class="login-form__links">
                    <a class="login-form__link" href="index.php">Sign In</a>
                </div>
            </div>
        </form>
<script src="js/native-toast.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status']!=''){

?>
<script type="text/javascript">
    nativeToast({
  message: '<?php echo $_SESSION['status']?>',
  position: 'center',
  timeout: 4000,
  type: '<?php echo $_SESSION['code']?>',
  closeOnClick:true
 })
</script>
<?php
 unset($_SESSION['status']);
}
?>
    </body>
</html>

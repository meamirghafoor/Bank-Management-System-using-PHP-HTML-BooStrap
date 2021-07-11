<?php
session_start();
include 'conn.php';
if(isset($_POST['log']))
{
$email = $_POST["email"];
$pass = $_POST["pass"];
if(empty($email)){
	header("Location: index.php?error=");
      exit();
}else{
$sql ="SELECT u.*, e.* FROM users u,emp_details e WHERE u.username='$email' AND e.id=u.id";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $x = (mysqli_query($con,$sql));
if(mysqli_num_rows($x)>0){
if($row["username"]==$email && $row["password"]==$pass)
{
    if($row["status"]=="Active"){
    $_SESSION["loggedin"] = true;
    $idd=$row['id'];
    $_SESSION["type"] =$row['role'];
    $_SESSION["pass"] =$row['password'];
    $_SESSION["name"] =$row['name'];
    $_SESSION['img'] =$row['image'];
     $_SESSION["id"] =$row['id'];
    $_SESSION["email"] =$email;
    $_SESSION["status"]="Welcome ".$row['name'];
    $_SESSION["code"]="success";
    date_default_timezone_set('Asia/Karachi');
    $tms1 = date("Y-m-d h:i:s");
    $_SESSION["time"]=$tms1;
    mysqli_query($con,"INSERT INTO emp_history values('$idd','$tms1','logged still')");
  header("location: dashboard.php");
  exit();}else{
    $_SESSION["status"]="This user account is blocked";
    $_SESSION["code"]="error";
    header("Location: index.php");
      exit();
  }
}
else{
    $_SESSION["status"]="Invalid username or password";
    $_SESSION["code"]="error";
    header("Location: index.php");
      exit();
}
}
else{
    $_SESSION["status"]="Invalid username or password";
    $_SESSION["code"]="error";
    header("Location: index.php");
    exit();
}
}
}
?>
<!DOCTYPE html>
<html>
    <head>
         <title>SKY BANK | LOGIN</title>
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
                <div class="login-form__header">Welcome on Page</div>
                <input class="login-form__input" type="email" name="email" placeholder="Username" required autofocus>
                <input class="login-form__input" type="password" name="pass" placeholder="Password" required>
                <button class="login-form__button" type="submit" name="log">Login</button>
                <div class="login-form__links">
                    <a class="login-form__link" href="forget.php">Forgot Password?</a>
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

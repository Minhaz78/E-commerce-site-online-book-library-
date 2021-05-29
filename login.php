<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" text="text/css" href="Login.css">
</head>
<body>
    <div class="main">
        <h1>Login</h1>
      
          <div class="form-p">
            <form action="login.php" method="post">
              <input class="text" type="text" placeholder="userid" name="userid" >
              <input class="text" type="password" placeholder="Password" name="password" >
              <input type="submit" value="login" name="login">

            </form>
      
            <p><a href="#">Forget your password ?</a></p>
    
                <p>No account?please <a href="Sign.php">SIGNUP</a></p>
            
           
      
      
          </div>
        </div>
 
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['login']))
{
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $sql="select userid,password from admin where userid='$userid' and password='$password'";
    $sql1="select std_id,password from  student where std_id='$userid' and password='$password'";
            $r=mysqli_query($con,$sql);
            $r1=mysqli_query($con,$sql1);
            if(mysqli_num_rows($r)>0)
            {
                $_SESSION['userid']=$userid;
                $_SESSION['admin_login_status']="loged in";
                header("Location:admin/admin.php");
            }
            
            else if(mysqli_num_rows($r1)>0)
            {
                $_SESSION['userid']=$userid;
                $_SESSION['student_login_status']="loged in";
                header("Location:customer/customer.php");
            }
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
    
}
?>
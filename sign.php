<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel = "stylesheet" href="sign.css" type="text/css">
  <title>Sign Up Form</title>
 </head>
 <body>
 <div class="Sign">
  
 <h1>Sign Up Form</h1>
 <form action="sign.php" method="post">
  <input type="text" class="input" placeholder="Enter your std_id" name="std_id">
   <input type="text" class="input" placeholder="Enter your name" name="name">
  <input type="text" class="input" placeholder="Enter your address" name="address">
 <div>
 <input class="male" type="radio"  name="gender"value="male" checked> Male
  <input class="female" type="radio"  name="gender"value="female"checked> Female
  </div>
 <input type="number" class="input" placeholder="Enter your mobile" name="mobile">
 <input type="date" class="input" placeholder="Enter your dob" name="dob">
 <input type="email" class="input" placeholder="Enter your email" name="email">
 <div class="col-25">
      <label for="image">Picture</label>
    </div>
 <input  type="file"class="input" placeholder="Enter your image" name="pic">
 <input type="password" class="input" placeholder="Enter your password" name="password">
<p class="wr"><span><input type="checkbox"></span> I agree to the terms and services </p>
 <button class="btn" name="submit" >submit</button>
 <hr>
 <p class="or">OR</p>
 <button  class="btn">Login with Facebook</button>
 <p class="last">Do you have any account? <a href="login.php">Login</a></p>
 
 </form>
 </div>
 </body>
 </html>
 

<?php
include("connection.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	//customer id generation
	$num=rand(10,100);
	$std_id="c-".$num;
	
	
	
	
	$query="insert into student values('$std_id','$name','$address','$gender',$mobile ,'$dob','$email','$password')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		
    }
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>
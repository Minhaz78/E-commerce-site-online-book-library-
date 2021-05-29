<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['userid']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['userid']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel = "stylesheet" href="addcss.css" type="text/css">
  <title>welcome to Admin home page</title>
 </head>
 <body>
  <div class="topnav">
  <div class="topnav">
  <a href="admin.php">Home</a>
  <a href="addproduct.php">Add Product</a>
  <a href="store.php">Store</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>
</div>
 <div class="Sign">
  
 <h1>Add new product</h1>
 <form method="post" action="addproduct.php"  enctype="multipart/form-data">
  <div class="col-25">
      <label for="name">BOOk ID</label>
    </div>
  <input type="text" class="input" placeholder="Book Id" name="b_id">
  <div class="col-25">
      <label for="name">BOOK NAME</label>
    </div>
   <input type="text" class="input" placeholder="Book name" name="bname">
    <div class="col-25">
      <label for="name">BOOK TYPE</label>
    </div>
   <div class="col-75">
      <select id="btype" name="btype">
        <option value="Law">Law</option>
        <option value="English">English</option>
        <option value="Engineering">Engineering</option>
      </select>
    </div>
  
<div class="col-25">
      <label for="name">PUBLICATION NAME</label>
    </div>
 <input type="text" class="input" placeholder="Publication name" name="pub_name">
 <div class="col-25">
      <label for="name">BUYING PRICE</label>
    </div>
 <input type="text" class="input" placeholder="Buying price" name="buyprice">
 
 <div class="col-25">
      <label for="name">PRODUCT IMAGE</label>
    </div>
 <input type="file" id="image" placeholder="product image" name="pic">

  
   
 <button class="btn" name="ADD" >ADD</button>
 
 </form>
 </div>
 </body>
 </html>

<?php
include("../connection.php");
if(isset($_POST['ADD']))
{
	$b_id=$_POST['b_id'];
	$bname=$_POST['bname'];
	$btype=$_POST['btype'];
	$pub_name=$_POST['pub_name'];
	$buyprice=$_POST['buyprice'];
	
	//image upload code
	$ext= explode(".",$_FILES['pic']['name']);
    $c=count($ext);
    $ext=$ext[$c-1];
    $date=date("D:M:Y");
    $time=date("h:i:s");
    $image_name=md5($date.$time.$b_id);
    $image=$image_name.".".$ext;
	 
	
	
	$query="insert into books values('$b_id','$bname','$btype','$pub_name',$buyprice,'$image')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		if($image !=null){
	                move_uploaded_file($_FILES['pic']['tmp_name'],"../uploadedimage/$image");
                    }
    }
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>
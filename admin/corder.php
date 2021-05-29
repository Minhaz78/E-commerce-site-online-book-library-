<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>

<div class="header">
  <h1>Welcome to Admin Home Page</h1>
</div>

<div class="topnav">
  <div class="topnav">
  <a href="home.php">Home</a>
  <a href="addproduct.php">Add Book</a>
  <a href="store.php">Store</a>
  <a href="corder.php">Student Orders</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>
</div>

<div class="row">

  <div class="container">
     <h2>All Student Orders</h2>  
  <div class="row">
	<?php
 include("../connection.php");
 $sql="select * from student_order where status=0";
 $r=mysqli_query($con,$sql);
 echo "<table id='customers'>";
 echo "<tr>
 <th>Order ID</th>
 <th>Customer ID</th>
 <th>Order Date</th>
 <th>Action</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $oid=$row['order_id'];
		$cid=$row['std_id'];
		$odate=$row['order_date'];
    echo "<tr>
    <td>$oid</td><td>$cid</td><td>$odate</td><td><a href='corder.php?action=show&id=$oid'>Show Details</a></td>
    </tr>";
    }
	echo "</table>";
?>
  </div>
  </div>
  
  <div class="container">
<?php
include("../connection.php");
echo "<hr/>";
echo "<h2>Order Details</h2>";
if(isset($_GET['action']) and $_GET['action'] == 'show')
{
 $oid=$_GET['id'];
 $_SESSION['order_id']=$oid;
 $sql="select * from orderline where order_id='$oid'";
 $r=mysqli_query($con,$sql);
 echo "<table id='customers'>";
 echo "<tr>
 <th>Product ID</th>
 <th>Quantity</th>
 <th>Total Price</th>
  </tr>";
  $gtotal=0;
    while($row=mysqli_fetch_array($r))
    {
        $pid=$row['b_id'];
		$q=$row['quantity'];
		$total=$row['total'];
    echo "<tr>
    <td>$pid</td><td>$q</td><td>$total</td>
    </tr>";
	$gtotal=$gtotal+$total;
    }
	echo "<tr><td colspan='2' align='right'>Grand Total</td>
	<td>$gtotal</td></tr>";
	echo "</table>";
}
?>	
  </div>
  <form action='corder.php' method='post'>
<div class="row">
    <input type="submit" value="Confirm Order" name="corder">
</div>
</form>
<?php
include("../connection.php");
if(isset($_POST['corder']))
{
	$oid=$_SESSION['orderid'];
	$sql="select * from orderline where order_id='$oid'";
    $r=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($r))
    {
        $pid=$row['b_id'];
		$q=$row['quantity'];
		$sqlupdate="update store set quantity=quantity-$q where b_id='$pid'";
		mysqli_query($con,$sqlupdate);
    }
	$sqlorderupdate="update student_order set status=1 where order_id='$oid'";
    mysqli_query($con,$sqlorderupdate);
	echo "Order Confirmed!";
}
?>
</div>

<div class="footer">
  <h2>Copyright@puc.cse</h2>
  
</div>

</body>
</html>


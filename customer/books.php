<?php
   session_start();
   // Cart implementation code
   if(isset($_POST['add']))
   {
     if(isset($_SESSION['cart']))  
     {
     $item_array_id=array_column($_SESSION['cart'],'item_id'); 
     if(!in_array($_GET['id'],$item_array_id))
     {
       $count=count($_SESSION['cart']);
       $item_array= array ( 
       'item_id' => $_GET['id'],
       'item_name' => $_POST['hname'],
       'item_price' => $_POST['hprice'],
       'item_q' => $_POST['quantity']
       );
      $_SESSION['cart'][$count]=$item_array; 
     }
     else
     {
       echo "<script>alert('Item already added')</script>";
       echo "<script>window.location='books.php'</script>";
     }
     }  
       else
     {
       $item_array= array ( 
       'item_id' => $_GET['id'],
       'item_name' => $_POST['hname'],
       'item_price' => $_POST['hprice'],
       'item_q' => $_POST['quantity']
       );
       $_SESSION['cart'][0]=$item_array;
     }       
   }
   // Item Remove from cart
   if(isset($_GET['action']) and $_GET['action'] == 'delete')
   {
    foreach ($_SESSION['cart'] as $keys => $values)
    {
      if($values['item_id'] == $_GET['id'])
      {
        unset($_SESSION['cart'][$keys]);
      }
    }     
   }
   
   
   
   
   // Logout code
   if($_SESSION['student_login_status']!="loged in" and ! isset($_SESSION['userid']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
  $_SESSION['student_login_status']="loged out";
  unset($_SESSION['userid']);
  unset($_SESSION['cart']);
   header("Location:../index.php");    
   }
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="table.css">
<link rel="stylesheet" type="text/css" href="addcss.css">
</head>
<body>

<div class="header">
  <h1> Student </h1>
</div>

<div class="topnav">
  <div class="topnav">
  <a href="index.php">Home</a>
  <a href="books.php">All Books</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>
</div>

<div class="row">

  <div class="container">

  <form action="books.php" method="post">
  <div class="row">
    <div class="col-25">
    </div>
    <div class="col-75">
	<label for="catg">Select a Category</label>
	<select name="catg">
<?php
 include("../connection.php");
 $sql="select distinct btype from books";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $btype=$row['btype'];
        echo "<option value='$btype'>$btype</option>";
    }
?>
</select>
  </div>
  </div> 
  <div class="row">
    <input type="submit" value="GO" name="go">
  </div>
  </form>
</div>
<?php
include("../connection.php");
if(isset($_POST['go']))
{
	$c=$_POST['catg'];
	
	$query="select * from books,store where books.b_id=store.b_id and books.btype='$c'";
	$r=mysqli_query($con,$query);
	echo "<table id='customers'>";
 echo "<tr>
 <th>Book Name</th>
 <th>Book Type</th>
 <th>Publication Name</th>
 <th>Book Price</th>
 <th>Book Image</th>
 <th>Action</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
		  $b_id=$row['b_id'];
  $bname=$row['bname'];
  $btype=$row['btype'];
  $pub_name=$row['pub_name'];
  $buyprice=$row['buyprice'];
  $image=$row['image'];
    echo "<form action='books.php?action=add&id=$b_id' method='post'>";  
    echo "<tr>
    <td>$bname</td><td>$btype</td><td> $pub_name</td><td>$buyprice</td>
	<td><img src='../uploadedimage/$image' height='100px' width='100px'></td>
    <td><a href='corder.php?id=$b_id'>Order Now</a></td>
    <td><input type='text' value='1' name='quantity'>
  <input type='hidden' value='$bname' name='hname'>
  <input type='hidden' value='$buyprice' name='hprice'>
  </td>
  <td><input type='submit' value='Add to cart' name='add'></td>
  </tr>";
  echo "</form>";
    }
  
	echo "</table>";
}
?>
</div>
<div>
<h3>Order Details</h3>
<table id='customers'>
<tr>
 <th>Book Name</th>
 <th>quantity</th>
 <th>Book Price</th>
 <th>Total</th>
 <th>Action</th>
</tr>


<?php
if(!empty($_SESSION['cart']))
{
  $total=0;
  foreach ($_SESSION['cart'] as $keys => $values)
  {
    echo "<tr>";
?>    
    <td><?php echo $values['item_name']; ?></td>    
    <td><?php echo$values['item_q']; ?></td>
    <td><?php echo$values['item_price']; ?></td>
    <td><?php echo number_format($values['item_q']*$values['item_price'],2); ?></td>
    <td><a href='books.php?action=delete&id=<?php echo $values['item_id']; ?>'>Remove</a></td>
      </tr>
<?php   
    $total=$total+($values['item_q']*$values['item_price']);
  }
  echo "<tr>";
  echo "<td colspan='3' align='right'>Total</td>";
?>  
  <td><?php echo number_format($total,2); ?></td>
  <td></td>
<?php 
}
?>
</table>
<div>
<form action='books.php' method='post'>
<div class="row">
    <input type="submit" value="Submit your Order" name="corder">
</div>
</form>
<?php
// Save the orders in database
if(isset($_POST['corder']))
{
  include("../connection.php");
  $num=rand(10,1000);
  $order_id="O-".$num;
  $order_date=date("D-M-Y");
  $std_id=$_SESSION['userid'];
  $sqlorder="insert into student_order values('$order_id','$std_id','$order_date')";
  mysqli_query($con,$sqlorder);
  foreach ($_SESSION['cart'] as $keys => $values)
  {
    $total=0;
    $b_id=$values['item_id'];
    $quantity=$values['item_q'];
    $total=$values['item_q']*$values['item_price'];
    $sql="insert into orderline values('$order_id','$b_id','$quantity',$total)";
      mysqli_query($con,$sql);
  }
  echo "your order has been submited successfully";
  unset($_SESSION['cart']);
}
?>  
</div>
<div class="footer">
  
  
</div>
</body>
</html>


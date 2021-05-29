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
 <form method="post" action="store.php">
  <input type="submit" value="Show Book" name="show">
  </form>
  <?php
 include("../connection.php");
 if(isset($_POST['show']))
 {
 $sql="select * from books";
 $r=mysqli_query($con,$sql);
 echo "<table id='student'>";
 echo "<tr>
 <th>Book ID</th>
 <th>Book Name</th>
 <th>Book Type</th>
 <th>Publication Name</th>
 <th>Buying Price</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['b_id'];
    $pname=$row['bname'];
    $type=$row['btype'];
    $brand=$row['pub_name'];
    $price=$row['buyprice'];
    echo "<tr>
    <td>$id</td><td>$pname</td><td>$type</td><td>$brand</td><td>$price</td>
    </tr>";
    }
  echo "</table>";
 }
?>
<form action="store.php" method="post">
  <div class="row">
  <hr/>
  <h2 align='center'>Store New Book Information</h2>
    <div class="col-25">
      <label for="name">Book ID</label>
    </div>
    <div class="col-75">
  <select name="b_id">
<?php
 include("../connection.php");
 $sql="select b_id from books";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['b_id'];
        echo "<option value='$id'>$id</option>";
    }
 
 
 
?>
  </select>
    </div>
  </div>
  
  
  <div class="row">
    <div class="col-25">
      <label for="quantity">Quantity</label>
    </div>
    <div class="col-75">
      <input type="text" id="quantity" name="quantity" placeholder="quantity..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="sprice">Selling Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="sprice" name="sprice" placeholder="Selling Price..">
    </div>
  </div>
  
  <div class="row">
    <input type="submit" value="Add" name="submit">
  </div>
  </form>
</div>
 </body>
 </html>

<?php
include("../connection.php");
if(isset($_POST['submit']))
{
  $pid=$_POST['b_id'];
  $quantity=$_POST['quantity'];
  $sprice=$_POST['sprice'];
  
  $query="insert into store values('$pid',$sprice,$quantity)";
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
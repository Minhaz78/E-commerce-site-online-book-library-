<?php
   session_start();
   if($_SESSION['student_login_status']!="loged in" and ! isset($_SESSION['userid']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
  $_SESSION['student_login_status']="loged out";
  unset($_SESSION['userid']);
   header("Location:../index.php");    
   }
?>

<!DOCTYPE html>
<html lang="">
<head>
<title>Young Bengal Library</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/scripts/js.css" rel="stylesheet" type="text/css" >
<link href="login.php" rel="stylesheet">
<link href="sign.php" rel="stylesheet">
<link href="admin/admin.php" rel="stylesheet">
<link href="admin/addproduct.php" rel="stylesheet">

   
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul>
      <li><i class="fa fa-clock-o"></i> <h5>Today <?php echo date('d m y');?></h5></li>
      <li><i class="fa fa-phone"></i> +088 *** ****</li>
      <li><i class="fa fa-envelope-o"></i> info@youngbengal.com</li>
      <a href="changepass.php" style="float:right">Change Password</a>
 <li><a href="customer.php"><i class="fa fa-lg fa-home"></i></a></li>
 <button class="btn"><a href="?sign=out" style="colour:float:left;">Logout</a></button>	  
    

    </ul>
    <!-- ################################################################################################ -->

  </div>
</div>
 </div>
 

<!--1 ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('images/st.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <nav id="mainav" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="bengal.html">Home</a></li>
        <li><a class="drop" href="#">sub</a>
          <ul>
            <li><a href="pages/gallery.html">International law</a></li>
            <li><a href="pages/full-width.html">Muslim law</a></li>
            <li><a href="pages/sidebar-left.html">Hindu law</a></li>
            <li><a href="pages/sidebar-right.html">Land law</a></li>
            <li><a href="pages/basic-grid.html">criminal</a></li>
          </ul>
        </li>
        <li><a class="drop" href="#">Publications</a>
          <ul>
            <li><a href="#">Bengal publication</a></li>
            <li><a class="drop" href="#">sufi + Bengal publication</a>
              <ul>
                <li><a href="#">Chittagong</a></li>
                <li><a href="#">Dhaka</a></li>
                <li><a href="#">Comilla</a></li>
              </ul>
            </li>
            <li><a href="#">sufi</a></li>
          </ul>
        </li>
        <li><a href="#">writer</a></li>
        <li><a href="#">New Books</a></li>
        <li><a class="drop" href="#">Books</a>
              <ul>
                
                <li><a href="books.php">Bangla</a></li>
                <li><a href="#">English</a></li>
              </ul>
            </li>
            
    <li><a href="#about">About</a></li>
          <li><a>cart<i class="fa fa-shopping-cart"style="font-size:60px;"></i></a></li>
          <div class="topnav">
            <li><a href="#search"> <input type="text" placeholder="Search.."></a></li>
            <!-- new line from rokomari -->
            
<!-- end of this -->
             </div>
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </div>
 
  <!-- ################################################################################################ -->
   <div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left"style="color:black;">
      <h1><a href="bengal.php">Young Bengal </a></h1>
      <?php
 include("../connection.php");
 $stdid=$_SESSION['userid'];
 $sql="select name,address,gender,mobile,dob,email from student where std_id='$stdid'";
 $r=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($r);
 $name=$row['name'];
  $adds=$row['address'];
  $gender=$row['gender'];
  $mbl=$row['mobile'];
  $dob=$row['dob'];
  $email=$row['email'];
 echo "<h3>Hello I am $name.</h3>";
 echo "<p><b>address:</b> $adds</br><b>Gender:</b> $gender</br><b>Mobile No.:</b> $mbl</br><b>Date of Birth:</b> $dob</br><b>Email:</b> $email</br></p>";
?>  

    </div>
    <div class="fl_right"><a class="btn" href="#">Law Books</a></div>
    <!-- ################################################################################################ -->
  </header>
</div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->

  <div class="wrapper overlay">
    <article id="pageintro" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <h3 class="heading">More Information</h3>
      <p>If you want to buy book staying at home.you select book name & send your address.our delivary team reachable at time.</p>
      <footer><a class="btn" href="#">click Here</a></footer>
      <!-- ################################################################################################ -->
    </article>
</div>

<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h3 class="btn" >Read online</h3>
    </div>
     
      
    <!-- ##############################################product container################################################## -->
    <div class="product-container">
      <div id="heading-block">
        <h2>Categories</h2>
      </div>
      <!-- 1st catbox -->
      <a href="#">
        <div class="catbox">
          <img src="images/ahl.jpg" alt="Add to Cart">
          <span>Law</span>
          </div>
      </a>
            <!-- 2nd catbox -->
      <a href="#">
        <div class="catbox">
          <img src="images/acri.jpg" alt="Add to Cart">
          <span>Literature</span>
          </div>
      </a>
            <!-- 3rd catbox -->
      <a href="#">
        <div class="catbox">
          <img src="images/all.jpg" alt="Add to Cart">
          <span>BCS Book</span>
          </div>
      </a>
            <!-- 4th catbox -->
      <a href="#">
        <div class="catbox">
          <img src="images/aml.jpg" alt="Add to Cart">
          <span>Jobs Book</span>
          </div>
      </a>
            <!-- 5th catbox -->
      <a href="#">
        <div class="catbox">
          <img src="images/ail.jpg" alt="Add to Cart">
          <span>Others</span>
          </div>
      </a>
      <!-- heading category -->
      <div id="heading-block">
        <h2>Law Books</h2>
      </div>
      <div class="prod-container">
        <!-- 1st product -->
        <div class="prod-box">
          <img src="images/lacri.jpg"alt="Muslim-Law">
          <div class="prod-trans">
            <div class="prod-feature">
              <p>Criminal-Law</p>
              <p style="color: #fff;font-weight:bold; ">Price:$100</p>
              <input type="button"style="color: tomato;" value="Add to Cart">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay light" style="background-image:url('images/st.jpg');">
  <figure class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace group logos">
      <li class="one_quarter first"><a href="#"><img src="images/hl.jpg" alt=""></a></li>
      <li class="one_quarter"><a href="#"><img src="images/ll.jpg" alt=""></a></li>
      <li class="one_quarter"><a href="#"><img src="images/lab.jpg" alt=""></a></li>
      <li class="one_quarter"><a href="#"><img src="images/cri.jpg" alt=""></a></li>
    </ul>
    <!-- ################################################################################################ -->
  </figure>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="heading">Address</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          109 &amp;/chattashori road,golzar mor,chawkbazar,chattogram.
          </address>
        </li>
        <li><i class="fa fa-phone"></i> 01817774266</li>
        <li><i class="fa fa-envelope-o"></i> info@youngbengal.com</li>
      </ul>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>

    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
 
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
     <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
 <script src="layout/scripts/js/jquery.js"></script>
     <script src="layout/scripts/js/jquery.bxslider.js"></script>
     <script src="layout/scripts/js/my.js"></script>

</body>
</html>

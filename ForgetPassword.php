<?php


$conn= mysqli_connect("localhost","root","","fourcorners");
 if(isset($_POST['submit'])){
 
    
$Mail=$_POST['email'];
$Password=$_POST['password'];
            $sql = mysqli_query($conn,"SELECT count(*) as total from user where User_EMail='".$Mail."' ") or die(mysqli_error($conn));
        $rw= mysqli_fetch_array($sql);
     
      
 if($rw['total']>0){
             
 $sql="UPDATE `user` SET `User_Password`= '$Password'  WHERE User_EMail='$Mail' ";
        mysqli_query($conn,$sql);
   echo "<script>alert('You have successfully registered') </script>";    
            
        }
        else{
            echo"<script>alert('incorrect info')</script";
        }
    }

 
                            

 
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="author" content="Cable">
	<title>The Corners</title>
 <link rel="icon" href="images/deliverylogo.jpg">

	<link rel="stylesheet" type="text/css" href="includes/styles.css">
	  <script src="https://unpkg.com/scrollreveal"></script>
</head>
    
<body>
	<section class="register light">
      
		<header class="wrapper light">
			<a href="Home.html"><img class="hlogo" src="./images/logo23.png" alt="Restaurant Logo"/></a>
		<nav>
				<ul>
					<li><a href="Home.html" data-text="Home">Home</a></li>
					
					<li><a href="italianMenu.html"  data-text="Menu">Menu</a></li>
					
					
					<li><a href="AboutUs.html"  data-text="about us">About us</a></li>
					
					<li><a href="contactus.html"  data-text="contact us">Contact Us</a></li>
					<li><a href="Login.html"  data-text="login/Register">login/Register</a></li>
				</ul>
			</nav>
		</header>
   
	
	</section><!--  End of section one -->
	
	
<section>
    <div class="regist-Body">
		<h1 class="animate-top">Reset your password here!</h1>
		<form id="registration_form" method="post" action="">
		<div>
				
				<input type="email" id="email" name="email" required="">
				
				<label>Email</label>	
			</div>
			<div>
				<input type="text" id="password" name="password" required="">
				
				<label>New Password</label>	
			</div>
			<div>
				<input type="text" id="repassword" name="repassword" required="">
				<label>Re-Enter New Password</label>	
			</div>
			<div></div>
			 <div>
    <input type="submit" value="submit" name="submit" />
  </div>
		</form>
	</div>
    </section>
	
<!--  start of the footer -->
<footer >
  <div class="footer_contact">
    <h1 class="fourCornerT">Four Corners</h1>
        
    <h2>Contact</h2>
    
    <address>
     4877  Hartway Street 605-770-0737<br>   
      <a class="footerBtn" href="fourcorners@gmail.com">e-mail us</a>
    </address>
  </div>
  
  <ul class="footerNav">
	    <li>
      <h2 class="navTitle">Restaurant</h2>

      <ul class="nav_ul">
        <li>
          <a href="italianMenu.html">Menu</a>
        </li>

        <li>
          <a href="order.html">Order Now</a>
        </li>
            
        <li>
          <a href="#">Our Page</a>
        </li>
      </ul>
    </li>
	      <li>
      <h2 class="navTitle">Site Map </h2>
      
      <ul class="nav_ul nav_ul_extra">
        <li>
          <a href="Home.html">Home</a>
        </li>
        
        <li>
          <a href="italianCorner.html">Italian Corner</a>
        </li>
        
        <li>
          <a href="egyptianCorner.html">Egyptian Corner</a>
        </li>
           <li>
          <a href="AboutUs.html">About Us</a>
        </li>
        <li>
          <a href="indianCorner.html">Indian Corner</a>
        </li>
        
        <li>
          <a href="asianCorner.html">Asian Corner</a>
        </li>
        
     
      </ul>
    </li>
  
   
    
    <li >
      <h2 class="navTitle">Forms</h2>
      
      <ul class="nav_ul">
        <li>
          <a href="Login.html">Login</a>
        </li>
        
        <li>
          <a href="Register.html">Register</a>
        </li>
        
        <li>
          <a href="contactus.html">Contact Us</a>
        </li>
      </ul>
    </li>
	   

  </ul>
  
  <div class="copyrights">
    <p>&copy; 2020 FourCorners.Org All rights are reserved.</p>
  </div>
	</footer>
    <!--  End of the footer  -->
    
    <!--  scripts -->
    <!--  self note: the JS can sometimes stop working due to the local host -->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
     
      <script src="/includes/jquery-3.4.1.min.js" ></script>
   <!-- <script src="includes/test.js" ></script> -->

  
<script >
	window.onload = function() {
  validation();  
}
	</script>
<!--  End of home page -->
    
</body>
</html>

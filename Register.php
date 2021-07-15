<?php


$conn= mysqli_connect("localhost","root","","fourcorners");
 if(isset($_POST['submit'])){
 
      
$Fname=$_POST['first_name'];
$Lname=$_POST['last_name'];
$Address=$_POST['address'];
$DOB=$_POST['dob'];
$Mail=$_POST['email'];
$Password=$_POST['password'];
	 $reenteredpass=$_POST['repassword'];
$flag=false;
                            
 //$sql="INSERT INTO `user`(`User_ID`, `User_FirstName`, `User_LastName`, `User_Address`, `User_DOB`, `User_EMail`, `User_Password`, `Admin_privelage`) VALUES //('NULL','$Fname','$Lname','$Address','$DOB','$Mail','$Password','0')";
     //   mysqli_query($conn,$sql);
   //echo "<script>alert('You have successfully registered') </script>";
 //}
	if(empty($Fname)){

          $flag=true;
        echo "<script>alert('Registration failed');</script";
 }
      elseif(empty($Lname)){
   $flag=true;
         echo "<script>alert('Registration failed');</script";
 }
       elseif(empty($Address)){
   $flag=true;
         echo "<script>alert('Registration failed');</script";
 }
       elseif(empty($DOB)){

          $flag=true;
             echo "<script>alert('Registration failed');</script";
 }
       elseif(empty($Password)){
 
          $flag=true;
       echo "<script>alert('Registration failed');</script";
 }

     elseif(strlen($Password)<8){
         $flag=true;

         echo "<script>alert('Registration failed');</script";
     }

     elseif($Password!=$reenteredpass){
         $flag=true;
         echo "<script>alert('Registration failed');</script";
     }
     if($flag==false){
         $sql="INSERT INTO user(User_ID, User_FirstName, User_LastName, User_Address, User_DOB, User_EMail, User_Password, Admin_privelage) VALUES ('NULL','$Fname','$Lname','$Address','$DOB','$Mail','$Password','0')";
        mysqli_query($conn,$sql);
   echo "<script>alert('You have successfully registered') </script>";
		    

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
					<li><a href="Home.php" data-text="Home">Home</a></li>
					
					<li><a href="italianMenu.html"  data-text="Menu">Menu</a></li>
					
					
					<li><a href="AboutUs.php"  data-text="about us">About us</a></li>
					
					<li><a href="contactus.php"  data-text="contact us">Contact Us</a></li>
					<li><a href="Login.php"  data-text="login/Register">login/Register</a></li>
				</ul>
			</nav>
		</header>
   
	
	</section><!--  End of section one -->
	
	
<section>
    <div class="regist-Body">
		<h1 class=" animate-top">Register now to enjoy 50% off!</h1>
		<form id="registration_form" method="post" action="">
		<div>
				<input type="text" id="first_name" name="first_name" required="">
			
				<label class=" nimate-left">
					First Name
				</label>	
			</div>
			<div>
				<input type="text" id="last_name" name="last_name" required="">
			
			<label class=" animate-right">
					Second Name
				</label>	
			</div>
			<div>
				<input type="text" id="address" name="address" required="">
			
				<label class=" animate-right">
					Home Address
				</label>	
			</div>
            <div>
				<input type="text" id="dob" name="dob" required="">
			
				<label class=" animate-right">
				   DOB
				</label>	
			</div>
			<div>
				<input type="email" id="email" name="email" required="">
				
				<label class=" animate-left">Email</label>	
			</div>
			<div>
				<input type="text" id="password" name="password" required="">
				
				<label class=" animate-right">Password</label>	
			</div>
			<div>
				<input type="text" id="repassword" name="repassword" required="">
					<label class=" animate-left">Re-Enter Password</label>	
			</div>
			<div></div>
			 <div>
    <input type="submit" value="Submit" name="submit" />
  </div>
		</form>
	</div>
    </section>
	
<!--  start of the footer -->
		
<?php include('includes/footer.php'); ?>
    <!--  End of the footer  -->
    
    <!--  scripts -->
    <!--  self note: the JS can sometimes stop working due to the local host -->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
     
      <script src="/includes/jquery-3.4.1.min.js" ></script>
    <!--<script src="includes/test.js" ></script>-->
<script src="includes/test.js" ></script>
	<script >
    window.onload = function() {
  validation();
	}</script>
  <!-- 
<script >
	
window.sr = ScrollReveal();
sr.reveal(".animate-left", {
  origin: "left",
  duration: 1000,
  distance: "25rem",
  delay: 300
});

sr.reveal(".animate-right", {
  origin: "right",
  duration: 1000,
  distance: "25rem",
  delay: 600
});
sr.reveal(".animate-top", {
  origin: "top",
  duration: 1000,
  distance: "25rem",
  delay: 600
});
sr.reveal(".animate-bottom", {
  origin: "bottom",
  duration: 1000,
  distance: "25rem",
  delay: 600
});

	</script>
 End of home page -->
    
</body>
</html>

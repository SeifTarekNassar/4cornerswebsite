

<?php


$conn= mysqli_connect("localhost","root","","fourcorners");
 if(isset($_POST['submit'])){
$Name=$_POST['Name'];
$Mail=$_POST['Email'];
$Num=$_POST['Phone'];
$Text=$_POST['Msg'];
                            
 $sql="INSERT INTO `review` (`ReviewID`, `ReviewDesc`, `Name`, `PhoneNo.`, `Review_Email`) VALUES (NULL, '$Text', '$Name', '$Num', '$Mail');";
       // $sql = "INSERT INTO `review` ('ReviewID', 'ReviewDesc', 'Name', 'PhoneNo.', 'Cust_ID'  ,'Review_Email') VALUES (NULL, '$Text', '$Name', '$Num', '8' ,'$Mail');";
        mysqli_query($conn,$sql);
   echo "<script>alert('Thank you <3  '+ ' $Name '+ ' for your review ! ') </script>";
 }
?>

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
	<section class="contactus light">
      
		<header class="wrapper light">
			<a href="#"><img class="hlogo" src="./images/logo23.png" alt="Restaurant Logo"/></a>
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
	    <div class="contact-section">
        <h1 class="animate-top">Contact US</h1>
        <form method="POST" action="#"  class="contact-form">
            <input type="text" name="Name" class="contact-form-text" placeholder="Enter Your name, please" required>
            <input type="email" name="Email" class="contact-form-text" placeholder="Enter Your email, please" required>
            <input type="text" name="Phone" class="contact-form-text" placeholder="Enter Your phone, please" required>

            <textarea class="contact-form-text" name="Msg" placeholder="Type Your message, please" required></textarea>

            <input type="submit" name="submit" class="contact-form-btn" value="Send">

        </form>
    </div>
	
<!--  start of the footer -->
		
<?php include('includes/footer.php'); ?>
    <!--  End of the footer  -->
    
    <!--  scripts -->
    <!--  self note: the JS can sometimes stop working due to the local host -->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
     
      <script src="/includes/jquery-3.4.1.min.js" ></script>

    <script src="includes/test.js" ></script>

<!--  End of home page -->
    
</body>
</html>

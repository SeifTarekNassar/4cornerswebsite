<?php   
session_start();
$firstname=$_SESSION['Userfirst']; 
$lastname=$_SESSION['Userlast']; 
 




$conn= mysqli_connect("localhost","root","","fourcorners");
 if(isset($_POST['submit'])){
$CID=$_POST['cid'];
$oID=$_POST['orid'];

                $sql = "DELETE FROM `orderr` WHERE ORID = '$oID'";            
 
        mysqli_query($conn,$sql);
   echo "<script>alert('Thank you <3  '+ ' $firstname '+ we hope that it wont be last time with us! ') </script>";
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="author" content="Cable">
	<title>The Corners</title>
 <link rel="icon" href="images/deliverylogo.jpg">

<style>
<?php include 'includes/styles.css'; ?>
</style>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	  <script src="https://unpkg.com/scrollreveal"></script>
</head>
	<body>
			
<section class="caption33 light">
      
		<header class="wrapper light">
		
			<a href="Home.html"><img class="hlogo" src="./images/logo23.png" alt="Restaurant Logo"/></a>
			<nav>
				<ul>
					<li><a href="Home.php" data-text="Home">Home</a></li>
					
					<li><a href="italianMenu.html"  data-text="Menu">Menu</a></li>
					
					
					<li><a href="AboutUs.html"  data-text="about us">About us</a></li>
					
					<li><a href="contactus.php"  data-text="contact us">Contact Us</a></li>
					
				</ul>
			</nav>
		</header>


	</section>
		<!--  End of section one -->
<section class="order-section">
  <div class="shop__header">
    <h1 class="shop__title">Order Now !</h1>
    <p class="shop__text">
      <a class="button2 js-toggle-cart" href="#" title="View cart">
        View Cart
      </a>
    </p>
  </div>
		<div id="states_bar">
    	<ul>
        	<li><?php       echo"<a href='#'> Hello <3!   $firstname $lastname </a>"; ?></li>
         <li id="logoutbtn"><a href='includes/logout.php' >LogOut </a></li>
        </ul>
    </div>
  <div class="order-body">
    <div class="products">
<!--item -->
		<?php
		
		$conn= mysqli_connect("localhost","root","","fourcorners");
		
		 $sql = mysqli_query($conn,"SELECT * FROM `meal`") or die(mysqli_error($conn)); 
		
		
		while($row = mysqli_fetch_array($sql)){
			echo "<div class='products__item'>
        <article class='product'>
          <h1 class='product__title'>$row[title] </h1>	
        <img src=$row[img]>
          <p class='product__text'>'$row[description]'
            <a  class='button js-add-product' title='Add to cart'  name='$row[title]' data-text='$row[code]' data-int='$row[price]'>
              Add to cart</a ><select class = 'product__quantity ' name='$row[title]'>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
</select></p></article></div>";
	
		}
	?>
     
    </div>
  </div>
</section>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<aside class="cart js-cart">
  <div class="cart__header">
    <h1 class="cart__title">Your Cart</h1>
    <p class="cart__text">
      <a class="button button--light js-toggle-cart" href="#" title="Close cart">
        X
      </a>
    </p>
  </div>
  <div class="cart__products js-cart-products">
    <p class="cart__empty js-cart-empty">
      Your Cart is empty
    </p>
    <div class="cart__product js-cart-product-template">
      <article class="js-cart-product">
        <h5 id="itemname">Item Is Added</h5>
        <p>
          <a class="js-remove-product" href="#" title="Delete product">
            remove
          </a>
        </p>
      </article>
    </div>
  </div>
  <div class="cart__footer">
	  <p class="cart__text"> </p>
    <p class="cart__text">
      <a class="button" href="#" title="Buy products" onclick="sendbill();">
        Order Now
      </a>
    </p>
  </div>
</aside>

<div class="lightbox js-lightbox js-toggle-cart"></div>
  	    	    <div class="contact-section">
        <h1 class="animate-left">Cancel Order</h1>
        <form method="POST" action="#"  class="contact-form">
            
            <input type="text" name="orid" class="contact-form-text animate-left" placeholder="Enter your Order number" required>

            <textarea class="contact-form-text" name="cid" placeholder="Please enter your problem or suggestion" required></textarea>

            <input style="color:red;" type="submit" name="submit" class="contact-form-btn animate-left" value="Send">

        </form>
    </div>
		
<?php include('includes/footer.php'); ?>

		 
     
       
     
    <script><?php  include('includes/test.js'); ?></script>
<script >
	window.onload = function() {
  ordernow();  
}
	</script>

    </body>

</html>

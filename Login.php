<?php
$conn= mysqli_connect("localhost","root","","fourcorners");
  if(isset($_POST['username']))
    {
        $uname = $_POST["username"];
        $password = $_POST["password"];
		  $check = $_POST["admincheck"];
        $sql = mysqli_query($conn,"SELECT count(*) as total,User_FirstName,User_ID,User_LastName,Admin_privelage from user where User_EMail='".$uname."' and User_Password='".$password."'") or die(mysqli_error($conn));
        $rw= mysqli_fetch_array($sql);
      
      if(empty($uname)){
    $name_error = "<span style='color:red;text-align:center; font-size:12px;'>Please insert your username</span>";
         
    
}
if(empty($password)){
    
    $password_error = "<span style='color:red;text-align:center; font-size:12px; '>Please insert your password</span>";
}
        if (strlen($uname)<3&&strlen($uname)>1){
          
          $name_error = "<span style='color:red;text-align:center; font-size:12px; '>Your username must be at least 3 charachters long</span>";
      }
      if(strlen($password)<5&& strlen($password)>1){
          $password_error = "<span style='color:red;text-align:center; font-size:12px; '>Your password must be at least 8 charachters long</span>";
      }
       if (strlen($uname)>20){
          
          $name_error = "<span style='color:red;text-align:center; font-size:12px; '>Your username can not exceed 20 charachters</span>";
      }
       if(strlen($password)>20){
          $password_error = "<span style='color:red;text-align:center; font-size:12px; '>Your password can not exceed 20 charachters</span>";
      }
      
    
        if($rw['total']>0){
            session_start();
            $_SESSION['Userfirst']= $rw[User_FirstName];
			  $_SESSION['Userlast']=$rw[User_LastName];
            $_SESSION['User_id']= $rw[User_ID] ;
			
			if($rw[Admin_privelage]>0 && $check=="admin"){  
           echo "<script>alert('Welcome Admin :'+ ' $rw[User_FirstName]'+' '+'$rw[User_LastName]');
    function pageRedirect() {
        window.location.replace('admin/index.html');
    }
    setTimeout('pageRedirect()', 100);
</script>";}
			elseif($rw[Admin_privelage]>0 ){  
           echo "<script>alert('You have successfully logged in'+ ' Welcome '+ ' $rw[User_FirstName]'+' '+'$rw[User_LastName]');
    function pageRedirect() {
        window.location.replace('Home.php');
    }
    setTimeout('pageRedirect()', 100);
</script>";}
           if($rw[Admin_privelage]<=0){  
           echo "<script>alert('You have successfully logged in'+ ' Welcome '+ ' $rw[User_FirstName]'+' '+'$rw[User_LastName]');
    function pageRedirect() {
        window.location.replace('order.php');
    }
    setTimeout('pageRedirect()', 100);
</script>";}
            
        }
        else{
            echo"<script>alert('invalid info')</script";
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
		<section>
			<div class="loginbg"></div>
    <div class="loginbox">
		<a href="Home.php"><img  src="images/logo23.png" class="avatar"></a>
        <h1>Login Here</h1>
        <form method="POST" action="#">
        <p>Username</p>
            <input type="text"  name="username" placeholder="Please enter your username" ><br/>
            <?php if(isset($name_error)){ ?>
            <p><?php echo $name_error ?></p>
             <?php }?>   

            <p>Password</p>
            <input type="password"  name="password" placeholder="Please enter your password" > <br/>
            <?php if(isset($password_error)){ ?>
            <p><?php echo $password_error ?></p>
             <?php }?> 
			
			<input class="admincheckb" type="checkbox"  name="admincheck" value="admin">
 <label class="admincheck">Admin </label>
            <input type="submit" name="submit"  value="Login">
			
            <a href="ForgetPassword.php">Forgot Password?</a><br>
            <a href="Register.php">Don't have an account?</a>
			
        </form>
        </div>
			</section>
		
    	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
     
      <script src="/includes/jquery-3.4.1.min.js" ></script>
      <script src="includes/test.js" ></script>
    
    </body>

</html>
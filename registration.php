<?php
include_once "layout.php";
include_once "connection.php";
$error=""; $email_error="";
if(isset($_POST['register']))
{
	$name=mysqli_escape_string($conn,$_POST['name']);
	$email=mysqli_escape_string($conn,$_POST['email']);
	$password=mysqli_escape_string($conn,$_POST['password']);
	$conpass=mysqli_escape_string($conn,$_POST['conpass']);

	if($password!=$conpass)
{
	  $error="Password Doesnot match";
}

$email_exist="SELECT email FROM register_table WHERE email='$email'";
$query=mysqli_query($conn,$email_exist);

if(mysqli_num_rows($query)>0)
{
  $email_error= "This mail is already registered";
}

else
{
	$password=md5($password);
	$sql="INSERT INTO register_table(name,email,password) VALUES('$name','$email','$password')";

	$query=mysqli_query($conn,$sql);
	

	if($query)
	{ 
	  
	  echo "<script>alert('you are registered')</script>";
      
	}
}
}


?>

<!DOCTYPE html>
<body>
<div class="reg-w3">
 <div class="w3layouts-main">
	<h2>Register Now</h2>
		<form action=" " method="post">
			<input type="text" class="ggg" name="name" placeholder="NAME" required="">
			<input type="email" class="ggg" name="email" placeholder="EMAIL" required="">
			<span><?= $email_error ?></span>
			<input type="password" class="ggg" name="password" placeholder="Password" required="">
			<span><?=$error ?></span>
			<input type="password" class="ggg" name="conpass" placeholder="Confirm Password" required="">
		    

			<h4><input type="checkbox" />I agree to the Terms of Service and Privacy Policy</h4>
			
				<div class="clearfix"></div>
				<input type="submit" value="submit" name="register">
		</form>
		<p>Already Registered.<a href="login.php">Login</a></p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>

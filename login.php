<?php
include_once 'connection.php';

$invalid=""; session_start();

  if(isset($_SESSION['login_user']))
{
	header('location:index.php');
} 
if(isset($_POST['login']))
{
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);
	 
	$password=md5($password);

	$sql= "SELECT * FROM register_table WHERE email='$email' AND password='$password'";
	$query= mysqli_query($conn,$sql);

	if(mysqli_num_rows($query)>=1)
	{
	    $_SESSION['login_user']=$email;
		header('location:index.php');
	}
	else{$invalid="Wrong Email or Password!!!";}
	
}
?>

<!DOCTYPE html>
<?php
include_once 'login-layout.php';
?>

<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		<form action="?" method="post">
			<span><?= $invalid ?></span>
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>
		<p>Don't Have an Account ?<a href="registration.php">Create an account</a></p>
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

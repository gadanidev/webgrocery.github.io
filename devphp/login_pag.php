<?php include 'connect.php';
 error_reporting(0);

if (isset($_POST['submit'])) {

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$login = "select * from tbl_member where username='$user' AND password = '$pass' ";
	$res = mysqli_query($con, $login);
	$num = mysqli_num_rows($res);

	if ($num==1) {	
	
		$_SESSION['USER_LOGIN']='yes';
			$_SESSION['USER_USERNAME']=$user;
			setcookie ("username",$_POST["username"],time() + (10 * 365 * 24 * 60 * 60));
	setcookie ("password",$_POST["password"],time() + (10 * 365 * 24 * 60 * 60));
			
			header('location:shopping_cart.php');
			

			die();
			
		} 
 else {
	 $flag=1;

	}
}	
if (isset($_POST['reg'])) {
	
		
	header('location:registraton.php');
			

	die();
	}	?>


<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN PAGE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet'  href='login__page.css' />
	<link rel="stylesheet" href="style.css">
</head>
<div class="signin">
	<div class="container">

		<img src="../img/dm_logo1_.png" alt="logo_of_website" class="logo">
		<div class="backcont">
		<b>login form </b>

		<form class="attributes" method="post">

			<input type="text" placeholder="enter ur email" name="username">
			<input type="password" placeholder="enter ur password" name="password">

			<button type="submit" name="submit" class="btn btn-green btn-center animated">SIGN IN</button><br>
			<button type="submit" name="reg" class="btn btn-green  btn-center animated">SIGN UP</button>
		</form>
	<?php if($flag==0){ 
	}
	else{
		$flag=0;
		?>

				<h4 style="color:white;"><?php echo "PLEASE ENTER CORRECT LOGIN DETAILS";?></h1>
		<?php 

	} ?>	

	</div>
	</div>
</div>

</body>

</html>
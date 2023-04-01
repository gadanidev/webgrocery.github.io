<?php
include('connect.php');
require('functions.inc.php');
$msg = '';

if (isset($_POST['submit'])) {
	$username =  $_POST['username'];
	$password =  $_POST['password'];
	$sql = "select * from admin_users where username='$username' and password='$password'";

	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if ($count > 0) {
		$row = mysqli_fetch_assoc($res);
		if ($row['status'] == '0') {
			$msg = "Account deactivated";
		} else {
			$_SESSION['ADMIN_LOGIN'] = 'yes';
			$_SESSION['ADMIN_ID'] = $row['id'];
			$_SESSION['ADMIN_USERNAME'] = $username;
			$_SESSION['ADMIN_ROLE'] = $row['role'];
			header('location:http://localhost/projectdev/adimfiles/home.php#');
			die();
		}
	} else {

		$msg = "PLEASE ENTER CORRECT LOGIN DETAILS";
	}
}

?>
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ADMIN PAGE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel='stylesheet' type='text/css' href='login__page.css' />
</head>

<div class="signin">
	<div class="container">
		
		<img src="../img/dm_logo1_.png" alt="logo_of_website" class="logo">
		<b>adim form </b>
		<form class="attributes" method="post">
			<input type="text" placeholder="enter ur email" name="username">
			<input type="password" placeholder="enter ur password" name="password">

			<button type="submit" name="submit" class="btn btn-center">SIGN IN</button>

		</form><?php if ($msg = '\0') {
				} else { ?>
			<div class="flied_error"><?php echo $msg ?></div>
		<?php } ?>
	</div>
</div>

</body>

</html>
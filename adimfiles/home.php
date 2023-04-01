<?php include "../adimfiles/dasboard.php";
if(isset($_SESSION['ADMIN_LOGIN'])){
}
else{
	header('location:http://localhost/projectdev/devphp/adim.php');
}?>
<iframe src="../index1.php"></iframe>
<?php include "../adimfiles/dashboardfot.php" ; ?>
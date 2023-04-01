<?php include "../adimfiles/dasboard.php";
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=$_GET['id'];
	$res=mysqli_query($con,"select * from subcategories where id='$id'");
	

		// header('location:categories.php');
	

}

if(isset($_POST['submit'])){
	$categories=$_POST['categories'];
	$res1="select * from subcategories where categories='$categories'";
	$res=mysqli_query($con,$res1);
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="CATEGORIES ALREADY EXIST";
			}
		}else{
			$msg="CATEGORIES ALREADY EXIST";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update subcategories set categories='$categories' where id='$id'");
		}else{
			mysqli_query($con,"insert into subcategories(categories,status) values('$categories','1')");
		}
		header('location:cat.php');
		die();
	}
}
?>
<div class="addcat">
<div class="addcat-head">
CATEGORIES FORM
</div>
<div class="addcat-toadd"> to add categrios enter categories name below:</div><br><br><br>


<form method="post">
									<label for="categories" class=" form-control-label">Categories :</label>
									<input type="text" name="categories" placeholder="ENTER CATEGORIES NAME" class="addcat-text" required value="<?php echo $categories?>">
								
							   <button name="submit" type="submit"  class="btn">
							   <span id="payment-button-amount">SUBMIT</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							
						</form>
</div>
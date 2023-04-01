<?php 
include "dasboard.php";

$coupon_code='';
$coupon_type='';
$coupon_value='';
$cart_min_value='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=$_GET['id'];
	$res=mysqli_query($con,"select * from coupon_master where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$coupon_code=$row['coupon_code'];
		$coupon_type=$row['coupon_type'];
		$coupon_value=$row['coupon_value'];
		$cart_min_value=$row['cart_min_value'];
	}else{
		header('location:coupon.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$coupon_code=$_POST['coupon_code'];
	$coupon_type=$_POST['coupon_type'];
	$coupon_value=$_POST['coupon_value'];
	$cart_min_value=$_POST['cart_min_value'];
	
	$res=mysqli_query($con,"select * from coupon_master where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="COUPON CODE ALREADY EXIST";
			}
		}else{
			$msg="COUPON CODE ALREADY EXIST";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update coupon_master set coupon_code='$coupon_code',coupon_value='$coupon_value',coupon_type='$coupon_type',cart_min_value='$cart_min_value' where id='$id'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into coupon_master(coupon_code,coupon_value,coupon_type,cart_min_value,status) values('$coupon_code','$coupon_value','$coupon_type','$cart_min_value',1)");
		}
		header('location:coupon.php');
		die();
	}
}?>

<div class="addcat">
<div class="addcat-head">
COUPON FORM
</div>
<div class="addcat-toadd">  enter coupon details below:</div><br>
                        <form method="post" enctype="multipart/form-data">
							
							   
											
									<label class="categories-l">Coupon Code :</label>
									<input type="text" name="coupon_code" placeholder="Enter coupon code" class="addcat-text" required value="<?php echo $coupon_code?>"><br>
								
								
									<label class="categories-l">Coupon Value</label>
									<input type="text" name="coupon_value" placeholder="Enter coupon value" class="addcat-text" required value="<?php echo $coupon_value?>"><br>
								
								
									<label class="categories-l">Coupon Type :</label><br>
									<select  name="coupon_type" class="categrios" id="categories"required>
										<option value=''>Select :</option>
										<?php
										
											echo '<option value="Percentage" selected>Percentage</option>';					
									
									
										?>
									</select><br>
							
								
									<label class="categories-l">Cart Min Value :</label><br>
									<input type="text" name="cart_min_value" placeholder="Enter cart min value" class="addcat-text"  required value="<?php echo $cart_min_value?>">
							
								
								<br>
							   <button id="payment-button" name="submit" type="submit" class="btn">
							   <span id="payment-button-amount">SUBMIT</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
						</form></div>
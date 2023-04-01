<?php include "../adimfiles/dasboard.php";
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=$_GET['type'];
	if($type=='status'){
		$operation=$_GET['operation'];
		$id=$_GET['id'];
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update coupon_master set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=$_GET['id'];
		$delete_sql="delete from coupon_master where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}
$sql="select * from coupon_master order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="title-topic" >coupon master </div>
<div class="title-topic-1"><a href="man_coupon.php">manage coupon</a> </div>
					  <table class="info info-coupon" >
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th width="2%">ID</th>
							   <th width="20%">Coupon Code</th>
							   <th width="20%">Coupon Value</th>
							   <th width="20%">Coupon Type</th>
							   <th width="10%">Min Value</th>
							   <th width="26%"></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=0;
							while($row=mysqli_fetch_assoc($res)){	$i++?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['coupon_code']?></td>
							   <td><?php echo $row['coupon_value']?></td>
							   <td><?php echo $row['coupon_type']?></td>
							   <td><?php echo $row['cart_min_value']?></td>
							  
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='action action-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='action action-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='action action-edit'><a href='man_coupon.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='action action-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				  
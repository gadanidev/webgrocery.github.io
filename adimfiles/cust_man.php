<?php 
include "../adimfiles/dasboard.php";





if(isset($_GET['type']) && $_GET['type']!=''){
	$type=$_GET['type'];
	if($type=='delete'){
		$id=$_GET['id'];
		$delete_sql="delete from tbl_member where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from tbl_member order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="title-topic" >customer</div>

					  <table class="info info-cust">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Name</th>
							   <th>Password</th>
							   <th>Email</th>
						       <th>Date</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=0;
							while($row=mysqli_fetch_assoc($res)){	$i++?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['username']?></td>
							   <td width="60%"><?php echo $row['password']?></td>
							   <td><?php echo $row['email']?></td>
							   <td><?php echo $row['create_at']?></td>
							   <td>
								<?php
								echo "<span class='action action-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>

			
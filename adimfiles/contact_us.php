<?php include "../adimfiles/dasboard.php";

if(isset($_SESSION['ADMIN_LOGIN'])){
}
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=$_GET['type'];
	if($type=='delete'){
		$id=$_GET['id'];
		$delete_sql="delete from contact_us where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from contact_us order by id asc";
$res=mysqli_query($con,$sql);
?>
<div class="title-topic" > contact us </div>

					  <table class="info info-cont">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Name</th>
							   <th>Email</th>
							   <th>Mobile</th>
							   <th>Message</th>
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
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['email']?></td>
							   <td><?php echo $row['mobile']?></td>
							   <td><?php echo $row['comment']?></td>
							   <td><?php echo $row['added_on']?></td>
							   <td>
								<?php
								echo "<span class='action action-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
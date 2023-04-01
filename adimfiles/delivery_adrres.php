<?php 



if(isset($_GET['type']) && $_GET['type']!=''){
	$type=$_GET['type'];
	if($type=='delete'){
		$id=$_GET['id'];
		$delete_sql="delete from delivery adress where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from delivery adress order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="title-topic" >delivery address</div>

					  <table class="info info-cust">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>UserName</th>
							   <th>FirstName</th>
							   <th>LastName</th>
						       <th>Address</th>
						       <th>Pincode</th>
						       <th>extra_phone number</th>
						       
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
							   <td><?php echo $row['firstname']?></td>
							   <td><?php echo $row['lastname']?></td>
							   <td width="60%"><?php echo $row['adrress']?></td>
							   <td><?php echo $row['pincode']?></td>
							   <td><?php echo $row['extra_phno']?></td>
							   <td>
								<?php
								echo "<span class='action action-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>

			
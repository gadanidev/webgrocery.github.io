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
		$update_status_sql="update subcategories set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=$_GET['id'];
		$delete_sql="delete from subcategories where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}
$sql = "select * from subcategories order by categories asc";
$res = mysqli_query($con, $sql);
?>
  
  


<div class="title-topic" >CATEGORIES </div>
<div class="title-topic-1"><a href="man_cat.php">ADD CATEGORIES</a> </div>
<table class="info info-cat">
    <thead>
        <tr>
            <th class="serial">#</th>
            <th>ID</th>
            <th>CATEGORIES</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($res)) { $i++ ?>
            <tr>
                <td class="serial"><?php echo $i ?></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['categories'] ?></td>
                <td><div class="action">
                    <?php
                    if ($row['status'] == 1) {
                        echo "<span class='action-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
                    } else {
                        echo "<span class='action-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
                    }
                    echo "<span class='action-edit'><a href=man_cat.php?id=" . $row['id'] . ">Edit</a></span>&nbsp;";

                    echo "<span class='action-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";

                    
                    ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php 
include "../adimfiles/dashboardfot.php" ; ?>
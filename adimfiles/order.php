<?php 
include "../adimfiles/dasboard.php";


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
                               <th>Email</th>
						   
							   <th>orders</th>
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
                               <td><?php echo $row['email']?></td>
							   
                               <td>
                                       <table class="info info-cust">
						 <thead>
							<tr>
							   <th >order_no</th>
							   <th>username</th>
							   <th>Name</th>
							   <th>Quantity</th>
                               <th>Date</th>
							</tr>
						 </thead>
						 <tbody>
                         <?php
                         $pid=$row['username'];
                         $sqli="select * from orderuser where user_name='$pid'";
                      
                         $res1=mysqli_query($con,$sqli); 
                         while($final=mysqli_fetch_assoc($res1)){  echo"
							<tr>
                           
							   <td>  $final[order_no]</td>
							   <td>  $final[user_name]</td>
                               <td>  $final[proname]</td>
                                <td>  $final[quantity]</td>
                                <td> $final[date]</td>
                         ";
                         
                         
                         }
                         ?>  
                         </tbody></table> 
                            </td>
							  
							 
							</tr>
					<?php  }?>
						 </tbody>
					  </table>

                        
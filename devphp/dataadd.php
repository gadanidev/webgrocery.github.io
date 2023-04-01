<?php 
include "hftitle.php";
$flag=0;
$grand_total= $_SESSION['subtotal'];
if(isset($_SESSION['cart'])){
if(isset($_GET['id'])){
$id=$_GET['id'];
$data = "select * from delivery_address where id='$id'";
$q = mysqli_query($con, $data);
$address = mysqli_fetch_assoc($q);

 ?>
   <div class="tbody">
        <div class="cart-head">Shopping Cart</div>
        <form action="itemscart.php?page=cart" method="post">
            <table>
                <thead>
                    <tr>

                        <td colspan="2">Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody class="tbody">
            
                    
                   
                        <?php foreach($_SESSION['cart'] as $x => $val) : 
                             $data = "select * from products where id='$x'";

                             $q = mysqli_query($con, $data); 
                 
                             $final_pro = mysqli_fetch_assoc($q);  ?>
                            <tr>
                                <td class="img">
                                    <a href="itemscart.php?page=product&id=<?= $final_pro['id'] ?>">
                                        <img src="<?= $final_pro['img'] ?>" width="50" height="50" alt="<?= $final_pro['name'] ?>">
                                    </a>
                                </td>
                                <td > 
                                <a href="itemscart.php?page=product&id=<?= $final_pro['id'] ?>" name="order"><?= $final_pro['name'] ?></a>
                                   <input type="hidden" name="order" value="<?= $final_pro['id']?>">
                                    <br>
                                   
                                </td>
                                <td class="price">Rs <?= $final_pro['price'];  ?></td>
                                <td class="quantity">
                               <?php echo $val?>
                                <td class="price">Rs <?= $final_pro['price']* $val  ?></td>
                            </tr>
                        <?php endforeach; ?>
            
                </tbody>
            </table>
        
        </form></div>

                        

        <div class="final_add">  
      
         Delivery address :<br><br>
           <?php

        
                $flat = $address['floor_no'];
                $tower = $address['tower_no'];
                if ($flat = null ||
                    $tower = null
                ) {
                    echo $address['pincode'] . ",<br>";
                    echo $address['flat/hose_no'] . ",<br>";
                    echo $address['floor_no'] . ",<br>";
                    echo $address['tower_no'] . ",<br>";
                    echo $address['building name'] . ",<br>";
                    echo $address['address'] . ",<br>";
                    echo $address['landmark/area'] . ",<br>";
                    echo $address['city/state'] . "<br>";
                } else {
                    echo $address['nameas'] . "<br>";
                    echo $address['flat/hose_no'] . ",<br>";
                    echo $address['building name'] . ",<br>";
                    echo $address['address'] . ",<br>";
                    echo $address['landmark/area'] .",";
                    echo $address['city/state'] . ",<br>";
                    echo $address['pincode'] . "<br>";
                   
            
                } 
               
            
            }


else {
    if(isset($_POST['submit'])){
  
$nameas=$_SESSION['USER_USERNAME'];
$pin=$_POST['pin'];
$flat_hoseno=$_POST['fhno'];
$flo_no=$_POST['fn'];
$tono=$_POST['tn'];
$bulapn=$_POST['ban'];
$add=$_POST['address'];
$landarea=$_POST['la'];
$city_state=$_POST['cs'];
$pro_id=$_SESSION['cart'];


$sql="INSERT INTO `delivery_address`(`pincode`, `flat/hose_no`, `floor_no`, `tower_no`, `building name`, `address`, `landmark/area`, `city/state`, `nameas`,`pro_id`,`quantity`) VALUES ('$pin','$flat_hoseno','$flo_no','$tono','$bulapn','$add','$landarea','$city_state','$nameas','','')";

$result=mysqli_query($con,$sql);
$adi="SELECT id from delivery_address WHERE pincode='$pin' ";
$p1=mysqli_query($con,$adi);
$p2=mysqli_fetch_assoc($p1);
$id=$p2['id'];
header("Location:dataadd.php?page=product&id=$id");
 }else{} }
   
}
else{
    header("location:shopping_cart.php");
}
if(isset($_GET['submit'])){

foreach($_SESSION['cart'] as $x => $val) {
    $username=$_SESSION["USER_USERNAME"];
    $f_pron="select name from products where id= '$x'";
    $p=mysqli_query($con,$f_pron);
    $grand=$_SESSION['grandtotal'];
    $pro_name=mysqli_fetch_assoc($p);
    $pp=$pro_name['name'];
    ECHO $pp;

  
    $orderin="INSERT INTO `orderuser`(`order_no`, `user_name`, `pro_id`, `proname`, `quantity`, `date`,`grandtotal`) VALUES('','$username','$x','$pp','$val',now(),'$grand')";
    $result=mysqli_query($con,$orderin);

    unset($_SESSION['cart']);
    header("location:placeorder.php");
}}
else{
}
?>
              </div>
        </div>



        <?php $coupon="SELECT * FROM coupon_master";
    $coup=mysqli_query($con,$coupon);
    
    while($minvalue=mysqli_fetch_assoc($coup)){
      
        if($_SESSION['subtotal']>=$minvalue['cart_min_value']){

            $_SESSION['grandtotal']=$_SESSION['subtotal'];
            $coupon_value=$minvalue['coupon_value'];
            if($minvalue['status']=="0"){
               
            if($minvalue['coupon_type']="Percentage"){
                $flag=1;
                $per= $coupon_value/100  ;
              $centage=  $_SESSION['subtotal'] * $per  ;
              $grand_total= $_SESSION['subtotal']-$centage ;
              $_SESSION['grandtotal']=$grand_total;
            }else{

            }
            }

        }
    }?>

        <div class="makepayment">
  
        <p class="pay"> payment details</p><br>
        <p class="save" >subtotal  Rs <?php echo   $_SESSION['subtotal'] ;?><br><br>
        <?php if($flag==1){ ?>
           <p class="save-1" > you save -<?php echo $coupon_value ; ?>%off</p><?php }?>
         <p class="save" >grandtotal  Rs <?php echo $grand_total;?><br><br></p>
<form action="dataadd.php" method="get">
                         <input type="radio" name="cod" checked class="cod">   cash on delivery
<br>     <input type="submit" class="mpay u-mrgtop-8" name="submit" value=" make payment">        
</form>
</p>    
                       
            </div>
   




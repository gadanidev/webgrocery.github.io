<?php 
include "hftitle.php";
include "fhtitle.php";



if (isset($_SESSION['USER_USERNAME'] ) ||
 isset($_COOKIE['username'])
|| isset($_COOKIE['password'])) {
   $user=$_COOKIE['username'];
   
 $_SESSION['USER_USERNAME']=$user;
}
else{
    header('location:login_pag.php');
}
if(isset($_GET['id'])){
$pid=$_GET['id'];
$sql = "select * from products where id= '$pid'";
$query = mysqli_query($con, $sql);
$product=mysqli_fetch_assoc($query);

}
else {
    echo "hello";   
}





?>



   <img src="<?= $product['img'] ?>" width="25%" height="10%" alt="<?= $product['name'] ?>" class="pro-img">
   
   
  
            <div class=" pro-name"><?= $product['name'] ?></div>
            <div class="pro-price">
                Rs <?= $product['price'] ?>
                <?php if ($product['rrp'] > 0) : ?>
                    <span class="rrp">&dollar;<?= $product['rrp'] ?></span>
                <?php endif; ?>
            </div>
            <form action="itemscart.php?page=cart" method="post">
                <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity'] ?>" placeholder="Quantity" class="pro_Quantity" required>
                <input type="hidden" name="product_id" value="<?=$product['id'] ?>">
                <input type="submit" value="Add To Cart" class="btn-add_to_cart">
              
            </form>
            <div class="pro-desc">
                <?= $product['desc'] ?>
        </div>
   
</div>

<?php 
require 'hftitle.php';
require 'fhtitle.php';


?>

    <?php $data = "select * from products";
    $q = mysqli_query($con, $data);
    
    while ($product = mysqli_fetch_assoc($q)) { ?>
        <div class="table">
           
     
            <div class="table-proimg"><img src="<?php echo $product['img']; ?>"  ></div>
            <div class="table-proname"><?php echo $product['name']; ?></div>
            
            <div class="table-proprice">Rs<?php echo $product['price']; ?>   
           <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        
        </div>
       
            <a href="pro_help.php?page=product&id=<?=$product['id']?>" class="btn-add_to_cart"  > ADD TO CART 
            </a>
        </div>
    <?php } ?>

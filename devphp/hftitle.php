 <?php 
  include "connect.php"; 
  $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shoopingcart </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

</head>

<body>



    <div class="nav-shop">
        <div class="nav-shop-head">
            shopping cart </div>
            <!-- <form action="itemscart.php" method="post">
        
            <select class="categrios" name="subcat">

            <?php #$res1="select * from subcategories";
	#$res=mysqli_query($con,$res1);

    // while($namecat=mysqli_fetch_assoc($res)){
    ?>
  <option value="mail.php" class="categrios-cat"> <?php #if(isset($_POST['subcat'])){} echo $namecat['categories'];
 ?></a></option>
<?php #}?>
            </select>
    </form> -->


        <div class="nav-shop-menu">

            <ul>
                <li><a href="../index1.php">home</a></li>
                <li><a href="shopping_cart.php">Products</a></li>
            </ul>
        </div>
            <a href="itemscart.php?page=cart" class="mycart"> my cart(      
                <?php  echo $num_items_in_cart;?>)
            </a>
        </div>
        <hr>
        
        <div class="nav-shop-icons">

        </div>

    </div>
    <main>
<?php 
include "../devphp/connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adim</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body bgcolor="#CBC3E3">

    <div class="container">


        <div class="aheader"><img src="../img/dm_logo1_.png" alt="dd">
            <a href="#">welcome <?php echo $_SESSION['ADMIN_USERNAME']?></a>
        </div>
        <div class="content">
            <div class="topic">
                <ul>
                    <li><a href="home.php" class="activeh">home    </a></li>
                    <li><a href="cat.php">categroies     </a></li>
                    <li><a href="coupon.php">coupon     </a></li>
                    <li><a href="cust_man.php">customer management    </a></li>
                    <li><a href="contact_us.php">contact us    </a></li>
                    <li><a href="order.php">Orders    </a></li>
                    <li><a href="add_product.php">Add Product  </a></li>
                </ul>
            </div>
            <div class="view">
                
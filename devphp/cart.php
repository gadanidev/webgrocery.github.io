<?php 
include 'connect.php';
if($con){
    echo "yes";
}
$d=$_POST['product_id'];
$r=$_POST['quantity'];
echo $d . $r;

if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the POST variables so we easily identify them, also make sure they are integer   
    $quantity = (int)$_POST['quantity'];
    $product_id = (int)$_POST['product_id'];
    $pid = $_POST['product_id'];

  
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $sql="select * from products where id='$pid'";
    $query = mysqli_query($con, $sql);
   echo "yes";
   $product=mysqli_fetch_assoc($query);
   if($product && $quantity >0){
    echo "yes1";
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        echo "yes2";
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            echo "yes3";
            // Product exists in cart so just update the quanity
            $_SESSION['cart'][$product_id] += $quantity;
                echo "yes";
        } else {
             echo "yes5";
            // Product is not in cart so add it
            $_SESSION['cart'][$product_id] = $quantity;
          
        }}
      else{
       
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    }
print_r( $_SESSION['cart']);
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
print_r( $products);
$subtotal = 0.00;
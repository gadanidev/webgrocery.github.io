<?php

require 'hftitle.php';
require 'fhtitle.php';
include_once 'functions.php';
$pdo = pdo_connect_mysql();



if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the POST variables so we easily identify them, also make sure they are integer   
    $quantity = (int)$_POST['quantity'];
    $product_id = (int)$_POST['product_id'];
    $pid = $_POST['product_id'];


    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $sql = "select * from products where id='$pid'";
    $query = mysqli_query($con, $sql);

    $product = mysqli_fetch_assoc($query);
    if ($product && $quantity > 0) {

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {

            if (array_key_exists($product_id, $_SESSION['cart'])) {

                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {

                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {

            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }

        // Prevent form resubmission...
        header('location: itemscart.php?page=cart');
        exit;
    }
}
// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: itemscart.php?page=cart');
    exit;
}


$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();

$subtotal = 0.00;
if ($products_in_cart) {


    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    // print_r( $array_to_question_marks);
    // $sql="SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')";
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // $query=mysqli_query($con,$sql);
    $stmt->execute(array_keys($products_in_cart));

    $PID = array_keys($products_in_cart);


    // We only need the array keys, not the values, the keys are the id's of the products
    //     print_r(array_keys($products_in_cart));

    // // // Fetch the products from the database and return the result as an Array
    // $sql="SELECT * FROM products WHERE id IN (' . $PID . ')";
    // $query = mysqli_query($con, $sql);

    // $PRODUCTS=mysqli_fetch_assoc($query);
    // $products=$PRODUCTS;


    // 

    // print_r($products);
    // // 

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // // Calculate the subt otal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
        
    }
    
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  
    header("Location: address.php");
    
    

    exit;
}
}

?>




    <div class="cart">
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
                <tbody>
                    <?php if (empty($products)) : ?>
                        <tr>
                            <td colspan="5">
                                <div class="cart-notfound">You have no products added in your Shopping Cart</div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td class="img">
                                    <a href="itemscart.php?page=product&id=<?= $product['id'] ?>">
                                        <img src="<?= $product['img'] ?>" width="50" height="50" alt="<?= $product['name'] ?>">
                                    </a>
                                </td>
                                <td>
                                    <a href="itemscart.php?page=product&id=<?= $product['id'] ?>" name="order"><?= $product['name'] ?></a>
                                   <input type="hidden" name="order" value="<?= $product['id']?>">
                                    <br>
                                    <a href="itemscart.php?page=cart&remove=<?= $product['id'] ?>" class="remove ">Remove</a>
                                </td>
                                <td class="price">Rs <?= $product['price'];  ?></td>
                                <td class="quantity">
                                    <input type="number" name="quantity-<?= $product['id'] ?>" value="<?= $products_in_cart[$product['id']] ?>" min="1" max="<?= $product['quantity'] ?>" placeholder="Quantity" required>
                                </td>
                                <td class="price">Rs <?= $product['price'] * $products_in_cart[$product['id']] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="subtotal">
                <span class="subtotal-text">Subtotal</span>
                <span class="subtotal-price">Rs <?= $subtotal ?></span>
              <?php   $_SESSION['subtotal']=$subtotal;?>
            </div>
            <div class="buttons">
                <input type="submit" value="Update" name="update" id="but-sub">
                <input type="submit" value="Place Order"  name="placeorder" id="but-sub">
                
            </div>
        </form>
    </div>

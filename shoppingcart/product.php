<a>
// Check to make sure the id parameter is specified in the URL
// if (isset($_GET['id'])) {
//     // Prepare statement and execute, prevents SQL injection
//     $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
//     $stmt->execute([$_GET['id']]);
//     // Fetch the product from the database and return the result as an Array
//     $product = $stmt->fetch(PDO::FETCH_ASSOC);
//     // Check if the product exists (array is not empty)
//     if (!$product) {
//         // Simple error to display if the id for the product doesn't exists (array is empty)
//         exit('Product does not exist!');
//     }
// } else {
//     // Simple error to display if the id wasn't specified
//     exit('Product does not exist!');
// }</a>
<?php include '../devphp/connect.php';



if (isset($_SESSION['ADMIN_USERNAME'])) {
  
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


<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="<?=$product['img']?>" width="700" height="350" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            Rs <?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="../devphp/cart.php" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['desc']?>
        </div>
    </div>
</div>

<?=template_footer()?>
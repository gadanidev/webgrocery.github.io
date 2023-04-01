<?php include "dasboard.php";
if(isset($_POST['submit'])){
    echo "hello";
$pro_name=$_POST['pro_name'];
$pro_desc=$_POST['pro_desc'];
$price=$_POST['price'];
$rrp=$_POST['rrp'];
$Quantity=$_POST['quantity'];
$img=$_POST['img_link'];


$insert="INSERT INTO `products`(`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`, `sub_id`) VALUES ('','$pro_name','$pro_desc','$price','$rrp','$Quantity','$img',now(),'')";
 $query=mysqli_query($con,$insert);

header('location:home.php');
}



?>
    
    <div class="addcat">
    <div class="addcat-head">
Product Form
</div>

    <div class="addcat-toadd"> enter product  detail below:</div><br>
<form action="add_product.php" method="post">
<label for="categories" class="addprolabel">Product_name :</label>
<input type="text" name="pro_name" placeholder="ENTER PRODUCT NAME" class="addcat-text" required ><br>

<label for="categories" class="addprolabel">Product_Description</label>
<input type="text" name="pro_desc" placeholder="ENTER PRO_DESC" class="addcat-text" required value="stay safe<p>At Cure Grocery Store, we guarantee you the perfect maintenance of hygiene ensured throughout the delivery of your products. Each product is assured to be of best of the quality and true to the quantity. (Please note: the delivery of the products might take 2-3 business days. </p> <h3>Points</h3><ul><li>Product may slightly differ from the displayed picture</li><li>Made in India </li><li>Questions about the product? Contact us and we?ll get back to you!</li></ul>"><br>
<label for="categories" class="addprolabel">Price</label><br>
<input type="text" name="price" placeholder="ENTER PRICE" class="addcat-text" required ><br>
<label for="categories" class="addprolabel">Recommended retail price</label>
<input type="text" name="rrp" placeholder="ENTER RRP" class="addcat-text" required ><br>
<label for="categories" class="addprolabel">Quantity </label>
<input type="text" name="quantity" placeholder="ENTER QUANTITY" class="addcat-text" required ><br>
<label for="categories" class="addprolabel">img_link</label>
<input type="text" name="img_link" placeholder="ENTER IMAGE LINK" class="addcat-text" required ><br>

<input type="submit" name="submit" class=""><br>

</form>
 

</body>
</html>
    </div>

<?php include "dashboardfot.php";?>
    
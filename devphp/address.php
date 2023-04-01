<?php include "hftitle.php";
$user = $_COOKIE['username'];
$data = "select * from delivery_address where nameas='$user'";
$q = mysqli_query($con, $data);
$i = 0;
$check=empty($q);
?>
<div class="row">
    <div class="col-1-of-2">
        <div class="default_address">
            <div class="head">
                <h4>Select Delivery Address :</h4>
            </div>
            <?php
             if(mysqli_num_rows($q)>0){    
     
            while ($address = mysqli_fetch_assoc($q)){ ?>
            <div class="mcard">
                <div class="card">
  
                        <?php

                        $i++;
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
                           
                        } ?>
                             <a href="dataadd.php?page=product&id=<?=$address['id']?>   " class="btn-add_to_cart" id="btn-deliver">  deliver here           </a>
                        
                        
                </div>
                </div>
            <?php

            }}else { ?><div class="placeorder" id="not-found" > <h1>please add the address</h1> </div><?php } ?>

        </div>

    </div>



    <div class="col-1-of-2">

        <div class="address">
            <form method="post" action="dataadd.php">
                <label class="add_label u-mrgbottom-8"><b> add new on here :
                    </b>
                </label>
                <label class="add_label">pincode:</label>
                <input type="number" id="input_add" name="pin"  required>

                <label class="add_label">flat/house no:</label>
                <input type="number" id="input_add" name="fhno" required>

                <label class="add_label">floor no:</label>
                <input type="number" id="input_add" name="fn">

                <label class="add_label">tower no:</label>
                <input type="number" id="input_add" name="tn">

                <label class="add_label">bulding/apratment name:</label>
                <input type="text" class="input_add" name="ban" required>

                <label class="add_label">address:</label>
                <input type="text" class="input_add" required name="address">

                <label class="add_label">landmark /area :</label>
                <input type="text" class="input_add" required name="la" required>

                <label class="add_label">city / state :</label>
                <input type="text" class="input_add" name="cs" required>
                <br>
                <input type="submit" name="submit"value="submit"  >

            </form>
        </div>
    </div>
</div>
<?php include "fhtitle.php"; ?>
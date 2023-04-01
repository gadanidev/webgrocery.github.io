<?php include 'connect.php';

if (isset($_POST['submit'])) {

    $password = $_POST["password"];
    $cpassword = $_POST["con_password"];
    $caplital_user = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST['phone_no'];
    $username=strtolower($caplital_user);

    $searchuser = "select * from tbl_member where username='$username'      ";
    $search = mysqli_query($con, $searchuser);
 
    $num = mysqli_num_rows($search);
    if ($num > 0) {
        echo "user already exists";
    } 
      
        else {
            if ($password == $cpassword) {
                
            
              $sql = "INSERT INTO `tbl_member`(`id`, `username`, `password`, `email`,`phone_no`, `create_at`) VALUES ('','$username','$password','$email','$phone',now())";
                $regis = mysqli_query($con, $sql);
                if($regis){
                   
             

                }
                else{

                    // toast 
                    echo"not insterted";
                }
               

            } else {

                //toast
                echo "please enter same password";
                echo "please enter same password";
                exit;
          
           
            }
       
    }
}


if (isset($_POST['log'])) {
	
		
	header('location:login_pag.php');
			

	die();
	}



?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
  
    <link rel="stylesheet" href="login__page.css">
</head>

<body>
    <div class="signin">

        <div class="container">
            <b>registration form</b>
            <form method="POST" class="attributes">
                <input type="text" placeholder="enter username" name="username">
                <input type="email" placeholder="enter ur email" name="email">
                <input type="password" placeholder="enter ur password" name="password">
                <input type="password" placeholder="conform password " name="con_password">
                <input type="number " placeholder="phone no  " name="phone_no">
                <button type="submit" name="submit" class="btn btn-center btn-green">SIGN UP</button><br>
                <button type="submit" name="log" class="btn btn-green btn-center animated">SIGN IN</button>
            </form>
        </div>
    </div>

</body>

</html>
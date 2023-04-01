<?php
include "connect.php";
if (isset($_POST['submit'])) {
    if (
        !isset($_POST['username']) ||
        !isset($_POST['emailadd']) ||
        !isset($_POST['phone_number']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message']) 
        )
     {echo "please enter the message";
    }



        $username = $_POST['username'];
        $email = $_POST['emailadd'];
        $moblie = $_POST['phone_number'];
        $comment = $_POST['message'];
        $subject = $_POST['subject'];




        $sql = "INSERT INTO `contact_us`(`id`, `name`, `email`, `mobile`, `subject`,`comment`, `added_on`) VALUES ('','$username','$email','$moblie','$subject','$comment',now())";
        $query = mysqli_query($con, $sql);
        header('location:../index1.php');
        if ($query) {
        } else {
            echo "not";
        }
    
}
?>

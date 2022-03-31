

<?php
if(isset($_POST['submit2'])){
    include "users/config.php";
    $email=$_POST['feedemail'];
    $message=$_POST['feedmessage'];
    $sql="INSERT INTO feedback(feedmail,feedmessage) VALUES('$email','$message')";
    if(mysqli_query($con,$sql))
    {
    header("location:index1.php");
    }
    else
    die("failed");
}
?>
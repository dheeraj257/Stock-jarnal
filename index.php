<?php
session_start();
if(isset($_SESSION['username'])){
    header("location:index1.php");
}
 ?>

<?php
        if(isset($_POST['submit'])){
            include "users/config.php";
            $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
            $password=mysqli_real_escape_string($con,$_POST['password']);
            $sql="select * from user where mobile='{$mobile}' and pass='{$password}'";
        $result=mysqli_query($con,$sql) or die("query failed...");

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION['username']=$row['f_name'];
                $_SESSION['user_id']=$row['cust_id'];
                $_SESSION['email']=$row['email'];
                $_SESSION['mobile']=$row['mobile'];
                
                header("location:index1.php");
            }
        }else{

            echo '<script>alert("Username and password are not matching")</script>';

        }
        }
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>USER | Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body onload="myfun()">
        <!--preloader open-->
        
   <div id="loading">
       <style>
           #loading{
               position:fixed;
               width:100%;
               height:100vh;
               z-index:999;
               background:#fff url(loading.gif) no-repeat center;
           }
       </style>
       
   </div>
        <!--preloader close-->
        
        
    <style>
            .main1{
                padding: 0px 400px
            }
           @media screen and (max-width: 900px) {
            .main1{
                padding: 0px 0px;
            }
        }
    </style>
    <script>
            function myFunction1() {
            var x, text;
            x = document.frm1.mobile.value;
            if (isNaN(x)) {
                alert("Phone number is not valid");
                document.frm1.mobile.focus();
            } 
            }
            </script>
            <div class="main1 container">
                 <div class="col-md-offset-3 col-12">
                     <br>
                       <h3 style="padding:10px 10px; text-align:center; border-radius:50px; box-shadow:2px 2px 5px #19e; text-transform:uppercase;">Trading Journal</h3>
                       <br>
                        <form name="frm1"  action="<?php $_SERVER['PHP_SELF']?>" autocomplete="on" method ="POST">
                        <fieldset style="box-shadow:0px 0px 50px 2px black; padding:10px 10px; border-radius:10px">
                        <legend style="background-color:#19e; border-radius:20px; padding:5px;">User Login Page </legend>
                        
                            <div class="form-group">
                                <label>Mobile no.</label>
                                <input type="text" name="mobile" maxlength="10" class="form-control" placeholder="Enter Mobile number" required>
                            </div>
                            <div class="form-group">
                                <label>4 digit PIN.</label>
                                <input type="password" maxlength="4" name="password" class="form-control" placeholder="Enter PIN" required>
                            </div>
                            <div  style="width: auto; height:auto; text-align:center;">
                            <input type="submit" onclick="myFunction1()" name="submit" class=" btn" value="" required  style=" background-repeat:no-repeat; background-image: url(https://img.icons8.com/fluent/48/000000/login-rounded-right.png); height: auto; width: auto; text-align:center; padding:10px 25px; background-color:#fff;"/>
                            </div>
                            </fieldset>
                            <br>
                            <p style="text-align: center; margin:0; "><a href="">Term</a> and <a href="">condition</a></p>
                            <p style="text-align: center; margin:0; "><a href="users/forgot.php">Forgot password?</a></p>

                            
                            <p style="text-align: center; margin:0; ">OR</p>
                            <a style="height: 40px; width: 100%; background-color:#19e; color:black;" class="col-12 btn" href="users/register.php">Register</a>
                            <br>
                            <br>
                            <br>
                            <p style="text-align: center; margin:0; "><a href="">POWERED BY D-Compute</a></p>
                            <br>
                        </form>
                    </div>
            </div>
            
                     <script>
            function myfun(){
                var var1=document.getElementById('loading');
                var1.style.display='none';
            }
        </script>
    </body>
</html>

                    
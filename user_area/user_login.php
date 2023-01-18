<?php
  
include("../includes/connect.php");
include("../functions/common_function.php");

@session_start();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="lstyle.css">
<title>Login</title>
</head>
<body>
    <form action="" method="POST" >  
        <fieldset>
            <h1 style="text-align:center;">Login</h1>
        <label>Username</label>
            <input type="text" name="username" required>
                <label>Password</label>
                          <input type="password" name="passwords" required><br><br>
                          <input type="submit" name="sub" value="Login"><br>
</fieldset>
<a href="user_registration.php">New user? SIGNUP</a>
</form>
</body>
</html>
<?php

    if(isset($_POST['sub']))
    {
        $username=$_POST['username'];
        $passwords=$_POST['passwords'];
        $qry= "SELECT * FROM user_table  WHERE user_name='$username' AND user_password='$passwords';";
        $result=mysqli_query($con,$qry);
        $user_ip=getIPAddress();
        //cart items
$select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
        if(mysqli_num_rows($result)==0)
        {
            echo"<script>alert('INCORRECT USERNAME OR PASSWORD')</script>";
        }
        elseif(mysqli_num_rows($result)==1 and $row_count_cart==0)
        {
          
            $_SESSION['user_name']=$username;
             echo"<script> alert('login successfuly')</script>";
             echo"<script>window.open('profile.php','_self')</script>";
          }else{
            $_SESSION['user_name']=$username;
             echo"<script> alert('login successfuly')</script>";
            echo"<script>window.open('payment.php','_self')</script>";

          }
        }

    ?>
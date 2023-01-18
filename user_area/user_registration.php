
<html>
    <head>
    <link rel="stylesheet" href="cstyle.css">
        <title>
            Create an account
        </title>
    </head>
        <body>
            
            <form class="login-form" method="post" action="">
                <fieldset>
                <h1>Create Account</h1>
            <label>Username</label><br>
            <input type="text" name="username" id="username"><br><br>
            <label>Email</label><br>
            <input type="email" name="email" id="email"><br><br>
            <label>Password</label><br>
            <input type="passwords"name="passwords" id="passwords"><br><br>
                          <!-- confirm password -->
                
<!--<label > confirm password</label><br>
<input type="password" name="conf_user_password" id="conf_user_password"><br><br>-->
            
            <label>Phone Number</label><br>
            <input type="int" name="mobno" id="mobno" maxlength="10" pattern="[0-9]{10}"><br><br>
             <input type="submit" name="sub" value="REGISTER"><br>
            </fieldset>
            <a href="user_login.php">Existing User? Login.php</a>
            </form>
        </body>
</html>                                                                                                    
<?php
session_start();
include("../includes/connect.php");
include("../functions/common_function.php");
if(isset($_POST['sub']))
{
   
    $username=$_POST['username'];
    $email=$_POST['email'];
    $passwords=$_POST['passwords'];
   // $conf_user_password=$_POST['conf_user_password'];
  // $password_hash($user_password, PASSWORD_DEFAULT);
    $mobno=$_POST['mobno'];
    $user_ip=getIPAddress();
    $reg=mysqli_query($con,"SELECT user_name FROM user_table WHERE user_name='$username' || user_mobile='$mobno'");
    $result=mysqli_fetch_array($reg);
    if($result>0)
    {
        echo"<script>alert('THIS ID OR MOBILE NO IS ALREADY REGISTERED')</script>";
    //}else if($user_password!=$conf_user_password){
       // echo"<script>alert('password dosenot match')</script>";
    }
    else
    {
        $query=mysqli_query($con, "INSERT INTO user_table (user_name,user_email,user_password,user_ip,user_mobile) VALUES('$username', '$email', '$passwords','$user_ip','$mobno')");
        if($query)
        {
            echo"<script>alert('REGISTERED SUCCESSFULLY')</script>";
        }
        else
        {
            echo"<script>alert('SOMETHING WENT WRONG')</script>";
        }
}
  //selecting cart items
  $select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
  $result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['user_name']=$username;
  echo"<script> alert('you have items in your cart')</script>";
  echo"<script>window.open('checkout.php','_self')</script>";
}else{
  echo"<script>window.open('../index.php','_self')</script>";

}

    }
?>
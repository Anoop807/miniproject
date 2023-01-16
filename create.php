<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'shoemart');
if(isset($_POST['user_register']))
{
   
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();
    $reg=mysqli_query($con,"SELECT user_table  FROM signup WHERE user_name=' $user_username' || user_mobile='$user_contact'");
    $result=mysqli_fetch_array($reg);
    if($result>0)
    {
        echo"<script>alert('THIS ID OR MOBILE NO IS ALREADY REGISTERED')</script>";
    }
    else
    {
        $query=mysqli_query($con, "INSERT INTO user_table(user_name,user_email,user_ip,user_password,user_mobile) VALUES(' $user_username', ' $user_email', '$user_password', '$user_ip','$user_contact')");
        if($query)
        {
            echo"<script>alert('REGISTERED SUCCESSFULLY')</script>";
        }
        else
        {
            echo"<script>alert('SOMETHING WENT WRONG')</script>";
        }
}
    }
?>
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
            <label>Phone Number</label><br>
            <input type="int" name="mobno" id="mobno" maxlength="10" pattern="[0-9]{10}"><br><br>
             <input type="submit" name="sub" value="REGISTER"><br>
            </fieldset>
            <a href="login.php">Existing User? Login.php</a>
            </form>
        </body>
</html>                                                                                                    

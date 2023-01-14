<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'shoemart');
if(isset($_POST['sub']))
{
   
    $username=$_POST['username'];
    $email=$_POST['email'];
    $passwords=$_POST['passwords'];
    $mobno=$_POST['mobno'];
    $reg=mysqli_query($con,"SELECT username FROM signup WHERE username='$username' || mobno='$mobno'");
    $result=mysqli_fetch_array($reg);
    if($result>0)
    {
        echo"<script>alert('THIS ID OR MOBILE NO IS ALREADY REGISTERED')</script>";
    }
    else
    {
        $query=mysqli_query($con, "INSERT INTO signup(username, email, passwords, mobno) VALUES('$username', '$email', '$passwords', '$mobno')");
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

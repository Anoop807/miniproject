
<?php
{
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"shoemart");
    if(isset($_POST['sub']))
    {
        $username=$_POST['username'];
        $passwords=$_POST['passwords'];
        $qry= "SELECT * FROM signup WHERE username='$username' AND passwords='$passwords';";
        $result=mysqli_query($con,$qry);
        if(mysqli_num_rows($result)==0)
        {
            echo"<script>alert('INCORRECT USERNAME OR PASSWORD')</script>";
        }
        else
        {
            header('location:index.php');
        }
    }
}
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
<a href="create.php">New user? SIGNUP</a>
</form>
</body>
</html>
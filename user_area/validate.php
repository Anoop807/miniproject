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
           
        }
    }
}
    ?>

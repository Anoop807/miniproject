<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'shoemart');
if($con){
    echo"";
}else{
    die('query failed');
}
?>
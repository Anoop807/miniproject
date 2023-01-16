<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'shoemart');
if($con){
    echo"haha";
}else{
    die('query failed');
}
?>
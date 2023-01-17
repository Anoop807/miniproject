<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="style.css">
</head>
<style>
  body{
    overflow-x: hidden;
  }
</style>
<body>
    <div class="container-fluid my-3">
<h2 class="text-center">login</h2>
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
        <form action="" method="post">
            <!-- user -->
            <div class="form-outline mb-4">
<label for="user_username" class="form-labal">username</label>
<input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="user_username"/>
            
 
                     <!-- password -->
                     <div class="form-outline mb-4">
<label for="user_password" class="form-labal">password</label>
<input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="user_password"/>
            
            </div>
  
    
            <div class="mt-4 pt-2">
                <input type="submit" value="login"class="bg-dark text-light py-2 px-3 border-0" name="user_login">
                <p class="small">you dont have account? <a href="./user_registration.php">register</a></p>
            </div>
            </div>

           
        </form>
    </div>
</div>

    </div>
</body>
</html>
<?php
if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];
$select_query="SELECT * FROM `user_table`WHERE user_name='$user_username'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();

//cart items
$select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
if($row_count>0){
  $_SESSION['user_name']=$user_username;
  if(password_verify($user_password,$row_data['user_password'])){
   // echo"<script> alert('login successfuly')</script>";
   if($row_count==1 and $row_count_cart==0){
    $_SESSION['user_name']=$user_username;
     echo"<script> alert('login successfuly')</script>";
     echo"<script>window.open('profile.php','_self')</script>";
   }else{
    $_SESSION['user_name']=$user_username;
    echo"<script> alert('login successfuly')</script>";
    echo"<script>window.open('payment.php','_self')</script>";
   }
  }else{
    echo"<script> alert('inavlidate')</script>";
  }
}else{
  echo"<script> alert('inavlidate')</script>";
}
}

?>
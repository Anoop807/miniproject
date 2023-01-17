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
<body>
    <div class="container-fluid my-3">
<h2 class="text-center">new user registration</h2>
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- user -->
            <div class="form-outline mb-4">
<label for="user_username" class="form-labal">username</label>
<input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="user_username"/>
            
            </div>
            <!-- email -->
            <div class="form-outline mb-4">
<label for="user_email" class="form-labal">email</label>
<input type="text" id="user_email" class="form-control" placeholder="enter your email" autocomplete="off" required="required" name="user_email"/>
            
            </div>
                     <!-- password -->
                     <div class="form-outline mb-4">
<label for="user_password" class="form-labal">password</label>
<input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="user_password"/>
            
            </div>
                          <!-- confirm password -->
                          <div class="form-outline mb-4">
<label for="conf_user_password" class="form-labal"> confirm password</label>
<input type="password" id="conf_user_password" class="form-control" placeholder="enter your confirm password" autocomplete="off" required="required" name="conf_user_password"/>
            
            </div>
                        <!-- phone number -->
                        <div class="form-outline mb-4">
<label for="user_contact" class="form-labal">contact</label>
<input type="text" id="user_contact" class="form-control" placeholder="enter your contact" autocomplete="off" required="required" name="user_contact"/>
            
            </div>
            <div class="mt-4 pt-2">
                <input type="submit" value="register"class="bg-dark text-light py-2 px-3 border-0" name="user_register">
                <p class="small">already have an account? <a href="user_login.php">login</a></p>
            </div>
            </div>

           
        </form>
    </div>
</div>

    </div>
</body>
</html>
<?php
if(isset($_POST['user_register']))
{
   
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();
//email and password alredy present or not
$select_query="select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('username and email already exist')</script>";
}else if($user_password!=$conf_user_password){
    echo"<script>alert('password dosenot match')</script>";

}else{

    //insert_quary
    $insert_query= "INSERT INTO `user_table` (user_name,user_email,user_password,user_ip,user_mobile) VALUES(' $user_username', ' $user_email', '$hash_password', '$user_ip','$user_contact')";
   $sql_execute=mysqli_query($con,$insert_query);
   if($sql_execute){
    echo"<script> alert('data insert successfully')</script>";
   }else{
    die(mysqli_error($con));
   }

    }

    //selecting cart items
    $select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    $_SESSION['user_name']=$user_username;
    echo"<script> alert('you have items in your cart')</script>";
    echo"<script>window.open('checkout.php','_self')</script>";
}else{
    echo"<script>window.open('../index.php','_self')</script>";

}

}
?>
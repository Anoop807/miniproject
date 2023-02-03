<?php
  
include("../includes/connect.php");
include("../functions/common_function.php");

@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="POST" >  
<section class="vh-100 gradient-custom">
  <div class="container py-2 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your Username and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="text" class="form-control form-control-lg"name="username" required />
                <label class="form-label" >user name</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="passwords" required />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="sub" value="Login">Login</button>

              

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="user_registration.php" class="text-white-50 fw-bold ">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
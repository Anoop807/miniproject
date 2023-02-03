<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .payment_img{
        width: 600px;
        margin: auto;
        display: block;
    }
</style>
<body>
    <?php
    $user_ip =getIPAddress();
    $get_user = "SELECT user_id FROM `user_table` WHERE user_ip='$user_ip'";
    $result= mysqli_query($con,$get_user);
   // $run_query = mysqli_fetch_array($result);
   // $user_id= $run_query['user_id'];
   $row=mysqli_fetch_array($result);
    $user_id=$row[0];
   //$_SESSION['user_id']=$user_id

    ?>
    <div class="container"> 
        <h2 class="text-center text-info">payment options</h2>
        <div class="row d-flex jestify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="http://www.paypal.com" target="_blank"><img src="../img/v03.png" alt="" class="payment_img"></a>

            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id;?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
</body>

</html>
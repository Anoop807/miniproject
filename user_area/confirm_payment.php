<?php
include("../includes/connect.php");
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
   // echo $order_id;
   $select_data= "Select * from `user_orders` where order_id=$order_id";
    $result= mysqli_query($con,$select_data);
    $row_fetch= mysqli_fetch_array($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<h3 class='text-center text-light'>successfully complited the payment</h3>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $upadte_order="update `user_orders` set order_status='complete' where order_id=$order_id";
$result_orders=mysqli_query($con,$upadte_order);

}
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
    <!--bootstrabs link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-secondary">
    
    <div class="container my-5">
    <h1 class="text-center text-light">confirm payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for=""class="text-light">invoice number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number;?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for=""class="text-light">amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due;?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option >select payment mode</option>
                    <option >upi</option>
                    <option >netbanking</option>
                    <option >paypal</option>
                    <option >cash on delivery</option>
                    <option >payoffline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" class="bg-dark text-light py-2 px-3 border-0" value="confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>
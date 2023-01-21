<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all order</title>
</head>
<body>
    <?php
   $username=$_SESSION['user_name'];
   $get_user="SELECT user_id FROM `user_table` WHERE user_name='$username'";
   $result=mysqli_query($con,$get_user);
   $row_fetch=mysqli_fetch_assoc($result);
   $user_id=$row_fetch['user_id']
    ?>
<h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-5">
<thead class="bg-dark text-light ">
    <tr>
     <th>SI no</th>  
     <th>amount due</th>
     <th>total products</th>
     <th>invoice number</th>
     <th>date</th>
     <th>complete/incomplete</th>
     <th>status</th>
    </tr>
</thead>
<tbody class="bg-secondary text-light">
<?php
$get_order_details="select * from `user_orders` where user_id=$user_id";
$result_orders=mysqli_query($con,$get_order_details);
$number=1;
while($row_data=mysqli_fetch_assoc($result_orders)){
  $order_id=$row_data['order_id'];
  $amount_due=$row_data['amount_due'];
  $total_products=$row_data['total_products'];
  $invoice_number=$row_data['invoice_number'];
  $order_status=$row_data['order_status'];
  if($order_status=='pending'){
    $order_status='Incomplete';
  }else{
    $order_status='Complete';
  }
  $order_date=$row_data['order_date'];


?>
<tr class='text-center'>
<td><?php echo $number; ?></td>
<td><?php echo $amount_due; ?></td>
<td><?php echo $total_products; ?></td>
<td><?php echo $invoice_number; ?></td>
<td><?php echo $order_date; ?></td>

<td><?php echo $order_status; ?></td>
<?php
if($order_status=='Complete'){
    echo"<td>paid</td>";
}else{
    echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>confirm</a></td>
    </tr>";
}
$number++;
}
?>
</tbody>

    </table>
</body>
</html>
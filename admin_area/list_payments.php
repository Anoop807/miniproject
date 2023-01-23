<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all payments</title>
</head>
<body>
  
<h3 class="text-center text-success">All payment</h3>
    <table class="table table-bordered mt-5">
<thead class="bg-dark text-light ">
<?php
   $get_payments="SELECT * FROM `user_payments` ";
   $result=mysqli_query($con,$get_payments);
   $row_count=mysqli_fetch_assoc($result);
  


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>no payment yet</h2>";
}else{ 
    echo " <tr>
    <th>SI no</th>  
    <th>invoice number</th>
    <th>amount</th>
    <th>payment mode</th>
    <th>order date</th>
    <th>delete</th>
   </tr>
   </thead>
 <tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount =$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++; 
      ?>
      <tr class='text-center'>
      <td><?php echo $number; ?></td>
      <td><?php echo $invoice_number; ?></td>
      <td><?php echo $amount; ?></td>
      
      <td><?php echo $payment_mode; ?></td>
      
      <td><?php echo $date; ?></td>
                <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
      </tr>

      <?php
  
      
      }
}
    ?>


</tbody>

    </table>
</body>
</html>
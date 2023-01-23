<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all order</title>
</head>
<body>
  
<h3 class="text-center text-success">All orders</h3>
    <table class="table table-bordered mt-5">
<thead class="bg-dark text-light ">
<?php
   $get_orders="SELECT * FROM `user_orders` ";
   $result=mysqli_query($con,$get_orders);
   $row_count=mysqli_fetch_assoc($result);
  


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>no orders yet</h2>";
}else{ echo " <tr>
    <th>SI no</th>  
    <th>amount due</th>
    <th>invoice number</th>
    <th>total products</th>
    <th>order date</th>
    <th>status</th>
    <th>delete</th>
   </tr>
   </thead>
 <tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++; 
      ?>
      <tr class='text-center'>
      <td><?php echo $number; ?></td>
      <td><?php echo $amount_due; ?></td>
      <td><?php echo $invoice_number; ?></td>
      <td><?php echo $total_products; ?></td>
      
      <td><?php echo $order_date; ?></td>
      
      <td><?php echo $order_status; ?></td>
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
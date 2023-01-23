<?php
include("../includes/connect.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-5">
<thead class="bg-dark text-light ">
    <tr>
     <th>product id</th>  
     <th>product name</th>
     <th>product image</th>
     <th>product price</th>
     <th>total sold</th>
     <th>satus</th>
     <th>edit</th>
     <th>delete</th> 
    </tr>
</thead>
<tbody class="bg-secondary text-light">
<?php
$get_products="select * from `products`";
$result=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result)){
  $product_id=$row['product_id'];
  $product_name=$row['product_name'];
$product_image1=$row['product_image1'];
$product_price=$row['product_price'];
$status=$row['status'];
$number++;
?>
<tr class='text-center'>
<td><?php echo $number; ?></td>
<td><?php echo$product_name; ?></td>
<td><img src='./product_images/<?php echo$product_image1; ?>' class='product_img'/></td>
<td><?php echo $product_price; ?>/-</td>
<td>0</td>
<td><?php echo $status; ?></td>

<td><a href='index.php?edit_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
<td><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
</tr>
<?php

}


?>





</tbody>

    </table>
</body>
</html>
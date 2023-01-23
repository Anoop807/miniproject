<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all users</title>
</head>
<body>
  
<h3 class="text-center text-success">All users</h3>
    <table class="table table-bordered mt-5">
<thead class="bg-dark text-light ">
<?php
   $get_users="SELECT * FROM `user_table`";
   $result=mysqli_query($con,$get_users);
   $row_count=mysqli_fetch_assoc($result);
  


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>no users yet</h2>";
}else{ 
    echo " <tr>
    <th>SI no</th>  
    <th>user name</th>
    <th>user email</th>
    <th>user mobile</th>
    <th>delete</th>
   </tr>
   </thead>
 <tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $user_name=$row_data['user_name'];
        $user_email=$row_data['user_email'];
        $user_mobile=$row_data['user_mobile'];
        $number++; 
      ?>
      <tr class='text-center'>
      <td><?php echo $number; ?></td>
      <td><?php echo $user_name; ?></td>
      <td><?php echo $user_email; ?></td>
      
      <td><?php echo $user_mobile; ?></td>
      
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
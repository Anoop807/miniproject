<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['user_name'];
    $select_query= "SELECT * FROM `user_table` WHERE user_name='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
   $row_fetch=mysqli_fetch_array($result_query);
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_mobile=$row_fetch['user_mobile'];
}
if(isset($_POST['user_update'])){
$update_id=$user_id;
$user_name=$_POST['user_username'];
$user_email=$_POST['user_email'];
$user_mobile=$_POST['user_mobile'];

//udate query
$upadte_data="update `user_table` set user_name='$user_name',user_email='$user_email',user_mobile='$user_mobile' where user_id='$update_id'";
$result_query_update=mysqli_query($con,$upadte_data);
if($result_query_update){
    echo"<script>alert('data updated successfuly')</script>";
    echo"<script>window.open('logout.php','_self')</script>";
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account</title>
</head>
<body>
   <h3 class=" text-success mb-4">edit account</h3>
   <form action="" method="post" enctype="multipart/form-data" >
<div class="form-outline mb-4">
    <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php echo $user_name?>">
</div>
<div class="form-outline mb-4">
    <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo $user_email?>">
</div>
<div class="form-outline mb-4">
    <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo $user_mobile?>">
</div>

<input type="submit" value="update" class="bg-dark text-light py-2 px-3 border-0" name="user_update">
   </form>
</body>
</html>
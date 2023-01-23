<?php
include '../includes/connect.php';
if(isset($_POST['insert_brand'])){
    $brand_name=$_POST['brand_name'];
    // select data from database
//$select_query="SELECT categorie_name  FROM 'categories' WHERE categorie_name='$categorie_name'";
//$result_select=mysqli_query($con,$select_query);
//$number=mysqli_num_rows($result_select);
//if($number>0)
//$number=mysqli_fetch_array($result_select);
//if($number>0)
//{
 // echo"<script>alert('this categorie is present inside the database')</script>";
//}else{
   $insert_query="INSERT INTO brands (brand_name) value ('$brand_name')";
   $result=mysqli_query($con,$insert_query);
  if ($result){
        echo"<script>alert('brands has been inserted successfully')</script>";
    }
}
//}
?>
<h2 class="text-center">insert brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-dark" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"name="brand_name"placeholder="insert brand" aria-label="brand" aria-describedby="basic-addon1">
</div> 
 <div class="input-group w-10 mb-2 m-auto">
  
 
 <input type="submit" class="nav-link text-light bg-dark p-1 my-2"name="insert_brand"value="insert brand">
</div>
</form>
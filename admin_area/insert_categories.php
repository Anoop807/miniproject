<?php
include '../includes/connect.php';
if(isset($_POST['insert_cat'])){
    $categorie_name=$_POST['cat_title'];
    //select data from database
$select_query="SELECT * FROM `categories` WHERE categorie_name='$categorie_name'";
$result_select=mysqli_query($con,$select_query);
$number=mysqli_num_rows($result_select);
if($number>0){
    echo"<script>alert('this categorie is present inside the database')</script>";
}else{

   $insert_query="INSERT INTO categories (categorie_name) value ('$categorie_name')";
   $result=mysqli_query($con,$insert_query);
  if ($result){
        echo"<script>alert('categorie has been inserted successfully')</script>";
    }
}
}
?>
<h2 class="text-center">insert categories</h2>
<form action="#" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-dark" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"name="cat_title"placeholder="insert categories" aria-label="categories" aria-describedby="basic-addon1">
</div> 
 <div class="input-group w-10 mb-2 m-auto">
  
 <input type="submit" class="nav-link text-light bg-dark p-1 my-2"name="insert_cat"value="insert categories">
</div>
</form>
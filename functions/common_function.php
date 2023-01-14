<?php
//including connection file
include('./includes/connect.php');
//getting products
function getproducts(){
    global $con;

    // conditon to check isset or not
   if(!isset($_GET['categorie'])){

   if(!isset($_GET['brands'])){

    $select_query="SELECT * FROM `products` order by rand() LIMIT 0,3";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_name=$row['product_name'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $categorie_id=$row['categorie_id'];
    $brand_id=$row['brand_id'];
    $product_price=$row['product_price'];
    
    echo"<div class='col-md-4 mb-2'>
    <div class='card' style='width: 18rem'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
      <div class='card-body'>
        <h5 class='card-title'>$product_name</h5>
        <p class='card-text'>$product_description</p>
        <a href='#' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
      </div>
    </div>
    </div>";
    
    }
}
}
}
//getting all products
function get_all_products(){

  global $con;

  // conditon to check isset or not
 if(!isset($_GET['categorie'])){

 if(!isset($_GET['brands'])){
  $select_query="SELECT * FROM `products` order by rand()";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_name=$row['product_name'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $categorie_id=$row['categorie_id'];
  $brand_id=$row['brand_id'];
  $product_price=$row['product_price'];
  
  echo"<div class='col-md-4 mb-2'>
  <div class='card' style='width: 18rem'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
    <div class='card-body'>
      <h5 class='card-title'>$product_name</h5>
      <p class='card-text'>$product_description</p>
      <a href='#' class='btn btn-info'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
    </div>
  </div>
  </div>";
  
  }
}
}
}
//geting uniq categories
function get_uniqu_categories(){
    global $con;

    // conditon to check isset or not
    if(isset($_GET['categorie'])){
$categorie_id=$_GET['categorie'];
    
    $select_query="SELECT * FROM `products` where categorie_id=$categorie_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_row=mysqli_num_rows($result_query);
    if($num_of_row==0){
        echo"<h2 class='text-center text-danger'>no stock for this category</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_name=$row['product_name'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $categorie_id=$row['categorie_id'];
    $brand_id=$row['brand_id'];
    $product_price=$row['product_price'];
    
    echo"<div class='col-md-4 mb-2'>
    <div class='card' style='width: 18rem'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
      <div class='card-body'>
        <h5 class='card-title'>$product_name</h5>
        <p class='card-text'>$product_description</p>
        <a href='#' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
      </div>
    </div>
    </div>";
    
    }
}
}
//geting uniq brand
function get_uniqu_brand(){
    global $con;

    // conditon to check isset or not
    if(isset($_GET['brand'])){
     $brand_id= $_GET['brand'];
    
$select_query="SELECT * FROM `products` where brand_id=$brand_id";
$result_query=mysqli_query($con,$select_query);
$num_of_row=mysqli_num_rows($result_query);
    if($num_of_row==0){
        echo"<h2 class='text-center text-danger'>no stock for this brand</h2>";
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_name=$row['product_name'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $categorie_id=$row['categorie_id'];
    $brand_id=$row['brand_id'];
    $product_price=$row['product_price'];
    
    echo"<div class='col-md-4 mb-2'>
    <div class='card' style='width: 18rem'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
      <div class='card-body'>
        <h5 class='card-title'>$product_name</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>$product_price</p>
        <a href='#' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
      </div>
    </div>
    </div>";
    
    }
}
}
}
//displaying brands
function getbrands(){ 
    global $con;
    $select_brands="SELECT * FROM brands ";
    $result_brands=mysqli_query($con,$select_brands);
    while($row_data=mysqli_fetch_assoc($result_brands)){
      $brand_name=$row_data['brand_name'];
      $brand_id=$row_data['brand_id'];
      echo " <li class='nav-item'>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_name</a>
    </li>";
    }
}  
//displaying catagories
function getcategories(){ 
    global $con;
    $select_categories="SELECT * FROM categories";
    $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
      $categorie_name=$row_data['categorie_name'];
      $categorie_id=$row_data['categorie_id'];
      echo " <li class='nav-item'>
      <a href='index.php?categorie=$categorie_id' class='nav-link text-light'>$categorie_name</a>
    </li>";
    }
}
//searching
function search_products(){
  global $con;
if(isset($_GET['search_data_product'])){
  $search_data_value=$_GET['search_data'];
  // conditon to check isset or not
    $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";

  $result_query=mysqli_query($con,$search_query);
  $num_of_row=mysqli_num_rows($result_query);
    if($num_of_row==0){
        echo"<h2 class='text-center text-danger'>No products found!</h2>";
    }
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_name=$row['product_name'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $categorie_id=$row['categorie_id'];
  $brand_id=$row['brand_id'];
  $product_price=$row['product_price'];
  
  echo"<div class='col-md-4 mb-2'>
  <div class='card' style='width: 18rem'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
    <div class='card-body'>
      <h5 class='card-title'>$product_name</h5>
      <p class='card-text'>$product_description</p>
      <a href='#' class='btn btn-info'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
    </div>
  </div>
  </div>";
  
  }

}
}
//view details fun
function view_details(){ global $con;

  // conditon to check isset or not
  if(isset($_GET['product_id'])){
 if(!isset($_GET['categorie'])){

 if(!isset($_GET['brands'])){
  $product_id=$_GET['product_id'];
  $select_query="SELECT * FROM `products` where product_id=$product_id";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_name=$row['product_name'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_image2=$row['product_image2'];
  $product_image3=$row['product_image3'];
  $categorie_id=$row['categorie_id'];
  $brand_id=$row['brand_id'];
  $product_price=$row['product_price'];
  
  echo"<div class='col-md-4 mb-2'>
  <div class='card' style='width: 18rem'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
    <div class='card-body'>
      <h5 class='card-title'>$product_name</h5>
      <p class='card-text'>$product_description</p>
      <a href='#' class='btn btn-info'>Add to cart</a>
      <a href='index.php' class='btn btn-secondary'>go home</a>
    </div>
  </div>
  </div>
  <div class='col-md-8'>
<div class='row'>
  <div class='col-md-12'>
    <h4 class='text-center'>related products</h4>
  </div>
  <div class='col-md-6'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
      

  </div>
  <div class='col-md-6'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
      
    
    </div>
</div>

</div>";
  
  }
}
}

}
}
?>
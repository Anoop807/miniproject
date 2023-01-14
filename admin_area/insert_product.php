<?php
include '../includes/connect.php';
if(isset($_POST['insert_product'])){

$product_name=$_POST['product_name'];
$description=$_POST['description'];
$product_keywords=$_POST['product_keywords'];
$product_categorie=$_POST['product_categorie'];
$product_brand=$_POST['product_brand'];
$product_price=$_POST['product_price'];
$product_status='true';


//accessing images
$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'];
$product_image3=$_FILES['product_image3']['name'];

//accessing tmp images
$temp_image1=$_FILES['product_image1']['tmp_name'];
$temp_image2=$_FILES['product_image2']['tmp_name'];
$temp_image3=$_FILES['product_image3']['tmp_name'];

//checking empty condition
if($product_name=='' or $description=='' or $product_keywords=='' or $product_categorie=='' or $product_brand=='' or $product_status=='' or $product_image1=='' or $product_image2=='' or $product_image3=='')
{
    echo"<script>alert( please fill the entire fields')</script>";
    exit();
}else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");
    // insert query
    $insert_products="INSERT INTO `products` (product_name,product_description,product_keywords,categorie_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) value('$product_name','$description','$product_keywords','$product_categorie','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',now(),'$product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
        echo"<script>alert('successfuly inseted products')</script>";
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert products-admin dashbord</title>
     <!-- bootstrap  CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <!-- font awesome link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
     <!-- bootstrap js link -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-4">
<h1 class="text-center">insert products</h1>
<!--form -->
<form action="" method="post" enctype="multipart/form-data">
    <!--title-->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_name" class="form-label">product name</label>
    <input type="text" class="form-control" name="product_name" id="product_name "placeholder=" enter product name" autocomplete="off" required="required">
  </div>
      <!--description-->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="description" class="form-label">product description</label>
    <input type="text" class="form-control" name="description" id="description" placeholder=" enter product description" autocomplete="off" required="required">
  </div>
      <!--keywords-->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_keywords" class="form-label">product keywords</label>
    <input type="text" class="form-control" name="product_keywords" id="product_keyword" placeholder=" enter product keywords" autocomplete="off" required="required">
  </div>
  <!--categories-->
  <div class="form-outline mb-4 w-50 m-auto">
   <select name="product_categorie" id="" class="form-select" >
   <option value="">select a category </option>
   <?php
$select_query="SELECT * FROM categories";
$result_query=mysqli_query($con,$select_query);

while($row=mysqli_fetch_assoc($result_query)){
  $categorie_name=$row['categorie_name'];
  $categorie_id=$row['categorie_id'];
  echo " <option value='$categorie_id'>$categorie_name</option>";
}
?>

   </select>
  </div>
   <!--brands-->
  <div class="form-outline mb-5 w-50 m-auto">
   <select name="product_brand" id="" class="form-select" >
<option value="">select a brands </option>
<?php
$select_query="SELECT * FROM brands";
$result_query=mysqli_query($con,$select_query);

while($row=mysqli_fetch_assoc($result_query)){
  $brand_name=$row['brand_name'];
  $brand_id=$row['brand_id'];
  echo " <option value='$brand_id'>$brand_name</option>";
}
?>
   </select>
  </div>
     <!--image 1-->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image1" class="form-label">product image1</label>
    <input type="file" class="form-control" name="product_image1" id="product_image1" required="required">
  </div>
       <!--image 2-->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image2" class="form-label">product image2</label>
    <input type="file" class="form-control" name="product_image2" id="product_image2" required="required">
  </div>
       <!--image 3-->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image3" class="form-label">product image3</label>
    <input type="file" class="form-control" name="product_image3" id="product_image3" required="required">
  </div>
       <!--price-->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_price" class="form-label">product price</label>
    <input type="text" class="form-control" name="product_price" id="product_priced" placeholder=" enter product price" autocomplete="off" required="required">
  </div>
         <!--submit-->
<div class="form-outline mb-4 w-50 m-auto">
    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="insert products">
  </div>

</form>
    </div>
    
</body>
</html>
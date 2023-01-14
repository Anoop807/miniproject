<?php
include("./includes/connect.php");
include("./functions/common_function.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="style.css">
</head>
<div class="conatainer-fluid ">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <img src="./img/logo.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="display_all.php">Products</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-user"></i> Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>

        </ul>

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-item nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link" href="login.php">Login</a>
      </li>
    </ul>
</div>
</div>
</nav>
<!--tt-->
<div class="row">
  <div class="col-md-10">
    <!-- products-->
    <div class="row">
      <!-- fetching products -->
      <?php
      //calling function
      get_all_products();
      get_uniqu_categories();
      get_uniqu_brand();
      //$select_query="SELECT * FROM `products` order by rand() LIMIT 0,9";
//$result_query=mysqli_query($con,$select_query);
//while($row=mysqli_fetch_assoc($result_query)){
      // $product_id=$row['product_id'];
      // $product_name=$row['product_name'];
//$product_description=$row['product_description'];
//$product_image1=$row['product_image1'];
//$categorie_id=$row['categorie_id'];
//$brand_id=$row['brand_id'];
//$product_price=$row['product_price'];
      
      //echo"<div class='col-md-4 mb-2'>
//<div class='card' style='width: 18rem'>
//  <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_name'>
//  <div class='card-body'>
      //   <h5 class='card-title'>$product_name</h5>
      //   <p class='card-text'>$product_description</p>
      //   <a href='#' class='btn btn-info'>Add to cart</a>
      //   <a href='#' class='btn btn-secondary'>view more</a>
      // </div>
//</div>
//</div>";
      
      //}
      
      ?>


      <!--row end-->
    </div>
    <!-- col end -->
  </div>
  <!--side bar-->
  <div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-dark">
        <a href="#" class="nav-link text-light">
          <h4>Category</h4>
        </a>
      </li>
      <?php
      getcategories()
        ?>

    </ul>
  
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-dark">
        <a href="#" class="nav-link text-light">
          <h4>Brands</h4>
        </a>
      </li>
      <?php
      getbrands()
        ?>

    </ul>
  </div>
  </body>

</html>
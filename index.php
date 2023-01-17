<?php
include("./includes/connect.php");
include("./functions/common_function.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="display_all.php">Products</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sub><?php cart_item(); ?></sub></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./user_area/user_registration.php"><i class="fa-solid fa-user"></i> Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> total price:<?php total_cart_price(); ?> /-</a>
          </li>

        </ul>

        <form class="d-flex" action="search_products.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="search" name="search_data">
          <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
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
        <a class="nav-item nav-link" href="./user_area/user_login.php">Login</a>
      </li>
    </ul>
</div>
</div>
</nav>
<!--cart function-->
<?php
cart();
?>
<!--tt-->
<div class="row">
  <div class="col-md-10">
    <!-- products-->
    <div class="row">
      <!-- fetching products -->
      <?php
      //calling function
      getproducts();
      get_uniqu_categories();
      get_uniqu_brand();
      $ip = getIPAddress();
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
  <div>
    <?php include("./includes/footer.php") ?>
  </div>
  </body>

</html>
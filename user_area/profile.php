<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>welcome <?php echo $_SESSION['user_name'] ?></title>
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
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../display_all.php">Products</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sub><?php cart_item(); ?></sub></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.php"><i class="fa-solid fa-user"></i> my profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> total price:<?php total_cart_price(); ?> /-</a>
          </li>

        </ul>

        <form class="d-flex" action="../search_products.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="search" name="search_data">
          <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
        </form>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      
      <?php
      if(!isset($_SESSION['user_name'])){
        echo"   <li class='nav-item'>
        <a class='nav-item nav-link' href='#'>Welcome</a>
      </li>";
    }else{
      echo"   <li class='nav-item'>
      <a class='nav-item nav-link' href='#'>Welcome ".$_SESSION['user_name']."</a>
    </li>";
    }
  
            if(!isset($_SESSION['user_name'])){
                echo" <li class='nav-item'>
                <a class='nav-item nav-link' href='./user_login.php'>Login</a>
            </li>";
            }else{
                echo" <li class='nav-item'>
                <a class='nav-item nav-link' href='./logout.php'>Logout</a>
            </li>"; 
            }
            
            
            ?>
    </ul>
</div>
</div>
</nav>
<!--cart function-->

<!-- fourth child-->
<div class="row">
    <div class="col-md-2 p-0">
        <ul class="navbar-nav bg-secondary text-center" style="height: 80vh;">
        <li class="nav-item bg-dark">
            <a class="nav-link text-light"  href="#"><h4>your profile</h4></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light"  href="profile.php">pending order</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light"  href="profile.php?edit_account">edit account</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light"  href="profile.php?my_orders">my orders</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light"  href="profile.php?delete_account">delete account</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light"  href="logout.php">logout</a>
          </li>  
        </ul>
    </div>
    <div class="col-md-10">
    <?php get_user_order_details(); 
    if(isset($_GET['edit_account'])){
        include('edit_account.php');
    }
    
    ?>
    </div>
</div>

  
    <?php include("../includes/footer.php") ?>
  </div>
  </body>

</html>
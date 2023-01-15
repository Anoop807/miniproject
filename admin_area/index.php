
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashbord</title>
    <!-- bootstrap  CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <!-- font awesome link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
       .adminimg{
    width: 100px;
    object-fit: contain;
       }
       body{
        overflow-x: hidden;
       }
       .product_img{
        width: 30px;
        object-fit: contain;
       }
    </style>
</head>
<body>
<!-- navbar-->
<div class="conatainer-fluid ">
    <!-- first child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <img src="../img/logo.png" alt="" class="logo">
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a href="" class="nav-link">welcome gust</a>
             </li>
        </ul>
</div>
</nav>
<!-- second child -->
<div class="bg-light">
    <h3 class="text-center p-2">manage details</h3>
</div>
<!-- third child -->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="../img/admin.jpg." alt=""class="adminimg"></a>
            <p class="text-light text-center">admin name</p>
        </div>
       <!-- button*10>a.nav-link.text-light.bg-dark.my-1 -->
        <div class="button text-center">
            <button class="my-3"><a href=" insert_product.php" class="nav-link text-light bg-dark my-1">insert product</a></button>
            <button><a href="index.php?view_products" class="nav-link text-light bg-dark my-1">view product</a></button>
            <button><a href="index.php?insert_categories" class="nav-link text-light bg-dark my-1">insert categories </a></button>
            <button><a href="" class="nav-link text-light bg-dark my-1">view categories</a></button>
            <button><a href="index.php?insert_brand" class="nav-link text-light bg-dark my-1">insert brands</a></button>
            <button><a href="" class="nav-link text-light bg-dark my-1">view brands</a></button>
            <button><a href="" class="nav-link text-light bg-dark my-1"> all orders</a></button>
            <button><a href="" class="nav-link text-light bg-dark my-1">all payment</a></button>
            <button><a href="" class="nav-link text-light bg-dark my-1">list users</a></button>
            <button><a href="" class="nav-link text-light bg-dark my-1"> logout</a></button>
        </div>
    </div>
</div>
<!-- fourth child -->
<div class="container my-5">
    <?php
    if(isset($_GET['insert_categories']))
    {
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand']))
    {
        include('insert_brand.php');
    }
    if(isset($_GET['view_products']))
    {
        include('view_products.php');
    }
    ?>
</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div>
    <?php include("../includes/footer.php") ?>
  </div>
</body>
</html>
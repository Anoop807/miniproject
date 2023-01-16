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
    <style>
        .cart_imag {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="conatainer-fluid ">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="./img/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link" href="./user_area/user_registration.php"><i class="fa-solid fa-cart-shopping"></i><sub>
                                <?php cart_item(); ?>
                            </sub></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_area/user_registration.php"><i class="fa-solid fa-user"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>

                </ul>

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
<!-- fourth child-table -->
<div class="container ">
    <div class="row">
        <form action="" method="post">
            <table class="table table-bordered text-center">
               
                    <!-- disply dynamic datad-->
                    <?php
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "  <thead>
                        <tr>
    
                            <th>product title</th>
                            <th>product image</th>
                            <th>quantity</th>
                            <th>total price</th>
                            <th>remove</th>
                            <th colspan='3'>oprations</th>
                        </tr>
    
                    </thead>
                    <tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "Select * from `products` where product_id='$product_id' ";
                            $result_product = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_product)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_name = $row_product_price['product_name'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;
                                ?>

                                <tr>

                                    <td><?php echo $product_name ?></td>
                                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt=""
                                            class="cart_imag"></td>
                                    <td><input type="number" name="qty" class="form-input w-50"></td>
                                    <?php
                                    $get_ip_add = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $quantities = $_POST['qty'];
                                        $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                        $result_product_quantity = mysqli_query($con, $update_cart);
                                        $total_price= $total_price*$quantities;
                                    }
                                    ?>
                                    <td>
                                        <?php echo $price_table ?>/-
                                    </td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                    <td>
                                        <!--<button class="nav-link text-light bg-dark px-3 py2 border-0 mx-3 my-4 ">Update</button>-->
                                        <input type="submit" value="Upate Cart"
                                            class="nav-link text-light bg-dark px-3 py2 border-0 mx-3 my-4" name="update_cart">
                                        <!--  <button class="nav-link text-light bg-dark px-3 py2 border-0 mx-3">Remove</button></td>-->
                                        <input type="submit" value="Remove Cart"
                                            class="nav-link text-light bg-dark px-3 py2 border-0 mx-3 my-4" name="remove_cart">
                                    </td>
                                    <?php

                            }
                        }
                    }
                    else{
                        echo "<h2 class= 'text-center text-danger'>Cart is empty!</h2>";
                    }
                    ?>
                    </tr>
                </tbody>
            </table>
            <!-- subtotal -->
            <div class="d-flex mb-5">
                <?php
 $get_ip_add = getIPAddress();
 $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
 $result = mysqli_query($con, $cart_query);
 $result_count = mysqli_num_rows($result);
                if ($result_count > 0) {
                    echo "<h4 class='px-5'>subtotal:<strong class=' nav-link text-light bg-dark my-1'> $total_price/-</strong></h4>
                    <input type='submit' value='Continue Shopping' class='nav-link text-light bg-dark px-3 py2 border-0 mx-3 my-4' name='continue_shopping'>

                <button
                        class='nav-link bg-secondary px-3 py2 border-0 my-4'><a href='./user_area/checkout.php'
                        class='text-light text-decoration-none'>Checkout</button>";
                    }
                    else{
                    echo " <input type='submit' value='Continue Shopping'
                    class='nav-link text-light bg-dark px-3 py2 border-0 mx-3 my-4' name='continue_shopping'>";
                
                }
                if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                }
                ?>
                
             
            </div>

    </div>
</div>
</form>
<!-- function to remove items -->
<?php
function remove_cart_item()
{
    global $con;
    if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
            echo $remove_id;
            $delete_query = "Delete from `cart_details` where product_id=$remove_id";
            $run_delete = mysqli_query($con, $delete_query);
            if ($run_delete) {
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item = remove_cart_item();
?>
<div>
    <?php
    include("./includes/footer.php")
        ?>
</div>
</body>

</html>
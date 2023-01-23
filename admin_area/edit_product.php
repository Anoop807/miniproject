<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $get_data = "Select * from `products` where product_id=$$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_descriptionn = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $categorie_id = $row['categorie_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" id="product_name" name="product_name" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">product keywords</label>
            <input type="text" class="form-control" name="product_keywords" id="product_keyword" placeholder=" enter product keywords" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_categorie" id="" class="form-select">
                <option value="">select a category </option>
        </div>
    </form>
</div>
</form>
</div>
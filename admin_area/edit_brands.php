<?php
if(isset($_GET['edit_brands'])){
    $edit_brands = $_GET['edit_brands'];
    $get_brands = "Select * from `brands` where brand_id=$edit_brands";
    $result=mysqli_query($con,$get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_name = $row['brand_name'];
    
}
if(isset($_POST['edit_bra'])){
    $bra_title = $_POST['brand_name'];
    $update_query = "update `brands` set brand_name='$bra_title' where brand_id=$edit_brands";
    $result_bra=mysqli_query($con,$update_query);
    if($result_bra){
        echo "<script>alert('Brand is been updated succcessfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";

    }
}

?>
<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-60 m-auto">
            <label for="brand_name" class="form-label">Brand Title</label><br>
            <input type="text" name="brand_name" id="brand_name" class="form_control text-secondary"
            required="required" value='<?php echo $brand_name;?>'> 
        </div>
        <input type="submit" value="Update Brand" class="btn btn-dark px-3 mb-3" name="edit_bra">
    </form>
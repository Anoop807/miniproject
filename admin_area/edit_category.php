<?php
if(isset($_GET['edit_category'])){
    $edit_category = $_GET['edit_category'];
    $get_categories = "Select * from `categories` where categorie_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row = mysqli_fetch_assoc($result);
    $categorie_name = $row['categorie_name'];
    
}
if(isset($_POST['edit_cat'])){
    $cat_title = $_POST['categorie_name'];
    $update_query = "update `categories` set categorie_name='$cat_title' where categorie_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('Category is been updated succcessfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";

    }
}

?>
<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-60 m-auto">
            <label for="categorie_name" class="form-label">Category Title</label><br>
            <input type="text" name="categorie_name" id="categorie_name" class="form_control text-secondary"
            required="required" value='<?php echo $categorie_name;?>'> 
        </div>
        <input type="submit" value="Update Category" class="btn btn-dark px-3 mb-3" name="edit_cat">
    </form>
</div>
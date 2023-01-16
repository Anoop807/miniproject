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
    <div class="container-fluid my-3">
<h2 class="text-center">login</h2>
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- user -->
            <div class="form-outline mb-4">
<label for="user_username" class="form-labal">username</label>
<input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="user_username"/>
            
 
                     <!-- password -->
                     <div class="form-outline mb-4">
<label for="user_password" class="form-labal">password</label>
<input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="user_password"/>
            
            </div>
  
    
            <div class="mt-4 pt-2">
                <input type="submit" value="login"class="bg-dark text-light py-2 px-3 border-0" name="user_login">
                <p class="small">you dont have account? <a href="./user_registration.php">register</a></p>
            </div>
            </div>

           
        </form>
    </div>
</div>

    </div>
</body>
</html>
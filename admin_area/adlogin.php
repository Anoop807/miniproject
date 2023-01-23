<?php {
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, 'shoemart');
    if (isset($_POST['sub'])) {
        $auname = $_POST['auname'];
        $passwords = $_POST['passwords'];
        $qry = "SELECT * FROM signup WHERE auname='$auname' AND passwords='$passwords'";
        $result = mysqli_query($con, $qry);
        if (mysqli_num_rows($result) == 0) {
            header('location:index.php');

        } else {
            echo "<script>alert('INCORRECT USERNAME OR PASSWORD')</script>";
        }
    }
}
?>
<html>

<head>
    <link rel="stylesheet" href="lstyle.css">
    <title> AdminLogin</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <h1 style="text-align:center;">Admin Login</h1> <label>Admin uname</label> <input type="text" name="auname"
                required> <label>Password</label> <input type="password" name="passwords" required><br><br> <input
                type="submit" name="sub" value="Login"><br>
        </fieldset>
    </form>
</body>

</html>
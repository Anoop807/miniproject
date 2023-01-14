<php?
$hostname = "localhost";
$userbane = "root";
$password ="";
db_name="shoemart";
$conn = mysqli_connect($hostname,$username,$$password,$db_name);
if($conn){
    echo"success";
    els{
        echo"not_success";
    }
}

?>
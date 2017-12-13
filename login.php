<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $query = "select * from users where email = '".$email."'";
        $sql = mysqli_query($conn,$query);
        $row = mysqli_num_rows($sql);

        if($row  == 1){
            $data = mysqli_fetch_assoc($sql);
            if(password_verify($password,$data['password'])){
                $_SESSION['email']=$data['email'];
                $_SESSION['name']=$data['name'];
                header("location:dashboard.php");
            }
            else{
                echo "Wrong Password";
            }
        }
        else{
            echo "No User found";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
 
<h1>Login</h1>
 
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="email" value="" placeholder="Email">
    <input type="password" name="password" value="" placeholder="Password">
    <button type="submit" name="submit">Submit</button>
</form>

</body>
</html>
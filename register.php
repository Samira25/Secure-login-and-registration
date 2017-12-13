<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email 	= $_POST['email'];
        $password = $_POST['password'];

        $hashPassword = password_hash($password,PASSWORD_BCRYPT);

        $query = "insert into users (name, email, password) value('".$name."', '".$email."','".$hashPassword."')";
        $sql = mysqli_query($conn, $query);
        if($sql)
        {
            echo "Registration successful";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

	<h1>Registration Form</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="name" value="" placeholder="Name">
	<input type="email" name="email" value="" placeholder="Email">
	<input type="password" name="password" value="" placeholder="Password">
	<button type="submit" name="submit">Submit</button>

</form>
</body>
</html>
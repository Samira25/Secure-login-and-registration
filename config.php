<?php 
$conn = mysqli_connect("localhost","root","","login");
 
if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>
<?php
$connection = new mysqli("localhost","root","","mytest");
if($connection->connect_error){
	die("connection failed: ".$connection->connect_error);
}
if($_SERVER["$REQUEST_METHOD"]=="POST"){
	$email = $_POST['email'];
	$password =$_POST['password'];
	$sql = "SELECT * from user Where email='$email'";
	$result = $connection->query($sql);

	if($result->num_rows==1){
		$row =$result->fetch_assoc();
		//$hp=password_hash($password,PASSWORD_DEFAURT)
	if(password_verify($password,$row['password'])){
		$_SESSION['user_id']=$row[id];
	
	header("Location:landing.php");
	exit();
	}else{
		echo "Invalid email or password"
	}
}else {
	echo "User not found";
}
}
$connection->close();
?>



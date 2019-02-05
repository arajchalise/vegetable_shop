<?php
session_start();
include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
if($username =='' || $password == ''){
	$error = "Username or Password cant' be empty......";
	header("location: ../admin.php");
}
else{
$data = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE Username='$username' && Password='$password'");
$num = mysqli_num_rows($data);
if($num==1){
	$row = mysqli_fetch_array($data);
	$_SESSION['name'] = $row['Name'];
	$_SESSION['id'] = $row['id'];
	$_SESSION['user'] = $row['Username'];
	header ("location: ../dashboard.php");
	exit;
}
else{
	$_SESSION['user1'] = $username;
	$error= "Either Username or Password wrong!!!";
	header("location: ../admin.php");

}
}
$_SESSION['error'] = $error;

 ?>
<?php 
include 'connection.php';

$name = $_POST['name'];
$desc = $_POST['descr'];
$price = $_POST['price'];
$type = $_POST['type'];
$image =$_POST['image'];
$id = $_POST['id'];

$qry = mysqli_query($conn, "UPDATE `tbl_item` SET `ProductName` = '$name', `ProductType` = '$type', `ProductDescription` = '$desc', `Price` = '$price', `Image` = '$image' WHERE `tbl_item`.`id` = '$id'
");

if(!$qry){
	echo "Error";
	exit();
}
else{
	header("location:../dashboard.php");
	exit();
}

?>
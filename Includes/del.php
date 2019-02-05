<?php 
include 'connection.php';
$id = $_GET['id'];

$qry = mysqli_query($conn, "SELECT Image FROM tbl_item WHERE id='$id'");
$result = mysqli_fetch_array($qry);
$img = $result['Image'];

$qry = mysqli_query($conn, "DELETE FROM tbl_item WHERE id='$id'");

if(!$qry){
	echo "Error";
	exit();
}
else{
	unlink("../Images/".$img);
	header("location: ../dashboard.php");
	exit();
}



?>
<?php 
include 'connection.php';
$id =$_GET['id'];

$qry = mysqli_query($conn, "UPDATE `tbl_order` SET `status` = '1' WHERE `tbl_order`.`oid` = '$id'");

if($qry){
	header("location:../dashboard.php");
}
else{
	echo "Error ";
}


?>
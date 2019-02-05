<?php 
include 'connection.php';
$name = $_POST['name'];
$desc = $_POST['descr'];
$price = $_POST['price'];
$type = $_POST['type'];
$target = "../Images/";
	$filename = $_FILES['pic']['name'];
	$target1 = $target.$filename;

if($_FILES['pic']['type'] == 'image/jpg' || $_FILES['pic']['type'] == 'image/pjpg' || $_FILES['pic']['type'] == 'image/jpeg' || $_FILES['pic']['type'] == 'image/pjpeg' ||$_FILES['pic']['type'] == 'image/png' || $_FILES['pic']['type'] == 'image/ppng' && $_FILES['pic']['size']>600000){

	if($_FILES['pic']['error']>0)
		{echo "Error...".$_FILES['pic']['error'];}

	else
	{
		if(file_exists($target1))
			{
				echo "File Exits"; 
				exit;
			}

		else if(move_uploaded_file($_FILES['pic']['tmp_name'], $target1)){

			$qry = "INSERT INTO `tbl_item` (`id`, `ProductName`, `ProductType`, `ProductDescription`, `Image`, `Price`) VALUES (NULL, '$name ', '$type ', '$desc', '$filename', '$price')";
			$inst = mysqli_query($conn, $qry);
			if(!$inst){
				echo "Error in Query.";
				unlink($target1);
				exit();
			}
			else{
				header("location:../dashboard.php");
			}
		}



}
}
else{
	echo "Invalid File Format";
}


?>
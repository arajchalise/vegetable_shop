<?php 
include 'connection.php';
$id = $_GET['id'];

$qry = mysqli_query($conn, "SELECT * FROM tbl_item WHERE id='$id'");

$data = mysqli_fetch_array($qry);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<form action="update.php" method="post">
		<table>
			<input type="text" name="id" value="<?php echo $data['id'] ?>" hidden>
			<tr><td>Product Name: </td><td><input type="text" name="name" value="<?php echo $data['ProductName'] ?>"></td></tr>
			<tr><td>Product Price: </td><td><input type="text" name="price" value="<?php echo $data['Price'] ?>"></td></tr>
			<tr><td>Product Desc: </td><td><textarea name="descr"><?php echo $data['ProductDescription'] ?></textarea></td></tr>
			<tr><td>Product Type: </td><td><input type="text" name="type" value="<?php echo $data['ProductType'] ?>" /></td></tr>
			<tr><td></td><td><input type="text" name="image" value="<?php echo $data['Image'] ?>" hidden/></td></tr>
			<tr><td></td><td><input type="submit" name="" value="Update"></td></tr>
		</table>
	</form>

</div>
</body>
</html>
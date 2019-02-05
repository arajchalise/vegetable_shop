<?php 
session_start();
include 'connection.php';
$cname = $_POST['name'];
$cmobile = $_POST['mobile'];
$landmark = $_POST['landmark'];
$city = $_POST['city'];
$date = date("y/m/d");
$amt = 0;
$bill = "";
$a = mysqli_query($conn, "SELECT * FROM tbl_customer WHERE name='$cname' AND mobile='$cmobile'");
if(mysqli_num_rows($a)==0)
{
$inst = mysqli_query($conn, "INSERT INTO tbl_customer(name, mobile, city) VALUES('$cname', '$cmobile', '$city')");

if($inst){

foreach ($_SESSION['cart'] as $products) {
    	$name = $products['name'];
    	$price = $products['price'];
    	$qty = $products['qty'];
    	$type = $products['type'];
    	$inst1 = mysqli_query($conn, "INSERT INTO tbl_order(cname, vname, vtype, qty, dates, price, landmark, city) VALUES('$cname', '$name', '$type', '$qty', '$date', '$price', '$landmark', '$city')");
      $bill = $name."\t".$qty."\t".$price."\n";
      $amt = $amt+$price;
      if(!$inst1){
    echo "Error in query";
    exit();
  }
  
}
unset($_SESSION['cart']);
$_SESSION['msg'] = "Check Out Successfully";
$bill = $bill."<br>";
$bill = $bill."Total"."\t".$amt;
$add = $landmark.", ".$city;
echo $bill;
$insert = mysqli_query($conn, "INSERT INTO tbl_order_bulk(Name, Address, Bill) VALUES('$cname', '$add', '$bill')");
header("location: ../index.php");
}
}


else{
foreach ($_SESSION['cart'] as $products) {
    	$name = $products['name'];
    	$price = $products['price'];
    	$qty = $products['qty'];
    	$type = $products['type'];
    	$inst1 = mysqli_query($conn, "INSERT INTO tbl_order(cname, vname, vtype, qty, dates, price, landmark, city) VALUES('$cname', '$name', '$type', '$qty', '$date', '$price', '$landmark', '$city')");
        $bill .= $name."\t".$qty."\t".$price."<br>";
        $amt = $amt+$price;
       
  if(!$inst1){
    echo "Error in query";
    exit();
  }
}
unset($_SESSION['cart']);
$_SESSION['msg'] = "Check Out Successfully";
$bill = $bill."<br>";
$bill = $bill."Total"."\t".$amt;
$add = $landmark.", ".$city;
echo $bill;
$insert = mysqli_query($conn, "INSERT INTO tbl_order_bulk(Name, Address, Bill) VALUES('$cname', '$add', '$bill')");
header("location: ../index.php");


}

?>
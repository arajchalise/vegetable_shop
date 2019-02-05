<?php 
session_start();
if(isset($_POST['submit'])) {
    $id =$_POST['id'];
    $name = $_POST['item_name'];
    $price = $_POST['amount'];
    $qty = $_POST['qty'];
    $type = $_POST['item_type'];
    $newitem = array(
    'id' => $id, 
    'name' => $name, 
    'price' => $price*$qty, 
    'qty' => $qty, 
    'type'=> $type
    );
    //if not empty
    if(!empty($_SESSION['cart']))
    {    
        //and if session cart same 
        if(isset($_SESSION['cart'][$id]) == $id) {
            $_SESSION['cart'][$id]['qty']+=$qty;
            $_SESSION['cart'][$id]['price'] = $price*$_SESSION['cart'][$id]['qty'];
        } else { 
            //if not same put new storing
            $_SESSION['cart'][$id] = $newitem;
        }
    } 
    else  {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$id] = $newitem;
    }
    //$_SESSION['msg1'] = "Added to Cart";
    header("location: ../index.php");
} 

else if(isset($_POST['remove'])){
    $id = $_POST['id'];
    //$_SESSION['msg1'] = "Removed from Cart";
    unset($_SESSION['cart'][$id]);
    header("location:../index.php");
    exit();
}
?>
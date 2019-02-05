<?php session_start(); 

if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
  header ("location: admin.php");
  exit;
}
include 'Includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vegetable Shop: Admin Panel-Dashboard</title>
	<link rel="stylesheet" type="text/css" href="Style/style.css">
	<link rel="stylesheet" type="text/css" href="Style/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="Style/admin.css">
  <script type="text/javascript" src="Script/jquery-1.3.2.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $("#product-menu").click(function(){
        $("#product").show();
        $("#order").hide();
        $("#order1").hide();

      });
    });

$(function(){
      $("#order-menu").click(function(){
        $("#product").hide();
        $("#order").show();
        $("#order1").hide();
      })

    });
$(function(){
      $("#order-menu1").click(function(){
        $("#product").hide();
        $("#order").hide();
        $("#order1").show();
      })

    });
  </script>
  <style type="text/css">
    #nav ul li{
      margin-left: 30px;
    }
  </style>
</head>
<body>
<div class="logo_products" style="margin-top: -40px;">
    <div class="container">
      <div class="w3ls_logo_products_left">
        <h1><a href="index.php"><span>Vegetable</span> Shop</a></h1>
      </div>
      <div id="nav" style="margin-top: 50px;">
        <ul>
          <li><a href="#product" id="product-menu">Products</a> </li>
          <li><a href="#order" id="order-menu">Orders to be Dispatched</a> </li>
          <li><a href="#order1" id="order-menu1">Dispatched Orders</a></li>
        </ul>
      </div>
      <div id="logout">
        <span id="user">Welcome, <?php echo $_SESSION['name'] ?></span>
        <a href="Includes/logout.php" class="btn btn-primary btn-md">Log Out</a>
      </div>

      <div class="clearfix"> </div>
    </div>
  </div>
  <div id="product" style="">
    <center><h1>Products</h1></center>
  <div id="main-container">
    <div class="col-md-3 top_brand_left" style="margin-top: 2em;">
          <div class="hover14 column">
            <div class="agile_top_brand_left_grid">
              <div class="agile_top_brand_left_grid1">
                <figure>
                  <div class="snipcart-item block" >
                    <div class="snipcart-thumb">
                      <form action="Includes/insert.php" method="post" enctype="multipart/form-data">
                        <table>
                          <tr><td>Name</td><td><input type="text" name="name"></td></tr>
                          <tr><td>Price</td><td><input type="text" name="price"></td></tr>
                          <tr><td>Type</td><td><select name="type">
                            <?php $qry3 = "SELECT Type FROM tbl_type";
                              $result = mysqli_query($conn, $qry3);
                              while ($ty = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $ty['Type'] ?>"><?php echo $ty['Type'] ?></option>
                                <?php 
                              }
           ?>
                          </select></td></tr>
                          <tr><td>Image</td><td><input type="file" name="pic"></td></tr>
                          <tr><td>Desc</td><td><textarea name="descr"></textarea></td></tr>
                          <tr><td></td><td><input type="submit" name="" value="Insert" class="btn btn-primary btn-md"></td></tr>
                        </table>
                      </form>
                    </div>
                    
                  </div>
                </figure>
              </div>
            </div>
          </div>
        </div>


   <?php 
   $qry = "SELECT * FROM tbl_item";
   $result = mysqli_query($conn, $qry);
   while ($rs = mysqli_fetch_array($result)) {
     ?>
     <div class="col-md-3 top_brand_left" style="margin-top: 2em;">
          <div class="hover14 column">
            <div class="agile_top_brand_left_grid">
              <div class="agile_top_brand_left_grid1">
                <figure>
                  <div class="snipcart-item block" >
                    <div class="snipcart-thumb">
                      <a href="description.php?id=<?php echo $rs['id'] ?>"><img title=" " alt="<?php echo $rs['ProductName']?>" src="Images/<?php echo $rs['Image'] ?>" /></a>    
                      <p><?php echo $rs['ProductName']?></p>
                      <h4>Rs. <?php echo $rs['Price']?></h4>
                      <p><?php echo $rs['ProductDescription'] ?></p>
                      <a href="Includes/del.php?id=<?php echo $rs['id'] ?>" class="btn btn-warning btn-md" style="width: 49%; float: left;">DEL</a>
                      <a href="Includes/edit.php?id=<?php echo $rs['id'] ?>" class="btn btn-success btn-md" style="width: 49%; float: right;">EDIT</a>
                    </div>
                    
                  </div>
                </figure>
              </div>
            </div>
          </div>
        </div>
     <?php 
   }

   ?>

  </div>
  </div>
  <div class="clearfix"></div>
  <div id="order" style="display: block; width: 80%; margin-left: auto; margin-right: auto; min-height: 500px;" >
    <center><h1>Order to Be Dispatched</h1></center>
    <table border="0px;">
      <tr style="height: 30px;"><td style="width: 100px;"><h4>OrderID</h4></td><td style="width: 200px;"><h4>Customer Name</h4></td><td style="width: 300px;"><h4>Address</h4></td><td style="width: 200px;"><h4>Product Type</h4></td><td style="width: 200px;"><h4>Products</h4></td><td style="width: 200px;"><h4>Action</h4></td></tr>
    <?php 
    $qry = "SELECT * FROM tbl_order WHERE status=0 ORDER BY oid DESC";
    $result = mysqli_query($conn, $qry);

    while ($rs = mysqli_fetch_array($result)) {
      ?>
      <tr style="height: 30px;"><td><?php echo $rs['oid'] ?></td><td style="width: 200px;"><?php echo $rs['cname'] ?></td><td style="width: 300px;"><?php echo $rs['landmark'] ?>,<?php echo $rs['city'] ?></td><td style="width: 100px;"><?php echo $rs['vtype'] ?></td><td style="width: 200px;"><?php echo $rs['vname'] ?></td> <td style="width: 200px;"><a href="Includes/delever.php?id=<?php echo $rs['oid'] ?>" class="bnt btn-primary btn-lg" style="height: 25px; ">Delever</a></td></tr>
      <?php 
    }


    ?>
    </table>
  </div>
  <div id="order1" style=" width: 80%; margin-left: auto; margin-right: auto; min-height: 500px;" >
    <center><h1>Dispatched Order</h1></center>
    <table border="0px;">
      <tr style="height: 30px;"><td style="width: 100px;"><h4>OrderID</h4></td><td style="width: 200px;"><h4>Customer Name</h4></td><td style="width: 300px;"><h4>Address</h4></td><td style="width: 200px;"><h4>Product Type</h4></td><td style="width: 200px;"><h4>Products</h4></td></tr>
    <?php 
    $qry = "SELECT * FROM tbl_order WHERE status=1 ORDER BY oid DESC";
    $result = mysqli_query($conn, $qry);

    while ($rs = mysqli_fetch_array($result)) {
      ?>
      <tr style="height: 30px;"><td><?php echo $rs['oid'] ?></td><td style="width: 200px;"><?php echo $rs['cname'] ?></td><td style="width: 300px;"><?php echo $rs['landmark'] ?>,<?php echo $rs['city'] ?></td><td style="width: 100px;"><?php echo $rs['vtype'] ?></td><td style="width: 200px;"><?php echo $rs['vname'] ?></td> </tr>
      <?php 
    }


    ?>
    </table>
  </div>
  <div class="clearfix"></div>
  <div id="footer">
    <p>&copy; Vegetable Shop, 2017</p>
  </div>
</body>
</html>
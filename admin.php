<?php session_start();
include 'Includes/connection.php';
if(isset($_SESSION['error'])) $error = $_SESSION['error'];

else{
  $error = "";
}
if(isset($_SESSION['user1'])) $user = $_SESSION['user1'];
else{
  $user = "";
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Vegetable Shop: Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="Style/admin.css">
  <link rel="stylesheet" type="text/css" href="Style/style.css">
  <link rel="stylesheet" type="text/css" href="Style/bootstrap.css">

  <style type="text/css">
    .sub-container{
      min-height: 600px;
      background: ;
    }
  </style>

</head>
<body>
    <div class="logo_products" style="margin-top: -40px;">
    <div class="container">
      <div class="w3ls_logo_products_left">
        <h1><a href="index.php"><span>Vegetable</span> Shop</a></h1>
      </div>
      
      <div class="clearfix"> </div>
    </div>
  </div>
<div id="login" style="min-height: 400px;">
  <br><h4>Please, Make urself known to us</h4>
  <form action="Includes/login.php" method="post">
    <div id="warning"><p><?php echo $error; ?></p></div>
    <span id="form-txt">Username</span><br><input type="text" name="username" value="<?php echo $user ?>">
    <br><span id="form-txt">Password</span><br><input type="Password" name="password">
    <br>
    <br><input type="submit" value="Log In" class="btn btn-primary btn-lg" style="width: 120px;">
  </form>

</div>
</div>

<div id="footer">
    <p>&copy; Vegetable Shop, 2017</p>
  </div>
</div>
</body>
</html>


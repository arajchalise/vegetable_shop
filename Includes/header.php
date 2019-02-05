<div class="agileits_header">
		<div class="search">
			<form action="search.php" method="post">
				<input type="text" name="Product" value="" placeholder="Search products..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required>
				<input type="submit" value=" " name="sbmt">
			</form>
		</div>
		<script type="text/javascript">
$(function() {
			$("#viewCart").click(function(){
				$(".sshow").toggle("fast");
			});
		});
</script>
		<div class="product_list_header">  
			<button id="viewCart" style="
    width: 200px;
    height: 50px;
    background: none;
    color: #fff;
    border: 0.5px solid white;
">View Cart <img src="Images/cart.png" style="margin-left: 5px;"></button>
			<div class="sshow" style="display: none; position: absolute; background-color: #fff; color: #000; min-height: 200px; min-width: 300px; z-index: 1000;">
				<form method="post" action="Includes/addtocart.php">
		<table>
  <?php
  if(!isset($_SESSION['cart']) || $_SESSION['cart'] == ""){?><p style="text-align: center; margin-top: 20px;">Your Cart is Empty</p> <?php }
  else{
    foreach ($_SESSION['cart'] as $products) {
        ?>
 		<input type="text" name="id" value="<?php echo $products['id'] ?>" hidden/>
			<tr><td style="padding-right: 20px;"><input type="text" name="name" value="<?php echo $products['name'] ?>" readonly style="border: none; width: 150px;  margin-left: 10px;"></td><td style="padding-right: 20px;"><?php echo $products['qty'] ?></td><td style="padding-right: 10px;">Rs. <?php echo $products['price'] ?></td><td><input type="submit" name="remove" value="&times;"  id="remove" style="width: 40px; font-size: 40px; font-weight: bold; background-color: transparent; border: none"></td></tr> 
			<?php } ?>
			</form>
		 <tr><td colspan="3"><form action="checkout.php" method="post"><input type="submit" name="checkout" value="Checkout" class="btn btn-primary btn-lg" style="margin-top: 10px; margin-bottom: 10px; margin-left: 20px;"></form></td></tr>
		 <?php } ?>
		 </table>
	</div>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="#">Login</a></li> 
								<li><a href="#">Sign Up</a></li>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		
		<div class="clearfix"> </div>
	</div>

	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Vegetable</span> Shop</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="#">About Us</a><i>/</i></li>
					<li><a href="#">Special Offer</a><i>/</i></li>
					<li><a href="#">News & Events</a><i>/</i></li>
					<li><a href="#">Services</a><i>/</i></li>
					<li><a href="#">FAQs</a></li>

				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<?php $qry3 = "SELECT Type FROM tbl_type";
							$result = mysqli_query($conn, $qry3);
					 ?>
					<ul class="nav navbar-nav nav_1">
						<?php while($ty = mysqli_fetch_array($result)){?>
						<li><a href="products.php?type=<?php echo $ty['Type'] ?>"><?php echo $ty['Type'] ?></a></li>
						<?php } ?>
					</ul>
				 </div>
			</nav>
		</div>
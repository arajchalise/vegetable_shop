<?php  
session_start();
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = "";
}

if(isset($_SESSION['msg'])){
	?>
	<script type="text/javascript">
		alert("Checkout Successfully");
	</script>
	<?php
	unset($_SESSION['msg']);
}
if(isset($_SESSION['msg1'])){
	$msg1 = $_SESSION['msg1'];
	if($msg1 === "Added to Cart") {
		?>
	<script type="text/javascript">
		alert("Item has Added to Cart");
	</script>

	<?php
	}
	else if($msg1 === "Removed from Cart"){
		?>
		<script type="text/javascript">
		alert("Item has Removed from Cart");
	</script>
		<?php 
	}
	unset($_SESSION['msg1']);
}
include 'Includes/connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Vegetable Shop</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="Style/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="Style/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="Style/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="Script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="Script/move-top.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

</head>
	
<body>
	<?php include 'Includes/header.php'; ?>
	
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="Style/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="Script/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="top-brands">
		<div class="container">
			<h3>All Items</h3>
			<div class="agile_top_brands_grids">

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
										</div>
										<div class="snipcart-details top_brand_home_details">
											
											<form action="Includes/addtocart.php" method="post">
												<fieldset>
													<input type="text" name="id" value="<?php echo $rs['id'] ?>" hidden>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="<?php echo $rs['ProductName']?>" />
													<input type="hidden" name="item_type" value="<?php echo $rs['ProductType']?>" />
													<input type="hidden" name="amount" value="<?php echo $rs['Price']?>" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="NRP" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<span style="width: 30%; float: left; ">Qty: </span><input type="number" name="qty" value= 1 style="width: 50%; float: right;" />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset> 
											</form>
											
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>

				<?php } ?>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<div id="footer">
		<p>&copy; Vegetable Shop, 2017</p>
	</div>

<script src="Script/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

</body>
</html>

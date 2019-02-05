<?php
session_start();
include 'Includes/connection.php';
$id = $_GET['id'];
 ?>
<!DOCTYPE html>
<html>
<head> 
<title>Vegetable Shop: Description</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
			<?php $qry = "SELECT * FROM tbl_item WHERE id='$id'";
			$result = mysqli_query($conn, $qry);
			$rs = mysqli_fetch_array($result);
			 ?>
			<div class="agileinfo_single">
				<h5><?php echo $rs['ProductName'] ?></h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="Images/<?php echo $rs['Image'] ?>" alt="<?php echo $rs['ProductName'] ?>" class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php echo $rs['ProductDescription'] ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4>Rs. <?php echo $rs['Price'] ?></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="Includes/addtocart.php" method="post">
								<fieldset>
									<input type="text" name="id" value="<?php echo $rs['id'] ?>" hidden>
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" />
									<input type="hidden" name="business" value=" " />
									<input type="hidden" name="item_name" value="<?php echo $rs['ProductName'] ?>" />
									<input type="hidden" name="item_type" value="<?php echo $rs['ProductType']?>" />
									<input type="hidden" name="amount" value="<?php echo $rs['Price'] ?>" />
									<input type="hidden" name="discount_amount" value="0.00" />
									<input type="hidden" name="currency_code" value="USD" />
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									<span style="width: 30%; float: left;">Qty: </span><input type="number" name="qty" value= 1 style="width: 50%; float: right;" />
									<input type="submit" name="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular" style="margin-top: -50px;">
		<div class="container">
			<h3>Other Products</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
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
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<span style="width: 30%; float: left;">Qty: </span><input type="number" name="qty" value= 1 style="width: 50%; float: right;" />
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

</body>
</html>
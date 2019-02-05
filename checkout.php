<?php 
session_start();
include 'Includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Vegetable Shop: Checkout</title>
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
</head>
	
<body>
	<?php include 'Includes/header.php'; ?>

		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
	      
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<a href="index.php"><h4>Continue to basket</h4></a>
					<div id="total_bill"></div>
					<ul>
					<?php
					$amount = 0;
    foreach ($_SESSION['cart'] as $products) {
    	
       	$amount+= $products['price'];
        ?>
 			<li style="font-weight: normal;"><?php echo $products['name'] ?><i>-</i> <span><?php echo $products['price'] ?></span></li>
			<!--<tr><td style="padding-right: 20px;"><?php echo $products['name'] ?></td><td style="padding-right: 20px;"><?php echo $products['qty'] ?></td><td style="margin-right: 10px;"><?php echo $products['price'] ?></td></tr> --> 
			<?php } 

			$_SESSION['total'] = $amount;
			if($amount==0){
				echo "Nothing here to checkout";
				exit();
			}
			?>
			<li>Total<i>-</i> <span><?php echo $amount ?></span></li>
		</ul>
				</div>
			</div>
				<div class="col-md-6 address_form_agile">
					  <h4>Add a new Details</h4>
				<form action="Includes/payment.php" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name" type="text" name="name" required>
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Mobile number:</label>
														    <input class="" type="text" name="mobile" required>
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Landmark: </label>
														 <input class="" type="text" name="landmark" required>
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Town/City: </label>
												 <input class="" type="text" name="city" required>
												</div>
													
											</div>
											<button class="submit check_out">Deliver</button>
										</div>
									</section>
								</form>
									
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->


<div id="footer">
		<p>&copy; Vegetable Shop, 2017</p>
	</div>
<!-- js -->
<script src="Script/jquery-1.11.1.min.js"></script>
			
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="Script/move-top.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

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
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
	<!-- Start of cart -->
	<div class="wrapper">
		<?php include 'includes/navbar.php'; ?>
		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-header">YOUR CART</h1>
						<div class="box box-solid">
							<div class="box-body">
								<table class="table table-bordered">
									<thead>
										<th>Photo</th>
										<th>Name</th>
										<th>Price</th>
										<th width="20%">Quantity</th>
										<th>Subtotal</th>
										<th></th>
									</thead>
									<tbody id="tbody">
										
									</tbody>
								</table>
								<div class="col-md-4"></div>
							</div>
						</div>
						
					<div class="col-sm-6">
						<!-- Coupon Generation -->
						<div class="row">
							<div class="col-md-6">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> Generate Coupon</button>
								<div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<form action="save_coupon.php" method="POST">
										<div class="modal-content">
											<div class="modal-body">
												<div class="col-md-2"></div>
												<div class="col-md-8">
													<div class="form-group">
														<label>Discount</label>
														<input type="number" class="form-control" name="discount" min="10" max="14" value="12" required="required"/>
													</div>
													<div class="form-group">
														<button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button>
														<br /><br />
														<label>Coupon Code</label>
														<p>*Save the coupon code to use</p>
														<input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
													</div>
												</div>
											</div>
											<div style="clear:both;"></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
												<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
											</div>
										</div>
									</form>
								</div>
						<!-- Coupon Generation -->
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<h6 class="text-warning">*Optional</h6>
								<label>Coupon Code</label>
								<input class="form-control" type="text" id="coupon1" value="PR45K3MWHF"/>
								<input type="hidden" value="<?php echo $fetch['price']?>" id="price"/>
								<div id="result"></div>
								<br style="clear:both;"/>
								<button class="btn btn-primary" id="activate">Activate Code</button>
							</div>
							<!-- <div class="form-group">
								<label>Total Price</label>
								<input class="form-control" type="number" value="<?php echo $fetch['total']?>" id="total" readonly="readonly" lang="en-150"/>
							</div> -->
						</div>
						</div>
					</div>
					</section>
				<?php $pdo->close(); ?>
				<?php
					if(isset($_SESSION['user'])){
						echo "
							<div id='paypal-button' align='right'></div>
						";
					}
					else{
						echo "
							<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
						";
					}
				?>
				<?php include 'includes/footer.php'; ?>
			</div>
		</div>
	</div>
	<!-- End of cart -->
	
	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("get_coupon.php", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('#activate').on('click', function(){
			var coupon = $('#coupon1').val();
			var price = $('#price').val();
			if(coupon == ""){
				alert("Please enter a coupon code!");
			}else{
				$.post('get_discount.php', {coupon: coupon, price: price}, function(data){
					if(data == "error"){
						alert("Invalid Coupon Code!");
						$('#total').val(price);
						$('#result').html('');
					}else{
						var json = JSON.parse(data);
						$('#result').html("<h4 class='pull-right text-danger'>"+json.discount+"% Off</h4>");
						$('#total').val(json.price);
					}
				});
			}
		});
	});
</script>
<?php include 'includes/scripts.php'; ?>
<script>
	var total = 0;
	$(function(){
		$(document).on('click', '.cart_delete', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: 'cart_delete.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(!response.error){
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

		$(document).on('click', '.minus', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			var qty = $('#qty_'+id).val();
			if(qty>1){
				qty--;
			}
			$('#qty_'+id).val(qty);
			$.ajax({
				type: 'POST',
				url: 'cart_update.php',
				data: {
					id: id,
					qty: qty,
				},
				dataType: 'json',
				success: function(response){
					if(!response.error){
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

		$(document).on('click', '.add', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			var qty = $('#qty_'+id).val();
			qty++;
			$('#qty_'+id).val(qty);
			$.ajax({
				type: 'POST',
				url: 'cart_update.php',
				data: {
					id: id,
					qty: qty,
				},
				dataType: 'json',
				success: function(response){
					if(!response.error){
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

		getDetails();
		getTotal();

	});

	function getDetails(){
		$.ajax({
			type: 'POST',
			url: 'cart_details.php',
			dataType: 'json',
			success: function(response){
				$('#tbody').html(response);
				getCart();
			}
		});
	}

	function getTotal(){
		$.ajax({
			type: 'POST',
			url: 'cart_total.php',
			dataType: 'json',
			success:function(response){
				total = response;
			}
		});
	}
	</script>
	<!-- Paypal Express -->
	<script>
	paypal.Button.render({
		env: 'sandbox', // change for production if app is live,

		client: {
			sandbox:    'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
			//production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
		},

		commit: true, // Show a 'Pay Now' button

		style: {
			color: 'gold',
			size: 'small'
		},

		payment: function(data, actions) {
			return actions.payment.create({
				payment: {
					transactions: [
						{
							//total purchase
							amount: { 
								total: total, 
								currency: 'USD' 
							}
						}
					]
				}
			});
		},

		onAuthorize: function(data, actions) {
			return actions.payment.execute().then(function(payment) {
				window.location = 'sales.php?pay='+payment.id;
			});
		},

	}, '#paypal-button');
	</script>
</body>
</html>
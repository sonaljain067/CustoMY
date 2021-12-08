<div class="form-group">
    <h4 class="text-warning">*Optional</h4>
    <label>Coupon Code</label>
    <input class="form-control" type="text" id="coupon"/>
    <input type="hidden" value="<?php echo $fetch['product_price']?>" id="price"/>
    <div id="result">[]</div>
    <br style="clear:both;"/>
    <button class="btn btn-primary" id="activate">Activate Code</button>
</div>
<div class="form-group">
    <label>Total Price</label>
    <label class="form-control" type="number" value="<?php echo $fetch['product_price']?>" id="total" readonly="readonly" lang="en-150"></label>
</div>
                            <div class="col-sm-3">
    <hr style="border-top:1px dotted #ccc;"/>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> Generate Coupon</button>
    <div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <form action="save_coupon.php" method="POST">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="number" class="form-control" name="discount" min="10" max=
                                    "45" required="required"/>
                                </div>
                                <button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button><br/><br/>
                                <label>Coupon Code</label>
                                <input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
                                <br />
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
    </div>
    </div>
</div>
<script>
    $(document).ready(function(){
		$('#activate').on('click', function(){
			var coupon = $('#coupon').val();
			var price = $('#price').val();
			if(coupon == ""){
				alert("Please enter a coupon code!");
			}else{
				$.post('cart_.php', {coupon: coupon, price: price}, function(data){
					if(data == "error"){
						alert("Invalid Coupon Code!");
						$('#total').val(price);
						$('#result').html('');
					} else{
						var json = JSON.parse(data);
						$('#result').html("<h4 class='pull-right text-danger'>"+json.discount+"% Off</h4>");
						// $('#total').val(json.price);
						$('#total').val(data.price);
					}
				});
			}
		});
	});
</script>
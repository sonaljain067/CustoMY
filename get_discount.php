<!-- Get total purchase price -->
$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
	$stmt->execute(['user'=>$user['id']]);
	$quantity=0,$totalDisc=0,$discount=0;
	foreach($stmt as $row){
		$quantity+=$row['quantity'];
	}
	if($quantity<15 && $quantity>8)
		$discount=8;
	if($quantity>=15)
		$discount=12;
	else if($quantity>=25)
		$discount=15;
	else if($quantity>=35)
		$discount=25;
	else if($quantity>=50)
		$discount=30;

	$totalDisc = ($discount*$total)/100);
<?php
	$con=mysqli_connect('localhost', 'root', '', 'db_coupon');
	if(!$con){
		die("Error: Failed to connect to database");
	}
	$coupon_code = $_POST['coupon'];
	$price = $_POST['price'];
	
	$query = mysqli_query($con, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
	$count = mysqli_num_rows($query);
	$fetch = mysqli_fetch_array($query);
	$array = array();
	if($count > 0){
		$discount = $fetch['discount'] / 100;
		$total = $discount * $price;
		$array['discount'] = $fetch['discount'];
		$array['price'] = $price - $total;
		
		echo json_encode($array);
		
	}else{
		echo "error";
	}
?>
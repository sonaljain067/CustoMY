<?php
	include 'includes/session.php';

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		$coupon_code = $_POST['coupon'];
		$price = $_POST['price'];
		
		$query = $conn->prepare("SELECT discount FROM `coupon` WHERE `coupon_code` = '$coupon_code'") or die(mysqli_error());

		$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products on products.id=cart.product_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user['id']]);

		$total = 0,$finalTotal=0;
		foreach($stmt as $row){
			$subtotal = $row['price'] * $row['quantity'];
			$total += $subtotal;
			$discount=$total-($total*$query/100);
			$finalTotal=$total-$discount;
		}

		$pdo->close();

		echo json_encode($finalTotal);
	}
?>
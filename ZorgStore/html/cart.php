<?php include 'navigation/navigation.php';
$cart = json_decode($_COOKIE[$user_id], true);
?>

<h2>Your Shopping Cart</h2>

<?php 
	while($id = key($cart)){
		$sql = "SELECT title, price, book_pic FROM books WHERE book_id ='$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc()) { ?>
				
				<div class="container-cart-main">
					<div class="cart-left">
						<a href="product.php?id=<?php echo $id ?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["book_pic"]).'" width="50" height="75"/>';?> </a>
					</div>
					<div class="cart-right">
						<h2> <?php echo $row["title"];  ?> </h2>
						<p>Price: $<?php echo $row["price"] ?> </p>
						<p>Quantity: <?php echo $cart[$id]; ?> </p>
						
						<?php 
						if (isset($_SESSION['user_id'])){
			$filename = "remove_from_cart.php?id=" .$id;
			}else{
			$filename = "login.php";}?>
			<a href=<?php echo $filename ?> class = "btn btn-basic jbbutton">Remove from cart </a>
						
					</div>
					</div>
			<h1></h1>
		<?php }			
		}
		
		next($cart);		
		} ?>
	
</br>
<a href=index.php class = "btn btn-basic jbbutton">Continue shopping </a>
<a href=checkout.php class = "btn btn-basic jbbutton">CheckOut </a>
</br>
</br>
</br>

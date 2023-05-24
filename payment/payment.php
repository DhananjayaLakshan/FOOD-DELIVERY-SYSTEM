<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Payment getway form design in Hindi</title>
	<link rel="stylesheet" type="text/css" href="payment.css">
	<script src="payment.js"></script>
</head>
<body>
	<div class="nav">
		<h2>Pizza Way</h2>
		<h2>Total Bill Amount : <?php echo "Rs. ".$_SESSION['calQuantity'];?></h2>
		<a href="../details/detail.php"><p>Back To Home</p></a>
	</div>
<header>
	<div class="container">
		<div class="left">
			<h3>BILLING ADDRESS</h3>
			<form>
				Full name
				<input type="text" name="" placeholder="Enter name">
				Email
				<input type="text" name="" placeholder="Enter email">

				Address
				<input type="text" name="" placeholder="Enter address">
				
				City
				<input type="text" name="" placeholder="Enter City">
				<div id="zip">
					<label>
						Province
						<select>
							<option>Central</option>
							<option>Eastern</option>
							<option>North Central</option>
							<option>Northern</option>
							<option>North Western</option>
							<option>Sabaragamuwa</option>
							<option>Southern</option>
							<option>Uva</option>
							<option>Central</option>
						</select>
					</label>
						<label>
						Zip code
						<input type="number" name="" placeholder="Zip code">
					</label>
				</div>
			</form>
		</div>
		<div class="right">
			<h3>PAYMENT</h3>
			<form>
				Accepted Card <br>
				<img src="image/card1.png" width="100">
				<img src="image/card2.png" width="50">
				<br><br>

				Credit card number
			<input type="text" name="" placeholder="Enter card number">
				
				Exp month
				<input type="text" name="" placeholder="Enter Month">
				<div id="zip">
					<label>
						Exp year
						<select>
							<option>Choose Year..</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
						</select>
					</label>
						<label>
						CVV
						<input type="number" name="" placeholder="CVV">
					</label>
				</div>
			</form>
			<input type="submit" name="" value="Pay Now">
		</div>
	</div>
</header>
</body>
</html>
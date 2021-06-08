<?php  include('customer_code.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering System</title>
	<link rel="stylesheet" type="text/css" href="Pizzastyle.css">
	
</head>
<body>

	<?php
		if(isset($_POST['order']))
		{
			$sql="select * from price";
			$result=mysqli_query($db,$sql);
		}
	
	?>
	<div class="header">
        <div class="logo">Pizza Hut</div>
        <div class="header-right">
            <form method="post" action="login.php">
				<input type="submit" name="Home" value="Home">
			</form>
        </div>
    </div>
    <div class="ima">
		<img class="slide" src="pizza12.jpg">
		<div class="centered">
			<form method="post" action="customer_code.php">
				<input type="hidden" name="id" >
				<label>Customer Name</label>
				<input type="text" name="customername" required><br>
			
				<label>Phone No</label>
				<input type="text" name="phoneno" required><br>

				<label>NIC</label>
				<input type="text" name="nic" required><br>

				<label>Delivery Date</label>
				<input type="date" name="deliverydate" required><br>

				<label>Pizza Type</label>
				<select name="pizzatype" required>
				<option value="veg">Veg</option>
				<option value="non-veg">Non-Veg</option>
				</select><br>
			
				<label>Pizza Size</label>
				<select name="pizzasize" required>
				<option value="small">Small</option>
				<option value="medium">Medium</option>
				<option value="large">Large</option>
				</select><br>
			
				<label>Quantity</label>
				<input type="number" name="quantity" min="1" max="25" required><br>
			
				<button type="submit" name="save" >Save</button><br>
			</form>
		</div>
		
		
		<?php if(isset($_POST['order'])){ ?>
			<table border="1" bgcolor="#2d1909" align="center" width="40%" height="50%">
				<tr>
					<td>Pizza Type</td>
					<td>Pizza Size</td>
					<td>Price</td>
				</tr>
				
				<?php while($row=mysqli_fetch_array($result)){ ?>
				<tr>
					<td><?php echo $row['pizzatype']; ?></td>
					<td><?php echo $row['pizzasize']; ?></td>
					<td><?php echo $row['price']; ?></td>
				</tr>
				<?php } ?>
			</table>
			</div>
		
		<?php } ?>
	
			<?php if (isset($_SESSION['message'])){ ?>
				<div class="msg">
					<?php 
						echo $_SESSION['message']; 
						unset($_SESSION['message']);
					?>
				</div>
			<?php } ?>
    </div>
	

</body>
</html>

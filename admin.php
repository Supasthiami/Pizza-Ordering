<?php  include('customer_code.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering System</title>
	<link rel="stylesheet" type="text/css" href="Pizzastyle.css">
</head>
<body>
	<div class="header">
        <div class="logo">Pizza Hut</div>
        <div class="header-right">
			<form method="post" action="">
				<input type="submit" name="logout" value="Logout">
			</form>
        </div>
    </div>
	
    <div class="ima">
		<div class="centered">
			<?php if(isset($_POST['logout'])){
			$_SESSION['message']="LogOut Successfully!!";
			$_SESSION['login']="logout";
			header("location:login.php");
			}?>

			<?php if($_SESSION['login']=="login"){ ?>
			<?php $results = mysqli_query($db, "SELECT * FROM members ORDER BY `Delivery Date`"); ?>
			<h4>All Orders Details</h4>
			<table border="1">
				<thead>
					<tr>
						<th> Customer Name </th>
						<th> Phone No </th>
						<th> NIC </th>
						<th> Delivery Date </th>
						<th> Pizza Type </th>
						<th> Pizza Size </th>
						<th> Quantity </th>
						<th> Bill</th>
					</tr>
				</thead>
				
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td><?php echo $row['Customer Name']; ?></td>
						<td><?php echo $row['Phone No']; ?></td>
						<td><?php echo $row['NIC']; ?></td>
						<td><?php echo $row['Delivery Date']; ?></td>
						<td><?php echo $row['Pizza Type']; ?></td>
						<td><?php echo $row['Pizza Size']; ?></td>
						<td><?php echo $row['Quantity']; ?></td>
						<td>
							 <?php
								$id = $row['id'];
								$pizzatype = $row['Pizza Type'];
								$pizzasize = $row['Pizza Size'];
								$sql="SELECT * FROM `price` WHERE `pizzatype` = '$pizzatype' and `pizzasize` = '$pizzasize'";
								$price = mysqli_fetch_array(mysqli_query($db,$sql));
								$bill = $price['price'] * $row['Quantity'];
								mysqli_query($db, "UPDATE `memfordeliver` SET `Bill`='$bill' WHERE `id` = '$id'");
								mysqli_query($db, "UPDATE `members` SET `Bill`='$bill' WHERE `id` = '$id'");
								echo $bill;
							?>
						</td>
						<!--<td>
							<a href="ordersbydd.php?edit=<?php //echo $row['id']; ?>">Edit</a>
						</td>
						<td>
							<a href="customer_code.php?del=<?php //echo $row['id']; ?>">Deliver</a>
						</td>
						-->
					</tr>
				<?php } ?>
			</table>
			<br>
			
			<form method="post" action="ordersbydd.php" >
				<label><b>View Orders by particular Delivery Date</b></label>
				<input type="date" name="deliverydate"><br>
				<button type="submit" name="submit" >Submit</button><br>
				
				<label><b>View Revenue of specific size of pizza for particular Delivery Date</b></label>
				<input type="date" name="deliverydate1"><br>
				<button type="submit" name="show" >Show</button>
			</form>
			
			<?php if (isset($_SESSION['message1'])): ?>
				<div class="msg">
					<?php 
						echo $_SESSION['message1']; 
						unset($_SESSION['message1']);
					?>
				</div>
			<?php endif ?>
			<?php } ?>
		</div>
    </div>
	
</body>
</html>

<?php  include('customer_code.php');?>
<html>
<head>
	<title>Pizza Ordering System</title>
	<link rel="stylesheet" type="text/css" href="Pizzastyle.css">
	
</head>
<body>

	<?php 
		$db=mysqli_connect("localhost","root","","pizza");
		
		if(isset($_POST['submit']))
		{
			$deliverydate=$_POST['deliverydate'];
			$sql="select * from memfordeliver where `Delivery Date`='$deliverydate'";
			$results=mysqli_query($db,$sql);
			$_SESSION['message2'] = "No orders!"; 
		}
		if(isset($_POST['show']))
		{
			$deliverydate1=$_POST['deliverydate1'];
			$sql="select `Pizza Size`,`Pizza Type`,sum(`Bill`) as Total from memfordeliver where `Delivery Date`='$deliverydate1' and status='Delivered' group by `Pizza Size`,`Pizza Type`";
			$results=mysqli_query($db,$sql);
			$_SESSION['message2'] = "No orders Delivered!"; 
		} 
		
		if(isset($_GET['edit']))
		{
			$id=$_GET['edit'];
			$record = mysqli_query($db, "SELECT * FROM memfordeliver WHERE id=$id");
			if (count(array($record)) == 1 ) 
			{
				$n = mysqli_fetch_array($record);
				$customername=$n['Customer Name'];
				$phoneno=$n['Phone No'];
				$nic=$n['NIC']; 
				$deliverydate=$n['Delivery Date'];
				$pizzatype=$n['Pizza Type'];
				$pizzasize=$n['Pizza Size'];
				$quantity=$n['Quantity'];
				$status=$n['status'];
			}	
		}
		if(isset($_POST['update']))
		{
			$id=$_POST['id'];
			$deliverydate=$_POST['deliverydate'];
			$status=$_POST['status'];
			$sql="update memfordeliver set `status`='$status' where id=$id";
			mysqli_query($db,$sql);
			$_SESSION['message'] = "Member details updated!"; 
		}
	?>
	<div class="header">
        <div class="logo">Pizza Hut</div>
        <div class="header-right">
			<form method="post" action="admin.php">
				<input type="submit" name="Home" value="Home">
				<input type="submit" name="logout" value="Logout">
			</form>
        </div>
    </div>
	
   
	<div class="centered">
		<?php if(isset($_POST['submit'])){?>
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
						<th> Status </th>
						<th>Bill</th>
						<th>Update Status</th>
						<th>Deliver</th>
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
						<td><?php echo $row['status']; ?></td>
						<td><?php echo $row['Bill']; ?></td>
						<td>
							<a href="ordersbydd.php?edit=<?php echo $row['id']; ?>">Edit</a>
						</td>
						<td>
							<a href="customer_code.php?del=<?php echo $row['id']; ?>">Deliver</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		<?php }?>
		
		<?php if(isset($_POST['update'])){?>
			<?php $results = mysqli_query($db, "select * from memfordeliver where `Delivery Date`='$deliverydate'"); ?>
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
						<th> Status </th>
						<th>Bill</th>
						<th>Update Status</th>
						<th>Deliver</th>
					</tr>
				</thead>
		
				<?php  while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['Customer Name']; ?></td>
					<td><?php echo $row['Phone No']; ?></td>
					<td><?php echo $row['NIC']; ?></td>
					<td><?php echo $row['Delivery Date']; ?></td>
					<td><?php echo $row['Pizza Type']; ?></td>
					<td><?php echo $row['Pizza Size']; ?></td>
					<td><?php echo $row['Quantity']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><?php echo $row['Bill']; ?></td>
					<td>
						<a href="ordersbydd.php?edit=<?php echo $row['id']; ?>">Edit</a>
					</td>
					<td>
						<a href="customer_code.php?del=<?php echo $row['id']; ?>">Deliver</a>
					</td>
				</tr>
				<?php } ?>
				</table>
		<?php } ?>
			
			
		<?php if(isset($_POST['show'])){?>
			<h3><u>Revenue of Delivered Sale</u></h3>
				<table border="1">
					<thead>
						<tr>
							<th> Pizza Type </th>
							<th> Pizza Size </th>
							<th> Total Price</th>
						</tr>
					</thead>
		
			<?php  while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['Pizza Type']; ?></td>
					<td><?php echo $row['Pizza Size']; ?></td>
					<td><?php echo $row['Total']; ?></td>
				</tr>
			<?php } ?>
			</table>
		<?php } ?>
			
			
		<?php if(isset($_GET['edit'])){?>
			<form method="post" action="ordersbydd.php" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="deliverydate" value="<?php echo $deliverydate; ?>">
				<label for="Updatestatus" >Update Status</label>
				<br>
				<label><input type="radio" name="status" value="New Order" <?php if($status=="New Order"){ echo "checked";} ?>>New Order </label>
				<label><input type="radio" name="status" value="Delivered" <?php if($status=="Delivered"){ echo "checked";} ?>>Delivered </label><br>

				<button  type="submit" name="update" >Update</button>
			</form>
		<?php }?>
			
		
		<?php if(isset($_POST['show'])) { if(mysqli_num_rows($results)==0){ ?>
			<div class="msg">
				<?php echo $_SESSION['message2']; 
					  unset($_SESSION['message2']); 
				?>
			</div>
		<?php } }?>
		
		<?php if(isset($_POST['submit'])){ if(mysqli_num_rows($results)==0){ ?>
			<div class="msg">
				<?php echo $_SESSION['message2']; 
					  unset($_SESSION['message2']); 
				?>
			</div>
		<?php } } ?>
		
			
		<?php if(isset($_POST['update'])){ ?>
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
	
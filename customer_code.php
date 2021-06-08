<?php
	session_start();
	$db=mysqli_connect("localhost","root","","pizza");
	$customername="";
	$phoneno="";
	$nic=""; 
	$deliverydate="";
	$pizzatype="";
	$pizzasize="";
	$quantity="";
	if(isset($_POST['save']))
	{
		$customername=$_POST['customername'];
		$phoneno=$_POST['phoneno'];
		$nic=$_POST['nic']; 
		$deliverydate=$_POST['deliverydate'];
		$pizzatype=$_POST['pizzatype'];
		$pizzasize=$_POST['pizzasize'];
		$quantity=$_POST['quantity'];
		$sql="insert into members(`Customer Name`, `Phone No`, `NIC`, `Delivery Date`, `Pizza Type`, `Pizza Size`, `Quantity`) value ('$customername','$phoneno','$nic','$deliverydate','$pizzatype','$pizzasize','$quantity')";
		$sql1="insert into memfordeliver(`Customer Name`, `Phone No`, `NIC`, `Delivery Date`, `Pizza Type`, `Pizza Size`, `Quantity`) value ('$customername','$phoneno','$nic','$deliverydate','$pizzatype','$pizzasize','$quantity')";
		$con=mysqli_query($db,$sql);
		$con1=mysqli_query($db,$sql1);
		$_SESSION['message1'] = "New Order Updated!"; 
		$_SESSION['message'] = "Your Order Registered Successfully!"; 
		header("Location:login.php");
	}
	
	if(isset($_GET['del']))
	{
		$id=$_GET['del'];
		$sql="delete from members where id=$id";
		$con=mysqli_query($db,$sql);
		$_SESSION['message1'] = "Order Delivered successfully!"; 
		header("Location:admin.php");
	}
	
	
?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering Login </title>
	<link rel="stylesheet" type="text/css" href="Pizzastyle.css">

</head>
<body>
	<?php if(isset($_POST['login'])){ 
		$db=mysqli_connect("localhost","root","","pizza");
		$username=$_POST['username'];
		$con=mysqli_query($db,"select * from admins where `username`='$username'");
		$result=mysqli_num_rows($con);
		if($result != 0){
			$password=$_POST['password'];
			$con1=mysqli_query($db,"select `password` from admins where `username`='$username'");
			$re=mysqli_fetch_array($con1);
			if($re['password'] == $password){
				$_SESSION['login']="login";
				header("location:admin.php");
			}
			else{
				$_SESSION['message']="InCorrect Password!";
			}
		}
		else{
		$_SESSION['message']="You are not an admin!!";
		} 
	}
	?>
    <div class="header">
        <div class="logo">Pizza Hut</div>
        <div class="header-right">
			<form method="post" action="customer.php" >
				<input type="submit" name="order" value="Order" >
			</form>
			
			<form method="post" action="">
				<input type="submit" name="signin" value="Sign In" >
			</form>
        </div>
    </div>
	
	
    <div class="image">
		<img class="mySlides" src="pizza6.png" >
		<div class="centered">
			<?php if(isset($_POST['signin'])){ ?>
				<form method="post" action="login.php" class="centered">
					<label for="username" class="textcol" >User Name</label>
					<input type="text" name="username" id="username" placeholder="Username"><br>
					<label for="password" class="textcol">Password</label>
					<input type="password" name="password" id="password" placeholder="Password"><br>
					<input type="submit" name="login" value="Login">
				</form>
			<?php } ?>
		</div>
    </div>
	
		
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
</body>
</html>

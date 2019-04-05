<?php 
session_start();
require 'functions.php';

if(isset($_POST["login"]) ){

	$username= $_POST["username"];
	$password = $_POST["password"];
	$_SESSION["login_user"] = $username;
	$result = mysqli_query($conn , "SELECT * FROM user WHERE username = '$username' " );

	//cek user
	if(mysqli_num_rows($result) === 1){

		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"] )){
			//set session
			$_SESSION["login"] = true;
			header("Location: index_user.php");
			exit;
			

		}
	}  
	$error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>
		Halaman Login
	</title>
</head>
<body>
	<?php if(isset ($error)) :  ?>
		<p style="color:red; font-style: italic;">username / password salah </p>
	<?php endif; ?>

	<div class="container">
		<h2 class ="text-center">Login User</h2>
		<form action="" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="username" class="form-control" name="username" id="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password"class="form-control" id="password" placeholder="Password">
			</div>
			<div class="form-group form-check">


			</div>
			<button type="submit" name="login" class="btn btn-primary">LOGIN</button>
			<a href="registrasi.php">Belum punya akun?</a> <br>
			<a href="loginadmin.php">Login sebagai admin</a>

		</body>
		</html>
<?php 
session_start();
require 'functions.php';

if(isset($_POST["login"]) ){

	$username= $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn , "SELECT * FROM admin WHERE username = '$username' "  );

	//cek user
	if(mysqli_num_rows($result) === 1){

		$row = mysqli_fetch_assoc($result);
		if($password === $row["password"] ){
			//set session
			$_SESSION["admin"] = true;
			header("Location: index.php");
			exit;
		}
	}  
	$error = true;
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Halaman Login
	</title>
</head>
<body>
	<h1>Halaman Login admnin</h1>
	<?php if(isset ($error)) :  ?>
		<p style="color:red; font-style: italic;">username / password salah </p>
		<?php endif; ?>
	<form action="" method="post">
		
		<ul>
			<li>
				<label for="username"> Username: </label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password"> Password: </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="login"> Login </button>
			</li>
		</ul>

	</form>

</body>
</html>
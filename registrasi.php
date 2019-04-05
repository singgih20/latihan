<?php 

require 'functions.php';

if(isset($_POST["register"]) ){
	if(registrasi($_POST) > 0 ){
		echo "<script> alert('user baru berhasil ditambahkan');
		document.location.href='login.php'
		</script>";
	}else{
		echo "<script> alert('user baru gagal ditambahkan');
		</script>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"  href="font-awesome/css/fontawesome.min.css">
	<link rel="stylesheet"  href="font-awesome/css/fontawesome.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/admin.css">
</head>
<body>

	<h1>Halaman Registrasi</h1>

	<form action="" method="post">

		<ul>
			<li>
				<label for="username" > Username: </label>
				<input type="text"  class="form-control" name="username" id="username" required>
			</li>
			<li>
				<label for="password"> Password </label>
				<input type="password" class="form-control"  name="password" id="password" required>
			</li>
			<li>
				<label for="password2"> Confirm Password: </label>
				<input type="password" class="form-control" name="password2" id="password2">
			</li>
			<li>
				<label for="nama">Nama</label>
				<input type="text"class="form-control"  name="nama" id="nama" required>
			</li>
			<li>
				<label for="kode">Kode Assistant</label>
				<input type="text"class="form-control"  name="kode" id="kode" required>
			</li>
			<li>
				<button type="submit" class="btn btn-primary" name="register">Register! </button>
			</li>

		</ul>

	</form>
	<script src="dist/js/jquery.min.js"></script> 
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="dist/js/admin.js"></script>
</body>
</html>
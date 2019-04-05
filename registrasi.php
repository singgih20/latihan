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
	<title>Halaman Registrasi</title>
</head>
<body>

<h1>Halaman Registrasi</h1>

<form action="" method="post">
	
	<ul>
		<li>
			<label for="username" > Username: </label>
			<input type="text" name="username" id="username" required>
		</li>
		<li>
			<label for="password"> Password </label>
			<input type="password" name="password" id="password" required>
		</li>
		<li>
			<label for="password2"> Confirm Password: </label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<label for="nama">Nama</label>
			<input type="text" name="nama" id="nama" required>
		</li>
		<li>
			<label for="kode">Kode Assistant</label>
			<input type="text" name="kode" id="kode" required>
		</li>
		<li>
			<button type="submit" name="register">Register! </button>
		</li>

	</ul>

</form>
</body>
</html>
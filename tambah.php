<?php 
session_start();
if(!isset($_SESSION["admin"]) ){
	header("Location: login.php");
	exit;
}
require 'functions.php';
if(isset($_POST["submit"]) ){
	if(tambah($_POST) > 0 ){
		echo "<script> alert('Data berhasil ditambahkan');
			  document.location.href='index.php';
			  </script>";
	}else{
		echo "<script> 
			  document.location.href='tambah.php';
			  </script>";
	}
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Rekap Absen</title>
</head>
<body>
<h1>Tambah Data Rekap Absen</h1>

<form action="" method="post">
	<ul>
		<li>
			<label for="nama">Nama: </label>
			<input type="text" name="nama" id="nama" required>
		</li>
		<li>
			<label for="Kode">Kode Assistant: </label>
			<input type="text" name="kode" id="kode" required>
		</li>

		<li>
			<label for="jam">Jam Masuk: </label>
			<input type="time" name="jam" id="jam" required>
		</li>
		<li>
			<label for="tanggal">Tanggal: </label>
			<input type="date" name="tanggal" id="tanggal" required>
		</li>
		<li>
			<button type="submit" name="submit">Submit</button>
		</li>
	</ul>
</form>

</body>
</html>
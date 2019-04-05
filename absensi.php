<?php 
session_start();
if(!isset($_SESSION["login"]) ){
	header("Location.login.php");
	exit;
}
require 'functions.php';
if(isset($_POST["submit"]) ){
	if(request($_POST) > 0 ){
		echo "<script> alert('Data berhasil direquest');
			  document.location.href='index_user.php';
			  </script>";
	}else{
		echo "<script> 
			  document.location.href='absensi.php';
			  </script>";
	}
}
$username = $_SESSION["login_user"];
$user = query("SELECT *	 FROM user WHERE username = '$username'");
date_default_timezone_set('Asia/Jakarta');

$date = date('h:i:s a', time());
 ?>


<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>Administrator</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"  href="font-awesome/css/fontawesome.min.css">
	<link rel="stylesheet"  href="font-awesome/css/fontawesome.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/admin.css">
</head>
<body>


	<div class="wrapper">
		<nav class="navbar navbar-default bg-light">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
					<span class="sr-only"> Toggle navigation </span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Rekap Absensi</a>
			</div>
		</nav>
		<aside class="sidebar sidebar-collapse">
			<div class="menu">
				<ul class="menu-content">
					<li>
						<a href="index_user.php"><i class="fas fa-home"></i> <span>Home</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-cube"></i> <span>Data Master</span><i class="fa fa-angle-down pull-right" ></i></a>
						<ul>
							<li><a href="absensi.php">Request Absen</a></li>
							
						</ul>
					</li>
					
					<li>
						<a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Logout</span>
							
						</a>
					</li>
				</ul>
			</div>
		</aside>
		<section class="content">
			<?php foreach($user as $u): ?>
<form class="form-group" action="" method="post" enctype="multipart/form-data">
	<ul>
		<li>
			<label for="nama">Nama: </label>
			<input type="text" class="form-control" name="nama" id="nama" readonly value ="<?= $u["nama"]; ?>">
		</li>
		<li>
			<label for="Kode">Kode Assistant: </label>
			<input type="text" class="form-control" name="kode" id="kode" readonly value="<?= $u["kode"];  ?>">
		</li>
	<?php endforeach; ?>
		<li>
			<label for="jam">Jam Masuk: </label>
			<input type="text" class="form-control" name="jam" id="jam" readonly value =" <?= $date ?>">
		</li>
		<li>
			<label for="tanggal">Tanggal: </label>
			<input type="text" class="form-control" name="tanggal" id="tanggal" readonly value = " <?= date('d/m/y'); ?> " >
		</li>
		<li>
			<label for="gambar">Foto </label>
			<input type="file" class="form-control" name="gambar" id="gambar">
		</li>
		<li>
			<br>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</li>
	</ul>
</form>
</section>
</div>


<script src="dist/js/jquery.min.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/admin.js"></script>
</body>
</html>
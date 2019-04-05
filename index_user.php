<?php 
session_start();
if(!isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}



require 'functions.php';
$assistant = query("SELECT * FROM assistant");
if(isset($_POST["cari"]) ){
	$keyword = $_POST['keyword'];
	$assistant = query("SELECT * FROM assistant WHERE nama LIKE '%$keyword%' OR kode LIKE '%$keyword%'
		");
}
$username = $_SESSION["login_user"];
$user = query("SELECT username FROM user WHERE username = '$username'");

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
						<a href=""><i class="fas fa-home"></i> <span>Home</span></a>
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
			<div class="inner">
				<form method="post" action="">
					<input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
					<button type="submit" name="cari"> Cari! </button>
				</form>
				<!-- <div class="container">
					<div class="row">
						<div class="col-md-12"> -->
							<table class="table table-hover table-striped table-bordered" border="1" cellpadding="10" cellspacing="0">
			<!-- 	</div>
			</div>
		</div> -->

		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Kode Assistant</th>
			<th>Jam Masuk</th>
			<th>Tanggal</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach($assistant as $mhs): ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $mhs["nama"]; ?></td>
				<td><?= $mhs["kode"]; ?></td>
				<td><?= $mhs["jam"]; ?></td>
				<td><?= $mhs["tanggal"];?> </td>

			</tr>
			<?php $no++; ?>
		<?php endforeach; ?>


	</table>
</div>
</section>
</div>


<script src="dist/js/jquery.min.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/admin.js"></script>
</body>
</html>
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
 	<title>
 		Halaman Awal
 	</title>
 </head>
 <body>
 
<h1>Rekap Absen Assistant Lab EAD</h1>
<h1>Selamat Datang <?= $_SESSION["login_user"]; ?></h1>


<a href="absensi.php">Klik untuk absensi!</a>
<form method="post" action="">
	<input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari"> Cari! </button>
</form>

<table border="1" cellpadding="10" cellspacing="0">
	
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
<a href="logout.php">Logout</a>
 </body>
 </html>
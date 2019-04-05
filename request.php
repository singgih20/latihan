<?php 
session_start();
if(!isset($_SESSION["admin"]) ){
	header("Location: login.php");
	exit;
}
require 'functions.php';
$assistant = query("SELECT * FROM request");
if(isset($_POST["cari"]) ){
	$keyword = $_POST['keyword'];
	$assistant = query("SELECT * FROM request WHERE nama LIKE '%$keyword%' OR kode LIKE '%$keyword%'
		OR shift LIKE '%$keyword%'	");
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Halaman Awal
 	</title>
 </head>
 <body>
 
<h1>Daftar request absen assistant</h1>


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
		<th>Gambar</th>
		<th>Aksi</th>
	</tr>
	<?php $no = 1; ?>
	<?php foreach($assistant as $mhs): ?>

		<tr>
			<td><?= $no; ?></td>
			<td><?= $mhs["nama"]; ?></td>
			<td><?= $mhs["kode"]; ?></td>
			<td><?= $mhs["jam"]; ?></td>
			<td><?= $mhs["tanggal"];?> </td>
			<td><img src="img/<?= $mhs["gambar"];?>" width ="50"></td>
			<td><a href="hapus1.php?id= <?= $mhs["id"]; ?>" onclick="return confirm('Apakah anda yakin?')">Hapus Data</a></td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>

<a href="index.php">back to index</a>
</table>
 </body>
 </html>
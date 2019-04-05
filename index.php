<?php 
session_start();
if(!isset($_SESSION["admin"]) ){
	header("Location: login.php");
	exit;
}


require 'functions.php';
$assistant = query("SELECT * FROM assistant ORDER BY jam ASC");


if(isset($_POST["cari"]) ){
	$keyword = $_POST['keyword'];
	$assistant = query("SELECT * FROM assistant WHERE nama LIKE '%$keyword%' OR kode LIKE '%$keyword%'
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
 
<h1>Rekap Absen Assistant Lab EAD</h1>
<a href="request.php">Lihat daftar request absensi</a> <br>
<a href="tambah.php">Tambah Data Rekap Absen Mahasiswa</a>
<br><br>


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
		<td>
				<a href="edit.php?id= <?= $mhs["id"]; ?>"> Edit Data | | </a>
				<a href="hapus.php?id= <?= $mhs["id"]; ?>" onclick="return confirm('Apakah anda yakin?')">Hapus Data</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>


</table>
<a href="logout.php">Logout</a>
 </body>
 </html>
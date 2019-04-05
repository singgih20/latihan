<?php 

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if(isset($_POST["cari"]) ){
	$keyword = $_POST['keyword'];
	$mahasiswa = query("SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%'
		OR kelas LIKE '%$keyword%' OR tanggal LIKE '%$keyword%' OR keterangan LIKE '%$keyword%'

		");
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
 
<h1>Rekap Absen Mahasiswa</h1>
<?php echo date("H:i:s . Y:M:d"); ?>
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
		<th>NIM</th>
		<th>Kelas</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
		<th>Aksi</th>
	</tr>
	<?php $no = 1; ?>
	<?php foreach($mahasiswa as $mhs): ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $mhs["nama"]; ?></td>
			<td><?= $mhs["nim"]; ?></td>
			<td><?= $mhs["kelas"];?></td>
			<td><?= $mhs["tanggal"]; ?></td>
			<td><?= $mhs["keterangan"];?> </td>
			<td>
				<a href="edit.php?id= <?= $mhs["id"]; ?>"> Edit Data | | </a>
				<a href="hapus.php?id= <?= $mhs["id"]; ?>" onclick="return confirm('Apakah anda yakin?')">Hapus Data</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php endforeach; ?>


</table>
 </body>
 </html>
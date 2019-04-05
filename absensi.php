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
	<title>Request absensi ke admin</title>
</head>
<body>
<h1>Request absensi ke admin</h1>
<p>Note: Upload foto tidak wajib</p>

<?php foreach($user as $u): ?>
<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<li>
			<label for="nama">Nama: </label>
			<input type="text" name="nama" id="nama" readonly value ="<?= $u["nama"]; ?>">
		</li>
		<li>
			<label for="Kode">Kode Assistant: </label>
			<input type="text" name="kode" id="kode" readonly value="<?= $u["kode"];  ?>">
		</li>
	<?php endforeach; ?>
		<li>
			<label for="jam">Jam Masuk: </label>
			<input type="text" name="jam" id="jam" readonly value =" <?= $date ?>">
		</li>
		<li>
			<label for="tanggal">Tanggal: </label>
			<input type="text" name="tanggal" id="tanggal" readonly value = " <?= date('d/m/y'); ?> " >
		</li>
		<li>
			<label for="gambar">Foto </label>
			<input type="file" name="gambar" id="gambar">
		</li>
		<li>
			<button type="submit" name="submit">Submit</button>
		</li>
	</ul>
</form>

</body>
</html>
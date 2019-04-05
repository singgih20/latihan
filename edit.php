<?php 

require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM assistant WHERE id = $id")[0];

if(isset($_POST["submit"]) ){
	if(ubah($_POST) > 0 ){
		echo "<script>
		alert('Data berhasil diubah');
		document.location.href='index.php';
		</script>";
	}else{
		echo "<script>
		alert('Data gagal diubah');
		document.location.href='index.php';
		</script>

		";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Ubah Data Rekap Absen
	</title>
</head>
<body>

	<h1>Ubah data rekap absen mahasiswa </h1>
	<form action="" method="post">
		
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama:</label>
				<input type="text" name="nama" id = "nama" required value="<?= $mhs["nama"];  ?>">
			</li>
			<li>
				<label for="kode">Kode Assistant:</label>
				<input type="text" name="kode" id = "kode" required value="<?= $mhs["kode"]; ?>">
			</li>
			<li>
				Shift:
			<select name="shift"> 
			<option value="SI4101">SI4101</option>
   			<option value="SI4102">SI4102</option>
   			<option value="SI4103">SI4103</option>
    		<option value="SI4104">SI4104</option>
    		<option value="SI4105">SI4105</option>
    		<option value="SI4106">SI4106</option>
    		<option value="SI4107">SI4107</option>
    		<option value="SI4108">SI4108</option>
    		<option value="SI41INT">SI4INT</option>
			</select>
			</li>
			<li>
				<label for="jam">jam: </label>
				<input type="text" name="jam" id = "jam" required value="<?= $mhs["jam"]; ?>">
			</li>
			<li>
				<label for="tanggal">tanggal: </label>
				<input type="text" name="tanggal" id = "tanggal" required value=" <?= $mhs["tanggal"];?>"	>
			</li>
			<li>
				<button type="submit" name = "submit"> Ubah data rekap absen </button>
			</li>
		</ul>


	</form>

</body>
</html>
<?php 

$conn = mysqli_connect("localhost", "root", "", "absen");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows=[];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;
	$nama = $data["nama"];
	$kode = $data["kode"];
	$jam = $data["jam"];
	$tanggal = $data["tanggal"];

	$query = "INSERT INTO assistant VALUES('', '$nama', '$kode',  '$jam', '$tanggal')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;
	$query = "DELETE FROM assistant WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function hapus1($id){
	global $conn;
	$query = "DELETE FROM request WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id = $data["id"];
	$nama = $data["nama"];
	$kode = $data["kode"];
	$jam = $data["jam"];
	$tanggal = $data["tanggal"];

	$query = "UPDATE assistant SET nama ='$nama', kode = '$kode',  jam = '$jam', tanggal = '$tanggal' WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
 }

function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes( $data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);   //memungkinkan user mengunakan tanda kutip
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama = $data["nama"];
	$kode = $data["kode"];
	//cek user tersedia
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");

	if(mysqli_fetch_assoc($result) ){
		echo "<script>
		alert('username sudah terdaftar');
		</script>";
		return false;
	}


	//cek konfirmasi password
	if($password !== $password2){
		echo "<script> 
			alert('konfirmasi password tidak sesuai');
			</script>";
			return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$nama', '$kode')");
	return mysqli_affected_rows($conn);
}

function request($data){
	global $conn;
	$nama = $data["nama"];
	$kode = $data["kode"];
	$jam = $data["jam"];
	$tanggal = $data["tanggal"];
	$gambar = upload();
	if(!$gambar){
		return false;
	}
	$query = "INSERT INTO request VALUES('', '$nama', '$kode',  '$jam', '$tanggal', '$gambar' )";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = 	$_FILES['gambar']['tmp_name'];

	// if($error === 4){
	// 	echo "<script>
	// 	alert('pilih gambar terlebih dahulu');
	// 	</script>";
	// 	return false;
	// }

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	// if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
	// 	echo "<script>
	// 	alert('yang anda upload bukan gambar');
	// 	</script>";
	// 	return false;
	// }

	// if($ukuranFile > 100000000 ){
	// 	echo "<script>
	// 	alert('ukuran gambar terlalu besar')
	// 	</script>";
	// }
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;

}

 ?>


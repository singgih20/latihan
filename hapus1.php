<?php 
require 'functions.php';

$id = $_GET["id"];
if(hapus1($id) > 0 ){
	echo "<script>
	alert('Data berhasil dihapus');
	document.location.href='request.php';
	</script>";
}else{
	echo "<script>
	alert('Data gagal dihapus');
	document.location.href='request.php';
	</script>";
}
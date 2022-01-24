<?php
include "../koneksi.php";
$id_user = $_GET['kd'];

$query = mysqli_query($koneksi,"DELETE FROM user WHERE ID_USER='$id_user'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = window.location=history.go(-1)</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = window.location=history.go(-1)</script>";	
}
?>
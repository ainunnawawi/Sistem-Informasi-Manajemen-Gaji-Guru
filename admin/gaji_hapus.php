<?php
include "../koneksi.php";
$id_gaji = $_GET['kd'];

$query = mysqli_query($koneksi,"DELETE FROM gaji WHERE ID_GAJI='$id_gaji'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location=history.go(-1)</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location=history.go(-1)</script>";	
}
?>
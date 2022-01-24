<?php
include "../koneksi.php";
$id_jabatan = $_GET['kd'];

$query = mysqli_query($koneksi,"DELETE FROM jabatan WHERE ID_JABATAN='$id_jabatan'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location=history.go(-1)</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location=history.go(-1)</script>";	
}
?>
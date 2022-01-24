<?php
include "../koneksi.php";
$id_guru = $_GET['kd'];

$query = mysqli_query($koneksi,"DELETE FROM guru WHERE ID_GURU='$id_guru'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location=history.go(-1)</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location=history.go(-1)</script>";	
}
?>
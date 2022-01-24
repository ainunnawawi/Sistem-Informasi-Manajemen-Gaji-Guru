<?php
include "../koneksi.php";
$id_tunjangan = $_GET['kd'];

$query = mysqli_query($koneksi,"DELETE FROM tbl_tunjangan WHERE ID_TUNJANGAN='$id_tunjangan'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location=history.go(-1)</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location=history.go(-1)</script>";	
}
?>